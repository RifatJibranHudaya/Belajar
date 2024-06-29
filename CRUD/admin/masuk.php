<?php
session_start();
if ($_SESSION['status'] = "login") {
    
    header("location:../index.php");
}
?>
<?php echo $_SESSION['username']; ?>