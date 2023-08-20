<?php
session_start();
include("header1.php");
?>

<html>

<head>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1 align=center>Blood Bank Login</h1>
	<div class="row">
		<?php
		if (isset($_POST['btnsub'])) {
			$name = $_POST['name'];
			$pass = $_POST['pass'];
			include("connection.php");
			$q = "select * from bloodbank where Name='$name'and password='$pass'";
			$result = mysqli_query($cn, $q);
			if ($a = mysqli_fetch_array($result)) {
				$_SESSION['BBName'] = $name;
				echo "<script>window.location='BloodBank/index.php'</script>";
			} else
				echo "<center><b><font color=red>Incorrect Blood Bank Name or password</font></b></center>";
			mysqli_close($cn);
		}
		?>
		<div class="row">
			<form id=frmreg method="post" name="myForm">
				<br>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input ng-model="name" id="name" type="text" class="form-control" name="name"
						placeholder="Blood Bank Name" required>
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
				<br>
				<br>
				<a href=bloodBankReg.php>Not Registered Yet? Register Here</a>
			</form>
		</div>
		<br>



</body>

</html>