<?php
ob_start();
defined('_SECURE_') or die('Trying to access secured file, SORRY');
include'template/header.php';

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(

            'firstname' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'lastname' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'required' => false,
                'min' => 4,
                'max' => 60,
            )

        ));

        if($validate->passed()) {
            try {
                $user->update(array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'email' => Input::get('email'),
                ));

                Session::flash('firstname', Input::get('lastname'));
                Redirect::to('profile.php');

            } catch(Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<div class = "class= container">
    <div class = "row">
        <div class = "col-md-7">
            <div class = "formSection twitter-typeahead" role="dialog">
                <div class = "panel-heading">
                <h4 class="text-center">Hello <?php echo escape($user->data()->first); ?> update your Information</h4>
                </div>
                <div class="panel-body">
                    <form class= "form" action="" method="post">
                        <div class="field form-group">
                            <label for="username">Username</label>
                            <input class= "form-control" type="text" name="username" value="<?php echo escape($user->data()->username); ?>">
                        </div>
                        <div class="field form-group">
                            <label for="Firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo escape($user->data()->firstname); ?>">
                        </div>
                        <div class="field form-group">
                            <label for="Lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo escape($user->data()->lastname); ?>">
                        </div>

                        <div class="field form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo escape($user->data()->email); ?>">
                        </div>

                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <button type="submit" class="btn btn-primary btn-block" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
			<div class = "formSection twitter-typeahead">
				<form action="uploads.php?id=<?php echo escape($data->id); ?>" class="dropzone avatar-container" id="avatar-dropzone">
		
					<input type="file" name="file">
					
				</form>
			</div>
        </div>
    </div>
</div>

<?php 

include'template/footer.php';

ob_end_flush();
?>