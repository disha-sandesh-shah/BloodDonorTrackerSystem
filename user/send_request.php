<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
  session_start();
  include("header1.php");
  $donorId = $_POST['donor_id'];
  $email = $_SESSION['EmailId'];
  $location = $_POST['location'];
  $donorName = $_POST['name'];
  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d H:i:s');

  ?>

  <h1 align=center>Send Request Here</h1>
  <div class="row">
    <form id=frmreg method="post" name="myForm">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name" pattern="\D+"
          oninvalid="this.setCustomValidity('please Enter valid name')" oninput="this.setCustomValidity('')" required>
      </div>
      <br>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input ng-model="donorId" id="donorId" type="email" class="form-control" name="donorId" placeholder="donor ID"
          pattern="\D+" required value="<?php echo $donorId; ?>" readonly>
      </div>
      <br>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="donorName" id="donorName" type="text" class="form-control" name="donorName"
          placeholder="donor Name" pattern="\D+" required value="<?php echo $donorName; ?>" readonly>
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
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <input ng-model="Age" id="Age" type="text" class="form-control" name="Age" placeholder="Age" required>
      </div>
      <br>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
      </div>
      <br>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input ng-model="contact" id="contact" type="phone" class="form-control" name="contact"
          placeholder="contact Number" pattern="\d{10}"
          oninvalid="this.setCustomValidity('please Enter valid Contact No')" oninput="this.setCustomValidity('')"
          required>
      </div>
      <br>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <input ng-model="location" id="location" type="text" class="form-control" name="location" placeholder="Location"
          required value="<?php echo $location; ?>" readonly>
      </div>
      <br>

      <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>submit</button>
      <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

    </form>

  </div>


  <?php
  include("footer.php");
  if (isset($_POST['btnsub'])) {
    extract($_POST);
    include("connection.php");
    $q1 = "insert into requests (Name, EmailId, DonorId, DonorName, BloodGroup, Age, Gender, Contact, Location, Status, Date) values('$name', '$email', '$donorId', '$donorName', '$bloodGroup', '$Age', '$gender', '$contact', '$location', 'Pending', '$date')";
    mysqli_query($cn, $q1);
    $q2 = "insert into userrequests (Name, EmailId, DonorId, DonorName, BloodGroup, Age, Gender, Contact, Location, Status, Date) values('$name', '$email', '$donorId', '$donorName', '$bloodGroup', '$Age', '$gender', '$contact', '$location', 'Pending', '$date')";
    mysqli_query($cn, $q2);
    mysqli_close($cn);
    echo "<script>alert('Request sent successfully');window.location='index.php'</script>";
  }

  ?>

</body>

</html>