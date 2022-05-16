<?php
require_once "config1.php";

error_reporting(0);

$categoryName_err=""; 
$categoryName = $_POST['categoryName'];
if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(empty(trim($_POST["categoryName"]))){
        $categoryName_err="fill";}
        if(empty($categoryName_err)){
        $sql = "INSERT INTO productcategory (categoryName) VALUE ('$categoryName')";
        if($stmt = mysqli_prepare($con, $sql)){
        $param_categoryName=$categoryName;

        mysqli_stmt_bind_param($stmt, "s", $param_categoryName);
        if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: categorypage.php");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        }
}
    
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

    .login12 {
        background-color: white;
        margin: 100px auto;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px #000;
        position: absolute;
        top: 10;
        bottom:;
        left: 0;
        right: 0;
        width: 1250px;
        height: 500px;
    }

    .login123 {
        width: 500px;
        height: 200px;
        overflow: hidden;
        margin: auto;
        padding: 40px;
        background: #f0f0f0;
        border-radius: 15px;

         top: 0;
        bottom:0;
        left: 0;
        right: 0;
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

    #fullname {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    input[type=text] {
        background-color: white;
        color: black;
    }

    input[type=submit] {
        background-color: #ffb833;
        border: none;
        color: white;
        padding: 5px 29px;
        text-decoration: none;
        margin: 15px 10px;
        cursor: pointer;
    }

    input[type=reset] {
        background-color: #ffb833;
        border: none;
        color: white;
        padding: 5px 29px;
        text-decoration: none;
        margin: 15px 10px;
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
        <h1 class="w3-large"><b>Ecommerce Website</b></h1>
    </header>

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <!-- Avatar image in top left corner -->
        <img src="logo.jpg" style="width:100%">
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="userpage.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>USER</p>
        </a>
        <a href="productpage.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fas fa-shopping-cart w3-xxlarge"></i>
            <p>PRODUCT</p>
        </a>
        <a href="categorypage.php" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fas fa-table w3-xxlarge"></i>
            <p>CATEGORY</p>
        </a>

        <a href="#Ads" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fas fa-ad w3-xxlarge"></i>
            <p>ADS</p>
        </a>

    </nav>

    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
        <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
            <a href="home.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
            <a href="userpage.php" class="w3-bar-item w3-button" style="width:25% !important">USER</a>
            <a href="productpage.php" class="w3-bar-item w3-button" style="width:25% !important">PRODUCT</a>
            <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CATEGORY</a>
            <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">ADS</a>
        </div>
    </div>


    <div class="login12">
        <h1 class="text-align: left">Category</h1>
        <div <div style="float:right;">
        <i onclick="location.href='addcategorypage.php';" style="cursor: pointer; font-size:36px; color: green;" class='fas fa-folder-plus' ></i>
    </div>


        <table id="db">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php
            $servername = "localhost";
            $username1 = "root";
            $password1 = "";
            $db = "ecommerce";
            // Create connection
            $con = mysqli_connect($servername, $username1, $password1,$db);
            $sql = "SELECT productCategoryID, categoryName from productcategory";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr><td>" . $row["productCategoryID"]. "</td><td>" . $row["categoryName"]."</td>
                    <td><a href='deluser.php?id=".$row['id']."' alt='edit'><i style='cursor: pointer; font-size:36px; color: red;' class='fas fa-user-minus' ></i></a></td>
                    <td><a href='edituser.php?id=".$row['id']."' alt='edit'><i style='cursor: pointer; font-size:36px; color: black;' class='fas fa-user-edit' ></i></a></td>

                    </tr> ";

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
                <label>Category Name</label>
                <input type="text" id="username" name="categoryName" placeholder="Category Name">
                


                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
   
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </form>
    </div>

        <!-- End Contact Section -->
        <!-- END PAGE CONTENT -->

</body>
</html>