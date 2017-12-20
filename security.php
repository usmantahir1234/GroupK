<?php
session_start();
if($_SESSION[CHK]!=true)
{
	header("location:registration.php");
}
?>