<?php
session_start();
include("header1.php");
?>
<html>

<head>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1 align=center>Admin Login Here</h1>
	<div class="row">
		<?php
		if (isset($_POST['btnsub'])) {
			$unm = $_POST['unm'];
			$pass = $_POST['pass'];
			include("connection.php");
			$q = "select * from adminLogin where UserName='$unm'and Password='$pass'";
			$result = mysqli_query($cn, $q);
			if ($a = mysqli_fetch_array($result)) {
				$_SESSION['UserName'] = $unm;
				echo "<script>window.location='Admin/index.php'</script>";
			} else
				echo "<center><b><font color=red>Incorrect EmailID or Password</font></b></center>";
			mysqli_close($cn);
		}

		?>
		<form id=frmreg method="post" name="myForm">
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input ng-model="unm" id="unm" type="text" class="form-control" name="unm" placeholder="Username"
					required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input ng-model="pass" id="pass" type="text" class="form-control" name="pass" placeholder="Password"
					required>
			</div>
			<br>

			<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
			<button type="reset" class="btn btn-danger" id="btnres">Reset</button>
		</form>

</body>

</html>