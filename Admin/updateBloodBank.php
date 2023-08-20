<?php
include("header1.php");
$name = $_GET['Name'];
include("connection.php");
$q = "select * from bloodbank where Name = '$name'";
$rs = mysqli_query($cn, $q);
$name = "";
$contact = "";
$liscenceNo = "";
$location = "";
$pass = "";

if ($a = mysqli_fetch_array($rs)) {
  $name = $a['Name'];
  $contact = $a['Contact'];
  $liscenceNo = $a['LiscenceNo'];
  $location = $a['Location'];
  $pass = $a['Password'];
}
?>

<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 align=center>Update here</h1>
  <div class="row">
    <form id=frmreg method="post" name="myForm">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name" required
          value="<?php echo $name; ?>" readonly>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input ng-model="contact" id="contact" type="text" class="form-control" name="contact"
          placeholder="Contact Number" pattern="\d{10}" value="<?php echo $contact; ?>" required
          oninvalid="this.setCustomValidity('please Enter valid Contact No')" oninput="this.setCustomValidity('')">
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input ng-model="liscenceNo" id="liscenceNo" type="text" class="form-control" name="liscenceNo"
          placeholder="Liscence Number" required value="<?php echo $liscenceNo; ?>" readonly>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <input ng-model="location" id="location" type="text" class="form-control" name="location" placeholder="Location"
          value="<?php echo $location; ?>" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input ng-model="pass" id="pass" type="text" class="form-control" name="pass" placeholder="Password"
          required value="<?php echo $pass; ?>" readonly>
      </div>
      <br>

      <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Update</button>
      <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

    </form>

  </div>
</body>

</html>

<?php
include("footer.php");
if (isset($_POST['btnsub'])) {
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $liscenceNo = $_POST['liscenceNo'];
  $location = $_POST['location'];
  include("connection.php");
  $q = "update registration set Contact = '$contact', LiscenceNo = '$liscenceNo', Location = '$location' where Name = '$name'";
  mysqli_query($cn, $q);
  mysqli_close($cn);
  echo "<script>alert('BloodBank Record Updated successful');window.location='ManageBloodBanks.php'</script>";
}

?>