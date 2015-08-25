<?php
	require_once('../../../../wp-config.php');
?>
<?php 
get_links('-1', '<li>+ ', '</span></li>', ': <span class="grey">', FALSE, 'rand' , TRUE, 
TRUE, 10, TRUE); 
?>