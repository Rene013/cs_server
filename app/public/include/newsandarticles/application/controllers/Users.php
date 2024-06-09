<?php
class Users extends Auth_Controller{
	
	public $profile_data = NULL;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
 
	protected function _set_user_variables()
	{
	  parent::_set_user_variables();
	 
	  // For controllers
	  $this->profile_data = array(
		'first_name' => $this->auth_data->first_name,
		'last_name' => $this->auth_data->last_name,
	  );
	 
	  // For CI config
	  $this->config->set_item( 'profile_data', $this->profile_data );
	 
	  // For views
	  $this->load->vars( $this->profile_data );
	}
	
	public function register() {
		// Customize this array for your user
		$data['title'] = 'Sign Up';
		

		// Load resources
		$this->load->helper('auth');
		$this->load->model('users_model');
		$this->load->model('validation_callables');
		$this->load->library('form_validation');
		
		$validation_rules = [
			[
				'field' => 'first_name',
				'label' => 'Firstname',
				'rules' => 'required',
				'errors' => [
					'required' => 'Firstname is required.'
				]
			],
			
			[
				'field' => 'last_name',
				'label' => 'Lastname',
				'rules' => 'required',
				'errors' => [
					'required' => 'Lastname is required.'
				]
			],
		
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'Email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'password',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field' => 'passwd2',
				'label' => 'Confrimation password',
				'rules' => [
					'matches[passwd]',
					'required'
				],
				'errors' => [
					'required' => 'The password field is required.',
					'matches[passwd]' => 'Password don\'t match.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,6,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );
				
		if( $this->form_validation->run() === FALSE){
			
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
			}
			else
				{
					if($this->users_model->register()){
					
					$this->session->set_flashdata('user_registered','You account has been created, you can now log in');
					
					redirect('posts');
					
					}
				
				}
				
	}
		
		// Log in user
	public function login(){
		
		$data['title'] = 'Sign In';
		
		//$this->load->helper('MY_form_helper');
		$this->load->helper('Auth_helper');
		$this->load->model('validation_callables');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$login_rules =[
				[
					'field' => 'login_string',
					'label' => 'USERNAME OR EMAIL ADDRESS',
					'rules' => 'trim|required|max_length[255]' /* Replace max_length w/ valid_email is site not using usernames */
				],
				[
					'field' => 'login_pass',
					'label' => 'PASSWORD',
					'rules' => [
						'trim',
						'required',
						[ 
							'_check_password_strength', 
							[ $this->validation_callables, '_check_password_strength' ] 
						]
					]
				]
			];

		$this->form_validation->set_rules($login_rules);
						 
		if($this->form_validation->run() === TRUE){	
			
			$this->user_data = $this->users_model->login($this->input->post('login_string'));
			$this->load->library('Authentication');				 
			if( $this->authentication->check_passwd( $this->user_data['passwd'], $this->input->post('login_pass'))){
				
				$this->session->userdata['user_id']= (int)$this->user_data['user_id'];
				$this->session->userdata['username']= (string)$this->user_data['username'];
				$this->session->userdata['logged_in']= (bool)true;

				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				redirect('posts');
				
				} else {
					
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				} 
	
		} else {
				$this->tokens->match && $this->optional_login();//$this->require_min_level(1);
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
		}
	}
			// Log user out
		public function logout(){
			
			$this->authentication->logout();
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			// Set redirect protocol
			$redirect_protocol = USE_SSL ? 'https' : NULL;

			redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
			
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			//redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
		
		Public function nalogin(){
			
			if( $this->uri->uri_string() == 'users/login_form'){
				
				show_404();
			}

			if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' ){
				$this->require_min_level(1);
			}
				$this->setup_login_form();
				$this->load->view('templates/header');
				$this->load->view( 'users/login_form' );
				$this->load->view('templates/footer');						
		}
	
	
	
	
	
	
	
	// --------------------------------------------------------------------------------------
	/**
	 * User recovery form
	 */
	public function recover()
	{
		// Load resources
		$this->load->model('users_model');

		/// If IP or posted email is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// If the form post looks good
			if( $this->tokens->match && $this->input->post('email') )
			{
				if( $user_data = $this->users_model->get_recovery_data( $this->input->post('email') ) )
				{
					// Check if user is banned
					if( $user_data->banned == '1' )
					{
						// Log an error if banned
						$this->authentication->log_error( $this->input->post('email', TRUE ) );

						// Show special message for banned user
						$view_data['banned'] = 1;
					}
					else
					{
						/**
						 * Use the authentication libraries salt generator for a random string
						 * that will be hashed and stored as the password recovery key.
						 * Method is called 4 times for a 88 character string, and then
						 * trimmed to 72 characters
						 */
						$recovery_code = substr( $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt(), 0, 72 );

						// Update user record with recovery code and time
						$this->users_model->update_user_raw_data(
							$user_data->user_id,
							[
								'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
								'passwd_recovery_date' => date('Y-m-d H:i:s')
							]
						);

						// Set the link protocol
						$link_protocol = USE_SSL ? 'https' : NULL;

						// Set URI of link
						$link_uri = 'users/recovery_verification/' . $user_data->user_id . '/' . $recovery_code;

						$view_data['special_link'] = anchor( 
							site_url( $link_uri, $link_protocol ), 
							site_url( $link_uri, $link_protocol ), 
							'target ="_blank"' 
						);

						$view_data['confirmation'] = 1;
					}
				}

				// There was no match, log an error, and display a message
				else
				{
					// Log the error
					$this->authentication->log_error( $this->input->post('email', TRUE ) );

					$view_data['no_match'] = 1;
				}
			}
		}

		$this->load->view('templates/header');

		$this->load->view('users/recover', ( isset( $view_data ) ) );

		$this->load->view('templates/footer');
	}

	// --------------------------------------------------------------

	/**
	 * Verification of a user by email for recovery
	 * 
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function recovery_verification( $user_id = '', $recovery_code = '' )
	{
		/// If IP is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// Load resources
			$this->load->model('users_model');

			if( 
				/**
				 * Make sure that $user_id is a number and less 
				 * than or equal to 10 characters long
				 */
				is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

				/**
				 * Make sure that $recovery code is exactly 72 characters long
				 */
				strlen( $recovery_code ) == 72 &&

				/**
				 * Try to get a hashed password recovery 
				 * code and user salt for the user.
				 */
				$recovery_data = $this->users_model->get_recovery_verification_data( $user_id ) )
			{
				/**
				 * Check that the recovery code from the 
				 * email matches the hashed recovery code.
				 */
				if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
				{
					$view_data['user_id']       = $user_id;
					$view_data['username']     = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
				}

				// Link is bad so show message
				else
				{
					$view_data['recovery_error'] = 1;

					// Log an error
					$this->authentication->log_error('');
				}
			}

			// Link is bad so show message
			else
			{
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password 
			 */
			if( $this->tokens->match )
			{
				$this->users_model->recovery_password_change();
			}
		}

		echo $this->load->view('templates/header', '', TRUE);

		echo $this->load->view( 'users/choose_password_form', $view_data, TRUE );

		echo $this->load->view('templates/footer', '', TRUE);
	}

	// --------------------------------------------------------------
	/**
	 * If you are using some other way to authenticate a created user, 
	 * such as Facebook, Twitter, etc., you will simply call the user's 
	 * record from the database, and pass it to the maintain_state method.
	 *
	 * So, you must know either the user's username or email address to 
	 * log them in.
	 *
	 * How you would safely implement this in your application is your choice.
	 * Please keep in mind that such functionality bypasses all of the 
	 * checks that Community Auth does during a normal login.
	 */
	public function social_login()
	{
		// Add the username or email address of the user you want logged in:
		$username_or_email_address = '';

		if( ! empty( $username_or_email_address ) )
		{
			$auth_model = $this->authentication->auth_model;

			// Get normal authentication data using username or email address
			if( $auth_data = $this->{$auth_model}->get_auth_data( $username_or_email_address ) )
			{
				/**
				 * If redirect param exists, user redirected there.
				 * This is entirely optional, and can be removed if 
				 * no redirect is desired.
				 */
				$this->authentication->redirect_after_login();

				// Set auth related session / cookies
				$this->authentication->maintain_state( $auth_data );
			}
		}
		else
		{
			echo 'Example requires that you set a username or email address.';
		}
	}
	
	// -----------------------------------------------------------------------
		
	}