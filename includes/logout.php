<?php

	session_start();
	session_destroy();
	echo "<script>window.location.replace('user_auth.php?section=login','_self')</script>";

?>