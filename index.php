<?php
include 'server.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>