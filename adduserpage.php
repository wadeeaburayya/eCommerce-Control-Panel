<?php
require_once "config1.php";
error_reporting(0);
$username = $useremail = $password = $confirm_password = $userfullname = $userrole = "";
$username_err = $useremail_err = $password_err = $confirm_password_err = $userfullname_err ="";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["useremail"]))){
        $useremail_err = "";
    }
     else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $useremail_err = "This email is already taken.";
                } else{
                    $useremail = trim($_POST["useremail"]);
                }
            } else{
                echo "";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
    if(empty(trim($_POST["password"]))){
        $password_err = "";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }



    // Validate fullname
    if(empty(trim($_POST["userfullname"]))){
        $userfullname_err = "";
    }
     else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE userfullname = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_userfullname);

            // Set parameters
            $param_userfullname = trim($_POST["userfullname"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $userfullname_err = "This fullname is already taken.";
                } else{
                    $userfullname = trim($_POST["userfullname"]);
                }
            } else{
                echo "";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    $userrole = $_POST['userrole'];
    

    // Check input errors before inserting in database
    if(empty($username_err) && empty($useremail_err) && empty($password_err) && empty($confirm_password_err) && empty($userfullname_err)){
   
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, useremail, password, userrole, userfullname ) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($con, $sql)){
         // Set parameters
            $param_username = $username;
            $param_useremail = $useremail;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_userrole=$userrole;
            $param_userfullname = $userfullname;
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_useremail, $param_password, $param_userrole, $param_userfullname);

           



            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: userpage.php");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Montserrat", sans-serif;
        display: inline;
        margin: 0;
        padding: 0;
    }

    #adduser {
        text-align: right;
        display: inline-block;
    }

    #deluser {
        text-align: right;
        display: inline-block;
    }


    .w3-row-padding img {
        margin-bottom: 12px
    }
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {
        width: 120px;
        background: #f59123;
    }
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {
        margin-left: 120px
    }
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
        #main {
            margin-left: 0
        }
    }

    .midcontent {
        background-color: rgba(0, 0, 0, 0.5);
        margin: auto auto;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px #000;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 500px;
        height: 430px;
    }

    .login12:before {
        width: 100%;
        height: 100%;
        background-size: cover;
        content: "";
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: -1;
        display: block;
        filter: blur(2px);
    }

    .login12 {
        background-color: white;
        margin: 80px auto;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px #000;
        position: absolute;
        top: 10;
        left: 0;
        right: 0;
        width: 1250px;
        height: 780px;
    }
    .login123 {
        width: 500px;
        height: 630px;
        overflow: hidden;
        margin: auto;
        padding: 80px;
        background: #f0f0f0;
        border-radius: 15px;
    }
    

    h1 {
        font-size: 32px;
        font-weight: 600;
        padding-bottom: 30px;
    }

    label {
        color: black;
        font-size: 17px;
    }

    #username {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    #email {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    #password {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    #fullname{
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    input[type=text] {
        background-color: #e3e3e3;
        color: black;
    }

    input[type=submit] {
         background-color: #ffb833;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }
    input[type=reset] {
        background-color: #ffb833;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }
    #db {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

        #db td, #db th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #db tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #db tr:hover {
            background-color: #ddd;
        }

        #db th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f59123;
            color: white;
        }
</style>
<body style="background-color: #c5c5c5">
    <header class="w3-container w3-center w3-padding-1 w3-black">
        <h1 class="w3-xxlarge"><b>Ecommerce Website</b></h1>
    </header>

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <!-- Avatar image in top left corner -->
        <img src="logo.jpg" style="width:100%">
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="userpage.php" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>USER</p>
        </a>
        <a href="productpage.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fas fa-shopping-cart w3-xxlarge"></i>
            <p>PRODUCT</p>
        </a>
        <a href="categorypage.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fas fa-table w3-xxlarge"></i>
            <p>CATEGORY</p>
        </a>

        <a href="#Ads" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fas fa-ad w3-xxlarge"></i>
            <p>Ads</p>
        </a>

    </nav>

    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
        <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
            <a href="home.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
            <a href="userpage.php" class="w3-bar-item w3-button" style="width:25% !important">USER</a>
            <a href="productpage.php" class="w3-bar-item w3-button" style="width:25% !important">PRODUCT</a>
            <a href="categorypage.php" class="w3-bar-item w3-button" style="width:25% !important">CATEGORY</a>
            <a href="#ads" class="w3-bar-item w3-button" style="width:25% !important">ADS</a>
        </div>
    </div>

    <div class="login12">
        <h1 class="text-align: left">Users</h1>
        <div <div style="float:right;">
        <i onclick="location.href='adduserpage.php';" style="cursor: pointer; font-size:36px; color: green;" class='fas fa-user-plus' ></i>
    </div>


        <table id="db">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Userrole</th>
                <th>Fullname</th>
            </tr>
            <?php
            $servername = "localhost";
            $username1 = "root";
            $password1 = "";
            $db = "ecommerce";
            // Create connection
            $con = mysqli_connect($servername, $username1, $password1,$db);
            $sql = "SELECT id, username, useremail, password, userrole, userfullname from users";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["useremail"]. "</td><td>" .$row["password"]. "</td><td>" .$row["userrole"]. "</td><td>" .$row["userfullname"]."</td></tr>";

            }
            } else {
            echo "0 results";
            }
            mysqli_close($con);
           ?>
        </table>

    </div>

    <div class="login12 login123">

                <form id="login123" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
                " method="post">
                <label>Username</label>
                <input type="username" id="username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

                <label>Email</label>
                <input type="email" id="email" name="useremail" class="form-control <?php echo (!empty($useremail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $useremail; ?>">
                <span class="invalid-feedback"><?php echo $useremail_err; ?></span>

                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>


                <label>Confirm Password</label>
                <input type="password" id="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                
                <label>Fullname</label>
                <input type="fullname" id="fullname" name="userfullname" class="form-control <?php echo (!empty($userfullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userfullname; ?>">
                <span class="invalid-feedback"><?php echo $userfullname_err; ?></span>




                <label>User Role</label>
                 <select name="userrole" class="form-control">
                                    <option value="">--Select Role-</option>
                                    <option value="1">Admin: 1</option>
                                    <option value="2">Data Entry: 2</option>
                                    <option value="3">Customer: 3</option>
                                </select>





                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
   
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </form>
    </div>

        <!-- End Contact Section -->
        <!-- END PAGE CONTENT -->

</body>
</html>
