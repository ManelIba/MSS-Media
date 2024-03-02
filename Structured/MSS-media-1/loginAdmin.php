

<?php 
 session_start();
 include "setting/connect.php";


// ****************************************************************************
     
     
if (isset($_POST['LOGUP'])){

  if (isset($_POST['Full_Name'])) 
  $AdminName = $_POST['Full_Name'];
else 
  $$AdminName = "";

  if (isset($_POST['Email'])) 
    $Email = $_POST['Email'];
   else 
    $Email = "";
  

  if (isset($_POST['Password'])) 
    $PassWord = $_POST['Password'];
   else 
    $PassWord = "";
  

  if (isset($_POST['Birthdate'])) 
    $Birthdate = $_POST['Birthdate'];
  else 
    $Birthdate = "";


    if (isset($_POST['Location'])) 
    $Location = $_POST['Location'];
  else 
    $Location = "";
   
    if (isset($_POST['Bio'])) 
    $Bio = $_POST['Bio'];
  else 
    $Bio = "";

    if (isset($_POST['img'])) {
      $img =$_POST['img'];
    }  else {
      $img = "";
    }

    if(isset($_POST['img']))   $imagePath = './assets/' . $img;
    else $imagePath =  $img;

    $datetime = date('y-m-d H:i:s');


$query = "INSERT INTO `users` (`UserName`, `Email`, `PassWord`, `Birthdate`, `Location`, `Admin`, `Bio` , `created_at`,`img`)
                     VALUES ('$AdminName', '$Email', '$PassWord', '$Birthdate', '$Location', '0', '$Bio' , '$datetime', '$imagePath')";


$info=mysqli_query($conn,$query);
$_SESSION['message']= "Added successfully";

header("location:Admin.php");

}?>

<!-- // ***************************************************************************************************** -->
<?php

if (isset($_POST['user_id']) && isset($_POST['Delet'])  ) {

  $user_id = $_POST['user_id'];

   $query = "SELECT * FROM `posts` WHERE `User_ID`='$user_id'";
   $info = mysqli_query($conn, $query);

while ($row_infocc = mysqli_fetch_assoc($info)) { 
    $postID = $row_infocc['Post_Id'];
   
    $A = "DELETE FROM comments WHERE Post_ID = '$postID'";
    mysqli_query($conn, $A);
    
    $B = "DELETE FROM likes WHERE Post_Id = '$postID'";  
    mysqli_query($conn, $B);
} 

      $S = "DELETE FROM posts WHERE User_ID = '$user_id'";
      mysqli_query($conn, $S);

      $Q = "DELETE FROM users WHERE User_Id = '$user_id'";
  
    if (mysqli_query($conn, $Q)) {
      echo "User deleted successfully.";
  } else {
      echo "Error: " . mysqli_error($conn);
  }

    header("location:Admin.php");
  
   
}
// *************************************************************************
if (isset($_POST['user_id']) && isset($_POST['Update'])  ) {
 
  $query = " SELECT * FROM `users` WHERE `User_Id`= '{$_POST['user_id']}'";
  $info= mysqli_query($conn,$query);
  $row_info= mysqli_fetch_assoc($info);


  if (isset($_POST['Full_Name']) && $_POST['Full_Name'] === "") {
    $userName = $row_info['UserName'];
}  else {
    $userName = $_POST['Full_Name'];
}


if (isset($_POST['Email']) && $_POST['Email'] === "") {
   $Email = $row_info['Email'];
}  else {
  $Email = $_POST['Email'];
}


if (isset($_POST['PassWord']) && $_POST['PassWord'] === "") {
  $PassWord = $row_info['PassWord'];
}  else {
  $PassWord = $_POST['PassWord'];
}


if (isset($_POST['Birthdate']) && $_POST['Birthdate'] === "") {
  $Birthdate = $row_info['Birthdate'];
}  else {
  $Birthdate = $_POST['Birthdate'];
}


if (isset($_POST['Location']) && $_POST['Location'] === "") {
  $Location= $row_info['Location'];
}  else {
  $Location = $_POST['Location'];
}

if (isset($_POST['Bio']) && $_POST['Bio'] === "") {
  $Bio = $row_info['Bio'];
}  else {
  $Bio = $_POST['Bio'];
}


if (isset($_POST['img']) && $_POST['img'] === "") {
  $img = $row_info['img'];
} else {
  $img = $_POST['img'];
}

$imagePath = './assets/' . $img;

  $Admin = $row_info['Admin'];
  $datetime = date('y-m-d H:i:s');

  $query = "UPDATE `users` SET 
  `UserName`='$userName',
  `Email`='$Email',
  `Admin`='0',
  `PassWord`='$PassWord',
  `Birthdate`='$Birthdate',
  `Location`='$Location',
  `Admin`='$Admin',
  `Bio`='$Bio', 
  `img`='$imagePath', 
  `created_at`='$datetime' 
  WHERE `User_Id`='{$_POST['user_id']}'";

$info= mysqli_query($conn,$query);
 
 header("location:Admin.php");
 
}
 

  
 
//**********************************************************************************

if (isset($_POST['addcomment'])){

  $id_post = $_POST['id_post'];

  $comment = $_POST['comment'];

    $datetime = date('y-m-d H:i:s');


    $query = "INSERT INTO `comments` (`Post_ID`, `Content` , `creat_at`)
                     VALUES ('$id_post', '$comment', '$datetime')";


$info=mysqli_query($conn,$query);
$_SESSION['message']= "Added successfully";

header("location:mycomment.php");

}


//************************************************************ */
if (isset($_POST['addpost'])){

  if (isset($_POST['id_user'])){
    $user_id = $_POST['id_user']; 
  
    if (isset($_POST['Content'])) 
    $content = $_POST['Content'];
    else 
    $content = "";

    if (isset($_POST['ContentIMG'])) {
    $ContentIMG = $_POST['ContentIMG'];
    $Path = './assets/' . $ContentIMG;}
    else 
    $Path = "";
   
     $datetime = date('y-m-d H:i:s');
   
   
    $query = "INSERT INTO `posts` (`User_Id`,`Content`,`ContentIMG`, `creat_at`)
                       VALUES ('$user_id' ,' $content', '$Path', '$datetime')";
   
   
   $info=mysqli_query($conn,$query);
   $_SESSION['message']= "Added successfully";
   
   header("location:profile.php");
   
   }
  
  }




  //**********************************************************************************
  if (isset($_POST['like'])) {
    $id_post = mysqli_real_escape_string($conn, $_POST['id_post']);

    $query = "INSERT INTO `likes` (`Post_ID`) VALUES ('$id_post')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row_count = mysqli_affected_rows($conn);
        $_SESSION['message'] = "Added successfully: the post has $row_count likes";
    } else {
        // Handle the case where the query fails
        $_SESSION['message'] = "Error: Unable to add like.";
    }

    header("location: profile.php");
    exit(); // Ensure no further code execution after redirection
}


//************************************************************ */



?>
  