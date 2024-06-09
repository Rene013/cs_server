<h1>ALL VARS</h1>
	<?php
	
$vars = $this->session->userdata('user_id');
	
	?><pre>
	<?php print_r($vars); ?>
	</pre>