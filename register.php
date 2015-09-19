<?php
error_reporting(0);
extract($_POST);
include("conn.php");
if(isset($submit))
{
   if(!empty($uname) && !empty($pass) && !empty($cpass) && !empty($id) && !empty($age))
   {
	   if($cpass==$pass)
	   {  $id=mysqli_real_escape_string($link,htmlentities(trim($id)));
		  $pass=mysqli_real_escape_string($link,htmlentities(trim($pass)));
		  $pass=md5($pass);
		  if(mysqli_query($link,"insert into regis values('$id','$pass','$uname','$gen',$age,'$city','$sq','$ans',NOW())") or die("Connection not possible"))
		  {
			  mysqli_query($link,"insert into profile(id) values('$id')");
	          move_uploaded_file($_FILES['att']['tmp_name'],"users/$id.jpg");
	           header("location:welcome.php?id=$id");	
			  
		  }
		  
		  else
		  {
			echo "<script> alert(' Username or ID already registered') </script> ";
			
		  }
		 
	   }
	   else
	   {
		$msg="<script> alert('Password fields Doesnot matches') </script>";   
	   }
	   
   }
   else
   {
	$msg="Enter All fields";
   }
	  
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
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
       <h4><span>Create your Social networking Account</span></h4>
  </div>
  <div class="formx col-md-12" align="center" style="margin-left:20px;max-width:50%;">
       
        <div class="col-md-12 jumbotron" align="left">
         <table width="100%" border="0">
  <tr>
    <td width="16%"></td>
    <td width="56%"><div class="form-group">
  <label for="uname">User name:</label>
  <input type="text" class="form-control" id="uname" name="uname" placeholder="User Name" >
  </div></td>
    <td width="28%"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><label for="id">Email:</label>
  <input type="text" class="form-control" id="id" name="id" placeholder="Email ID" >
  </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><label for="pass">Password:</label>
  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" >
  </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><label for="cpass">Confirm password:</label>
  <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm password" >
  </div></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><label for="age">Age:</label>
  <input type="text" class="form-control" id="age" name="age" placeholder="Age" >
  </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label class="radio-inline"><input type="radio" name="gen" value="male" checked>Male</label>
        <label class="radio-inline"><input type="radio" name="gen" value="female">Female</label>
     </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group">
  <label for="select">City:</label>
  <select class="form-control" name="city" id="select">
    <option value="India">India</option>
    <option value="Pakistan">pakistan</option>
    <option value="China">China</option>
    <option value="USA">USA</option>
    <option value="UK">UK</option>
    <option value="Australiia">Australia</option
  ></select>
</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><button type="submit" class="btn btn-success btn-block" name="submit" id="sub">SUBMIT</button></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class="form-group"><button type="reset" class="btn btn-danger btn-block" name="reset" id="sub">RESET</button></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
   </div>
</div>
  <div class="container-fluid" style="margin-top:25%" align="center">
       <img src="android-app-on-google-play-coming-soon.jpg" width="400" height="150">
    </div>
 </div>
</body>
</html>