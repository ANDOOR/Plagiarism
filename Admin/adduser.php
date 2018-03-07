<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="Admin"){
      header('Location: adminlogin.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plagiarism</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://techyari.in"></a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="Logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">
              <?php
     /*      require 'database-config.php';

	session_start();
if(isset($_POST["sbmt"]))
{
	
	$s="insert into users values('" . $_POST["username"] . "','" .$_POST["password"] . "','". $_POST["role"] ."')";
	$query = $dbh->prepare($s);
	//mysqli($dbh);
    $query->execute(array(':username' => $username, ':password' => $password, ':role' => $role));
	echo "<script>alert('Record Save');</script>";*/
           
    if(!isset($error_message)) {
	require_once("dbcontoller.php");
	$db_handle = new DBController();
	$query = "INSERT INTO users (r_id, username, password, role) VALUES
	('" . $_POST["r_id"] . "','" . $_POST["username"] . "', '" . ($_POST["password"]) . "', '" . $_POST["role"] . "')";
	$result = $db_handle->insertQuery($query);
	if(!empty($result)) {
		$error_message = "";
		$success_message = "You have registered successfully!";	
		unset($_POST);
	} else {
		$error_message = "Problem in registration. Try Again!";	
	}
}


?>

       <form method="post">
<table border="0" align="center" width="400" height="300px" class="shaddoww">
<tr><td colspan="2" align="center" class="toptd">Add User</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td class="lefttd">Roll no</td><td><input type="number" name="r_id" required="required"  title="please enter only number for roll number"/></td></tr>
<tr><td class="lefttd">User Name</td><td><input type="text" name="username" required="required" pattern="[a-zA-Z _]{3,15}" title="please enter only character between 3 to 15 for user name"/></td></tr>
<tr><td class="lefttd">Password</td><td><input type="password" name="password"  required="required" pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password" /></td></tr>
<tr><td class="lefttd">Confirm Password</td><td><input type="password" name="passwordconf" required="required" pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password" /></td></tr>
<tr><td class="lefttd">Type Of User</td><td><select name="role" required><option value="">Select</option>
<option value="Admin">admin</option>
<option value="Student">student</option>
    <option value="Teacher">teacher</option>
</select></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="SAVE" name="sbmt"></td></tr>
</table>
</form>

            </div>
          <div class="col-md-3"></div>
        </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
