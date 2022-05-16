<?php
include "config1.php"; // Using database connection file here

$productCategoryID = $_GET['productCategoryID']; // get id through query string

$del = mysqli_query($con,"delete from productcategory where productCategoryID = '$productCategoryID'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:categorypage.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
};
?>