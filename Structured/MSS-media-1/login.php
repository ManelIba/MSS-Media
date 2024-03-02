<?php
session_start();

include "setting/connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: first.php?error=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: first.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE Email='$email' AND PassWord='$password' ";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['UserName']= $row['UserName'];
            $_SESSION['UserId']= $row['User_Id'];
            $_SESSION['UserBirthday'] = $row['Birthdate'];
            $_SESSION['UserLocation'] = $row['Location'];
            $_SESSION['Useremail'] = $row['Email'];
            $_SESSION['Userbio']= $row['Bio'];
            $_SESSION['Userimg']= $row['img'];      
           
           
            if ($row['Email'] === $email && $row['PassWord'] === $password) {
                if ($row['Admin'] == 0) {
                   
                    header("Location: index.php");
                    exit();
                } else if ($row['Admin'] == 1) {
                    
                    header("Location: Admin.php");
                    exit();
                }
            } else {
                header("Location: first.php?error=Incorrect email or password");
                exit();
            }
        } else {
           
            header("Location: first.php?error=Query failed");
            exit();
        }
    }
} else {
    header("Location:first.php");
    exit();
}





?>
