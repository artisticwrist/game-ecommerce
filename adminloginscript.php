<?php
session_start();
include "connectadmin.php";

if (isset($_POST['aname']) && isset($_POST['apassword'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $aname = validate($_POST['aname']);
    $apass = validate($_POST['apassword']);

    if (empty($aname)) {
        header("Location: adminlogin.php?error=Admin Name is required");
        exit();
    }else if(empty($apass)){
        header("Location: adminlogin.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM adminlog WHERE user_name='$aname' AND passcode='$apass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $aname && $row['passcode'] === $apass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: admin.php");
                exit();  
            }else{
                header("Location: adminlogin.php?error=Incorrect admin name or password");
                exit();  
            }
        }else{
            header("Location: adminlogin.php?error=Incorrect admin name or password");
            exit();  
        }
    }

}else{
    header("Location: adminlogin.php");
    exit();
}