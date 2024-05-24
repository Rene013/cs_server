<?php
ob_start();
include'template/header.php';
defined('_SECURE_') or die('Trying to access secured file, SORRY');
include(D_TEMPLATE.'/navigation.php');

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
if ($user->isPassStatus() === true){
	Redirect::to('changepassword.php');
}
if ($user->isActive === false){
	Redirect::to('changepassword.php');
}
?>

<div class="clearfix"></div>
<div class="container content"><!-- Container content begin -->
<div class = "panel-heading">

<h4 class="text text-right"><?php echo escape($user->data()->firstname); ?>'s Profile</h4>
</div>
<div class="row">
    <section class="col-md-12">
        <div class="panel-body formSection">


        <h3>

        <?php echo '<h3>Hello '.ucfirst(escape($user->data()->username)).'</h3>'; 

            if($user->hasPermission('admin')){ // CAN Be used to redirect in admin area!!!  if(!$user->hasPermission('admin')){ ...}
                echo '<a class="small" href="admin_area">Administrator</a>';
            }


        ?>


        </h3>
		<div class="avatar-container">
			<img src="uploads/<?php echo escape($user->data()->avatar); ?>">
		</div>
		</p>
        <p>First Name: <?php echo escape($user->data()->firstname); ?></p>
		<p>Last Name: <?php echo escape($user->data()->lastname); ?></p>
		<p>Email: <?php echo escape($user->data()->email); ?></p>


        </div>
    </section>
</div>




<?php


include'template/footer.php';

ob_end_flush();

?>