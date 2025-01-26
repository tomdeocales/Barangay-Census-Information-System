<?php
session_start();
include 'conn.php';

$error='';

if(isset($_POST['login']))
{
if(empty($_POST['username']) ||  empty($_POST['password'])){
$error = "Username or Password is Invalid";
}
else
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
$conn = mysqli_connect($servername, $username, $password, $dbname);


$username=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM loginform WHERE password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);

if($rows ==1){

		$_SESSION['username'] = $username; 
	    $_SESSION['password'] = $password; 
	    header('Location:/php-crud-yt-main/dashboard.php');
	}
else
{
	$error = "Username or Password is Invalid";
}
mysqli_close($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barangay Sucol Admin │ Login</title>
	
	<form action="index.php" method="post">
		<style>
    
    #center {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    #center1 {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border: 0px solid black;
      padding: 20px;
      height: 150px;
      width: 80%;
      max-width: 300px;
      box-shadow: 1px 20px 25px rgba(15, 55, 133, 0.5);
    }

    #pic {
      height: auto;
      width: 80%;
      max-width: 100px;
    }

    .color {
      width: 75%;
      border-color: rgb(159, 159, 161);
      padding: 5px;
      border-radius: 3px;
      border-width: 1px;
      margin-bottom: 10px;
      background-color: blanchedalmond;
    }

    #color1 {
      
      width: 81%;
      background-color: #0f3785;
      border-width: 0px;
      color: aliceblue;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 5px;
      margin-bottom: 10px;
      border-radius: 3px;
    }#color1:hover {
      cursor: pointer;
      background-color: rgb(14, 72, 188);
    }

    h1 {
      color: #0f3785;
      font-family:Arial, Helvetica, sans-serif;
      font-size: 18px;
      padding-bottom: 25px;
    }
    @media only screen and (max-width: 480px) {
      body {
        height: 130vh;
      }

      
    }
  </style>
</head>
	<body>
	
			
		<div id="center">
    		<img id="pic" src="sucol.png">
    		<center><h1>Barangay Information System</h1></center>
    		<div id="center1">
      			<input id="top" class="color" type="text" name="username" placeholder="Username" 
      			style="background-image: url('pngwing.com\ \(3\).png'); background-repeat: no-repeat; 
      			background-position: center right;background-size: 16px;padding-right: 18px;">
      			<input class="color" name ="password" type="password" placeholder="Password" 
      			style="background-image: url('pngwing.com\ \(4\).png'); background-repeat: no-repeat; 
      			background-position: center right;background-size: 16px; padding-right: 18px;">
      			<input id="color1" name ="login" type="submit" value="Login">
    		</div>
  			
	</body>
		</html>
