<?php 
error_reporting(0); 
session_start(); 
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) { 
header('location:../admin/index.php');
} else {
$username=$_SESSION['admin'];
}
?>