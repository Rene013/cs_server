<?php
 
class My_auth_model extends Auth_model {
   
  public function __construct()
  {
    parent::__construct();
  }
 
  // --------------------------------------------------------------
 
  public function get_auth_data( $user_string )
  {
    if( $auth_data = parent::get_auth_data( $user_string ) )
    {
      return $this->add_profile_data( $auth_data );
    }
 
    return FALSE;
  }
 
  // --------------------------------------------------------------
 
  public function check_login_status( $user_id, $user_login_time )
  {
    if( $auth_data = parent::check_login_status( $user_id, $user_login_time ) )
    {
      return $this->add_profile_data( $auth_data );
    }
 
    return FALSE;
  }
   
  // -----------------------------------------------------------------------
 
  public function add_profile_data( $auth_data )
  {
    if( $auth_data->auth_level == '1' )
    {
      // Selected profile data
      $selected_columns = array(
        'first_name',
        'last_name'
      );
 
      $query = $this->db->select( $selected_columns )
        ->from( config_item('customer_profiles') )
        ->where( 'user_id', $auth_data->user_id )
        ->limit(1)
        ->get();
 
      if( $query->num_rows() == 1 )
      {
        foreach( $query->row_array() as $k => $v )
        {
          $auth_data->$k = $v;
        }
      } 
    }
 
    return $auth_data;
  }
   
  // -----------------------------------------------------------------------
}
 
/* End of file My_auth_model.php */
/* Location: /application/models/My_auth_model */