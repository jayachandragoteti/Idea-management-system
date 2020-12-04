<?PHP
	session_start(); //to ensure you are using same session
    unset($SESSION['user_name']);
    session_destroy(); //destroy the session
    header("location:login.php");
?>
