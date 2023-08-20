<?php
include("header1.php");
$email = $_GET['EmailId'];
include("connection.php");
$q = "select * from registration where EmailId = '$email'";
$rs = mysqli_query($cn, $q);
$name = "";
$contact = "";
$age = "";
$gender = "";
$location = "";
$bloodGroup = "";

if ($a = mysqli_fetch_array($rs)) {
  $email = $a['EmailId'];
  $name = $a['Name'];
  $contact = $a['Contact'];
  $age = $a['Age'];
  $gender = $a['Gender'];
  $bloodGroup = $a['BloodGroup'];
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
        <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name"
          value="<?php echo $name; ?>" oninvalid="this.setCustomValidity('please Enter valid name')"
          oninput="this.setCustomValidity('')" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input ng-model="contact" id="contact" type="text" class="form-control" name="contact"
          placeholder="Contact Number" pattern="\d{10}" value="<?php echo $contact; ?>"
          oninvalid="this.setCustomValidity('please Enter valid Contact No')" oninput="this.setCustomValidity('')"
          required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input ng-model="emailid" id="emailid" type="text" class="form-control" name="emailid" placeholder="Email Id"
          required value="<?php echo $email ?>" oninvalid="this.setCustomValidity('please Enter valid email')"
          oninput="this.setCustomValidity('')" readonly>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="age" id="age" type="text" class="form-control" name="age" placeholder="Age" pattern="\d{2}"
          value="<?php echo $age; ?>" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <label for="bloodGroup">Blood Group:</label>
        <select name="bloodGroup" id="bloodGroup" required>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>
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
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $bloodGroup = $_POST['bloodGroup'];
  $location = $_POST['location'];
  include("connection.php");
  $q = "update registration set Name = '$name', Contact = '$contact', Age = '$age', Gender = '$gender', BloodGroup = '$bloodGroup', Location = '$location'";
  mysqli_query($cn, $q);
  mysqli_close($cn);
  echo "<script>alert('User Record Updated successful');window.location='ManageUsers.php'</script>";
}

?>