<?php 
session_start();
		session_destroy();
		$originatingpage='index.php'; 
							echo '<script type="text/javascript"> 
							alert(\'Successfully logout\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
	?>