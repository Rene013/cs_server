<div id="console-debug">
<h1>ALL VARS</h1>
	<?php
	
$all_vars = get_defined_vars();
	
	?><pre>
	<?php print_r($all_vars); ?>
	</pre>
	
<h1>Configuration</h1>
	
	<pre>			
<?php print_r($config); ?>	
	</pre>
			
<h1>Path Array</h1>
	
	<pre>			
<?php print_r($path); ?>	
	</pre>
	
<h1>GET</h1>
	
	<pre>			
<?php print_r($_GET); ?>	
	</pre>	
	
<h1>POST</h1>
	
	<pre>			
<?php print_r($_POST); ?>	
	</pre>	

<h1>Page Array:</h1>	

	<pre>
<?php print_r($page); ?>			
	</pre>
	
<h1>View Array:</h1>	

	<pre>
<?php print_r($view); ?>			
	</pre>				
	
</div>