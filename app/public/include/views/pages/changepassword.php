<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
if(!$user->isLoggedIn()) {
    Redirect::to('/index.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'current_password' => array(
                'required' => true,
                'min' => 8
            ),
            'new_password' => array(
                'required' => true,
                'min' => 8,
				'password_strength'=>true
            ),
            'new_password_again' => array(
                'required' => true,
                'min' => 8,
                'matches' => 'new_password'
			)
        ));

		if($validate->passed()) {
			if(Hash::make(Input::get('current_password'), $user->data()->salt) !== $user->data()->password) {
				$messages['current_password'] =  'Your current password is wrong.';
			} else {
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('new_password'), $salt),
					'salt' => $salt,
					'password_recover' => 0
				));
				Redirect::to('index.php');
			}
		} else {
			$messages = $validate->errors();
			/*foreach($validate->errors() as $error) {
				echo $error, '<br>';
			}*/
		}
	}
}
?>
<div class = "container">
    <div class = "row">
        <div class = "col-md-6">
			<div class="row" style="margin-top:5px"><!--breadcrumb-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="breadcrumb">
						<ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
							<li class="first">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home">
									<span itemprop="title">Home</span>
								</a>
							</li>
							<li class="last">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?><?php echo $page->_data->parent_data->slug;?>/<?php echo $page->_data->slug;?>">
									<span itemprop="title"><?php echo $page->_data->header; ?></span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div><!--breadcrumb-->
            <div class = "formSection twitter-typeahead" role="dialog">
                <div class = "panel-heading">
                <h4 class="text-center">Hello <?php echo escape($user->data()->firstname); ?>, you can change your password now</h4>
                </div>
                <div class="panel-body">
					<form class = "form" action="" method="post">
						<div class="field form-group <?php if(!empty($messages['current_password'])){echo 'has-error';} else { echo 'has-success';}?>">
							<label for="current_password">Current Password</label>
							<input class = "form-control" type="password" name="current_password" id="current_password">
							<span class="help-block small"><?php if(!empty($messages['current_password'])){echo ucfirst(($messages['current_password']));}?></span>
						</div>

						<div class="field form-group <?php if(!empty($messages['new_password'])){echo 'has-error';} else { echo 'has-success';}?>">
							<label for="new_password">New Password</label>
							<input class = "form-control" type="password" name="new_password" id="new_password">
							<span class="help-block small"><?php if(!empty($messages['new_password'])){echo ucfirst(($messages['new_password']));}?></span>
						</div>

						<div class="field form-group <?php if(!empty($messages['new_password_again'])){echo 'has-error';} else { echo 'has-success';}?>">
							<label for="new_password_again">New Password Again</label>
							<input class = "form-control" type="password" name="new_password_again" id="new_password_again">
							<span class="help-block small"><?php if(!empty($messages['new_password_again'])){echo ucfirst(($messages['new_password_again']));}?></span>
						</div>

						<input type="hidden" name="token" id="token" value="<?php echo escape(Token::generate()); ?>">
						<button class="btn btn-primary btn-block" type="submit" value="Change Password">Change Password</button>
					</form>
				</div>
            </div>
        </div>
	</div>
</div>