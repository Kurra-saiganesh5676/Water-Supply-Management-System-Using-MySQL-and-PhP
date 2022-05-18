<?php
session_start();
unset($_SESSION['email']);
session_destroy();
echo '<script language="Javascript">
                window.alert("Logged out successfully");
                window.location="index.php";
               </script>';
?>