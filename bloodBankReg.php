<?php
include("header1.php");
?>

<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 align=center>Register as Blood Bank</h1>
  <div class="row">
    <form id=frmreg method="post" name="myForm">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name of Blood Bank"
          pattern="\D+" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input ng-model="contact" id="contact" type="text" class="form-control" name="contact"
          placeholder="contact Number" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <input ng-model="liscenceNo" id="liscenceNo" type="text" class="form-control" name="liscenceNo"
          placeholder="Liscence Number" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <input ng-model="location" id="location" type="text" class="form-control" name="location" placeholder="Location"
          required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input ng-model="pass" id="pass" type="text" class="form-control" name="pass" placeholder="Password" required>
      </div>
      <br>

      <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>submit</button>
      <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

    </form>

  </div>

</body>

</html>

<?php
include("footer.php");
if (isset($_POST['btnsub'])) {
  extract($_POST);
  include("connection.php");
  $q = "insert into bloodbank values('$name','$contact','$liscenceNo','$location','$pass')";
  mysqli_query($cn, $q);
  mysqli_close($cn);
  echo "<script>alert('Registration as a blood bank successful');window.location='BloodBank.php'</script>";
}

?>