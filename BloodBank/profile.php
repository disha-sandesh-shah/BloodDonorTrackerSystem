<?php
session_start();
include("header1.php");
include("connection.php");
$u = $_SESSION["BBName"];
$rs = mysqli_query($cn, "select * from bloodbank where Name ='$u'");

if ($a = mysqli_fetch_array($rs)) {
    extract($a);
}

?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 align=center>Update Profile Here</h1>
    <div class="row">
        <form id=frmreg method="post" name="myForm">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name"
                    pattern="\D+" required value="<?php echo $Name; ?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input ng-model="contact" id="contact" type="phone" class="form-control" name="contact"
                    placeholder="Contact Number" required value="<?php echo $Contact; ?>"
                    oninvalid="this.setCustomValidity('please Enter valid Contact No')"
                    oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input ng-model="liscenceNo" id="liscenceNo" type="text" class="form-control" name="liscenceNo"
                    placeholder="Liscence Number" required value="<?php echo $LiscenceNo; ?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input ng-model="location" id="location" type="text" class="form-control" name="location"
                    placeholder="Location" required value="<?php echo $Location; ?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input ng-model="pass" id="pass" type="password" class="form-control" name="pass" placeholder="Password"
                    required value="<?php echo $Password; ?>">
            </div>
            <br>

            <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>submit</button>
            <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

        </form>

    </div>

</body>

<?php
include("footer.php");
if (isset($_POST['btnsub'])) {
    extract($_POST);
    include("connection.php");
    $q = "update bloodbank set Contact='$contact',Location='$location',Password='$pass' where Name='$name'";
    mysqli_query($cn, $q);
    mysqli_close($cn);
    echo "<script>alert('Profile Updated Successfully');window.location='index.php'</script>";
}

?>