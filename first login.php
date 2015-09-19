<?php 
include("conn.php");
error_reporting(0);
extract($_POST);
if(isset($sub))
{
  if(!empty($id) && !empty($pass))
  {
	  $pass=md5($pass);
	  $sel=mysqli_query($link,"select id,uname,pass from regis where id='$id' or uname='$id'");
	  $arr=mysqli_fetch_array($sel);
	  if(($id==$arr['id'] or $id==$arr['uname']) and $pass==$arr['pass'])
	  {
		session_start();
		$_SESSION['sid']=$arr['id'];
		header("location:home.php");  
	  }
	  else
	  {
		$msg="Id and pass is not correct";  
	  }
  }
  else
  {
	  $msg="Plz fill blank fields";
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<div class="main" id="main">
  <div class="jumbotron" align="center" style="background-color:#0C9"> 
   <h1>SOCIAL NETWORKING</h1>
  </div>
  <div class="below-jum" align="center">
  <h4><span>Sign in to continue to the Social Networking Account</span></h4>
  </div>
  <div class="jumbotron">
  <div class="container-fluid" align="center" style="margin-bottom:20px">
    <img src="default_profile_image_large-e61b362fc14b3206204a64e603d7ad80.png" class="img-circle" width="100" height="90">
  </div>
    <table width="30%" border="0" align="center">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%"><div class="form-group">
  <label for="id" class="control-label">Email:</label>
  <input type="text" class="form-control" id="id" name="id" placeholder="Enter your ID" >
  </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group" >
  <label for="pass" class="control-label">Password:</label>
  <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter your password">
  </div></td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td><div class="form-group">        
           <div class="checkbox">
          <label><input type="checkbox" name="remember" > Remember me</label>
        
      </div>
    </div></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><button type="button" class="btn btn-info btn-block" id="sub">Log in</button></div>
      </td>
  </tr>
</table>

  </div>
  <div class="class-back" align="center" style="text-decoration:none">
  <button type="button" class="btn btn-link"><a href="register.php">Create an Account</a></button>
  </div>
</div>
</body>
</html>