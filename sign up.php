<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include("header1.php");
  ?>
  <h1 align=center>Register here</h1>
  <div class="row">
    <form id=frmreg method="post" name="myForm">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name" pattern="\D+"
          oninvalid="this.setCustomValidity('please Enter valid name')" oninput="this.setCustomValidity('')" required>

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
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input ng-model="emailid" id="emailid" type="email" class="form-control" name="emailid" placeholder="Email Id"
          oninvalid="this.setCustomValidity('please Enter valid email')" oninput="this.setCustomValidity('')" required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <input ng-model="age" id="age" type="text" class="form-control" name="age" placeholder="Age" pattern="\d{2}"
          required>
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
          required>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input ng-model="pass" id="pass" type="password" class="form-control" name="pass" placeholder="Password"
          required>
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
    $q = "insert into registration values('$name','$contact','$emailid','$age','$gender','$bloodGroup','$location','$pass')";
    mysqli_query($cn, $q);
    mysqli_close($cn);
    echo "<script>alert('registration successful');window.location='login.php'</script>";
  }

  ?>



</body>

</html>