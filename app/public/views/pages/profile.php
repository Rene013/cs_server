
<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:10px"></div>
<div class="container content"><!-- Container content begin -->

<?php 
if(!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);

    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>
<div class = "panel-heading">
<h4 class="text"><?php echo escape($data->firstname); ?>'s Profile</h4>
</div>
<div class="row">
    <section class="col-md-12">
        <div class="panel-body formSection twitter-typeahead">


        <h3>

        <?php echo escape($data->username); ?>
        <?php

            if($user->hasPermission('admin')){ // CAN Be used to redirect in admin area!!!  if(!$user->hasPermission('admin')){ ...}

                echo '  Administrator';
            }


        ?>


        </h3>
        <p>Avatar: <?php echo escape($data->avatar); ?>
        <div class="avatar-container" style="background-image: url('../uploads/<?php echo escape($data->avatar); ?>')"></div></p>
        <p>First Name: <?php echo escape($data->firstname); ?></p>
		<p>Last Name: <?php echo escape($data->lastname); ?></p>
		<p>Email: <?php echo escape($data->email); ?></p>


        </div>
    </section>
</div>




<?php
    }
}
