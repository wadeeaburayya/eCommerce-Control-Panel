<?php
require_once "config1.php";

error_reporting(0);
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
            display:inline;


    }
    #adduser{
        text-align: right;
        display: inline-block;
        }
    #deluser{
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
        bottom: ;
        left: 0;
        right: 0;
        width: 1250px;
        height: 780px;
    }

    h1 {
        font-size: 32px;
        font-weight: 600;
        padding-bottom: 30px;
    }

    label {
        position: relative;
        margin-left: 5px;
        margin-right: 10px;
        top: 5px;
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    #username {
        margin: 10px 0px;
        border: none;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 18px;
        font-family: poppins;
    }

    #email {
        margin: 10px 0px;
        border: none;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 18px;
        font-family: poppins;
    }

    #password {
        margin: 10px 0px;
        border: none;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 18px;
        font-family: poppins;
    }

    input[type=text] {
        font-size: 32px;
        font-weight: 600;
        padding-bottom: 30px;
        text-align: center;
        margin: 10px 0px;
        border: none;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 18px;
        font-family: poppins;
    }

    input[type=submit] {
        background-color: deepskyblue;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        padding: 10px;
        margin: 20px 0px;
    }
    #db {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 70%;
}
    
    #db td, #db th {
        border: 1px solid #ddd;
        padding: 8px;
}

    #db tr:nth-child(even){background-color: #f2f2f2;}

    #db tr:hover {background-color: #ddd;}

    #db th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #f59123;
        color: white;
        }
        
       
       
         table.scrolldown tbody, table.scrolldown thead {
            display: block;
        } 
          
        
         table.scrolldown {
            width: 100%;
              
            /* border-collapse: collapse; */
            border-spacing: 0;
            border: 2px solid black;
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
            <a href="#product" class="w3-bar-item w3-button" style="width:25% !important">PRODUCT</a>
            <a href="categorypage.php" class="w3-bar-item w3-button" style="width:25% !important">CATEGORY</a>
            <a href="#ads" class="w3-bar-item w3-button" style="width:25% !important">ADS</a>
        </div>
    </div>

    <div class="login12">
        <h1 class="text-align: left">Users</h1>
    <div <div style="float:right;">
        <i onclick="location.href='adduserpage.php';" style="cursor: pointer; font-size:36px; color: green;" class='fas fa-user-plus' ></i>

    </div>

        <table id="db" class="scrolldown">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Full Name</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php

            
            $records = mysqli_query($con,"select * from users"); // fetch data from database

            while($row = mysqli_fetch_array($records))
            {
                
                echo " <tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["useremail"]."</td>
                    <td>".$row["password"]."</td>
                    <td>".$row["userrole"]."</td>
                    <td>".$row["userfullname"]."</td>
                    <td><a href='deluser.php?id=".$row['id']."' alt='edit'><i style='cursor: pointer; font-size:36px; color: red;' class='fas fa-user-minus' ></i></a></td>
                    <td><a href='edituser.php?id=".$row['id']."' alt='edit'><i style='cursor: pointer; font-size:36px; color: black;' class='fas fa-user-edit' ></i></a></td>

                    </tr> ";
                    }
                        ?>
                </table>

    </div>
    
    <!-- End Contact Section -->
    <!-- END PAGE CONTENT -->

</body>
</html>
