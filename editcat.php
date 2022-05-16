<?php

include "config1.php"; // Using database connection file here

$productCategoryID = $_GET['productCategoryID']; // get id through query string

$qry = mysqli_query($con,"select * from productcategory where productCategoryID='$productCategoryID'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $categoryName = $_POST['categoryName'];

    $edit = mysqli_query($con,"update productcategory set categoryName='$categoryName' where productCategoryID='$productCategoryID'");

    if($edit)
    {
        mysqli_close($con); // Close connection
        header("location:categorypage.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($con);
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
        display: inline;
        margin: 0;
        padding: 0;
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

    h1 {
        font-size: 32px;
        font-weight: 600;
        padding-bottom: 30px;
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
        height: 500px;
    }

    .login123 {
        width: 500px;
        height: 630px;
        overflow: hidden;
        margin:auto;
        padding: 80px;
        background: #f0f0f0;
        border-radius: 15px;
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

    #userrole {
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
        <h1 class="text-align: left">Category</h1>
        <div <div style="float:right;">
        <i onclick="location.href='categorypage.php;" style="cursor: pointer; font-size:36px; color: green;" class='fas fa-user-plus' ></i>
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
            $sql = "SELECT * from productcategory";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo " <tr>
                    <td>".$row['productCategoryID']."</td>
                    <td>".$row['categoryName']."</td>
                    <td><a href='delcat.php?productCategoryID=".$row['productCategoryID']."' alt='delete'><i style='cursor: pointer; font-size:36px; color: red;' class='fas fa-trash-alt' ></i></a></td>
                    <td><a href='editcat.php?productCategoryID=".$row['productCategoryID']."' alt='edit'><i style='cursor: pointer; font-size:36px; color: black;' class='fas fa-user-edit' ></i></a></td>
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


            <form id="login123" method="POST">

                <label>Category Name</label>
                <input type="text" id="username" name="categoryName" value="<?php echo $data['categoryName'] ?>" placeholder="Category Name" Required>


                <input type="submit" name="update" value="update">
            </form>
        </div>
