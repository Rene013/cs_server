<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
	$opened= null;
	switch ($page) {
		
		case 'dashboard':

		break;
		case 'pages':
		
		break;
		
		case 'edit':
			
			if(isset($_POST['submitted']) == 1) {
				
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
				
				if(isset($_POST['id']) != '') {
					$action = 'updated';
					$q = "UPDATE posts SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', type = $_POST[type], parent_id = $_POST[parent_id], label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
				} else {
					$action = 'added';							
					$q = "INSERT INTO posts (user, slug, title,type, parent_id, label, header, body) VALUES ($_POST[user], '$_POST[slug]', '$title', $_POST[type], $_POST[parent_id],'$label', '$header', '$body')";
				}
				
				
				$r = mysqli_query($dbc, $q);
				
				if($r){
					
					$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Page could not be '.$action.' because: ' . mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			//if(isset($_GET['id'])) { $opened = data_post($dbc, $_GET['id']); }
			
		break;
		
		case 'users':

			if(isset($_POST['submitted']) == 1) {
				
				$firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
				$lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
				
				if($_POST['password'] != '') {
					
					if($_POST['password'] == $_POST['passwordv']) {
						
						$password = " password = SHA1('$_POST[password]'),";
						$verify = true;
						
					} else {
						
						$verify = false;
						
					}					
					
				} else {
						
					$verify = false;	
					
				}
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$_POST[email]', $password status = $_POST[status] WHERE id = $_GET[id]";
					$r = mysqli_query($dbc, $q);
					
				} else {
					
					$action = 'added';
					
					$q = "INSERT INTO users (firstname, lastname, email, password, status) VALUES ('$firstname', '$lastname', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
					
					if($verify == true) {
						$r = mysqli_query($dbc, $q);
					}

				}
				
				if($r){
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;
			
		case 'navigation':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$url = mysqli_real_escape_string($dbc, $_POST['url']);
				print_r($_POST);
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', position = $_POST[position], parent_position = $_POST[parent_position], status = $_POST[status] WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 
				
				if($r){
					
					$message = '<p class="alert alert-success">Navigation Item was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Navigation Item could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
	
		
		break;
		
		case 'settings':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$value = mysqli_real_escape_string($dbc, $_POST['value']);

				if(isset($_POST['openedid']) != '') {
					
					$action = 'updated';
					$q = "UPDATE settings SET label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 

				if($r){
					
					$message = '<p class="alert alert-success">Setting was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Setting could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
		
		break;		
		
		default:
			
		break;
	}

?>