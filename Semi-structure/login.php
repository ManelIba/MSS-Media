<?php
 session_start();

$jsonFile = 'database.json';
$jsonData = json_decode(file_get_contents($jsonFile), true);



if (isset($_POST['email']) && isset($_POST['password'])) {
    $_SESSION['Name']= $_POST['email'];

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
    } elseif (empty($password)) {
        header("Location: first.php?error=Password is required");
        exit();
    } else {
        $authenticated = false;
        $isAdmin = false;

        foreach ($jsonData['users'] as $user) {
            if ($user['Email'] == $email && $user['PassWord'] == $password && $user['Admin'] == 0) {
                if (!empty($user['UserName'])) {
                    $_SESSION['UserName'] = $user['UserName'];
                } else {
                    $_SESSION['UserName'] = "";
                }

                if (!empty($user['PassWord'])) {
                    $_SESSION['PassWord'] = $user['PassWord'];
                } else {
                    $_SESSION['PassWord'] = "";
                }

                if (!empty($user['Email'])) {
                    $_SESSION['Email'] = $user['Email'];
                } else {
                    $_SESSION['Email'] = "";
                }

                if (!empty($user['Birthdate'])) {
                    $_SESSION['Birthdate'] = $user['Birthdate'];
                } else {
                    $_SESSION['Birthdate'] = "";
                }

                if (!empty($user['Location'])) {
                    $_SESSION['Location'] = $user['Location'];
                } else {
                    $_SESSION['Location'] = "";
                }

                if (!empty($user['Bio'])) {
                    $_SESSION['Bio'] = $user['Bio'];
                } else {
                    $_SESSION['Bio'] = "";
                }

                if (!empty($user['created_at'])) {
                    $_SESSION['created_at'] = $user['created_at'];
                } else {
                    $_SESSION['created_at'] = "";
                }

                if (!empty($user['img'])){
                    $_SESSION['img'] = $user['img'];
                } else {
                    $_SESSION['img'] = "";
                }
              
                $authenticated = true;

                break;
            } elseif ($user['Email'] == $email && $user['PassWord'] == $password && $user['Admin'] == 1) {
                $authenticated = true;
                $isAdmin = true;
             
                break;
            }
        }

        if ($authenticated) {
            if ($isAdmin) {
                header("Location: Admin.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            header("Location: first.php?error=Authentication failed");
            exit();
        }
    }
}

?>
