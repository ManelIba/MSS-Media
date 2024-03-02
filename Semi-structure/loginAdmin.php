

<?php 
 session_start();

 $jsonFile = 'database.json';
 $data = json_decode(file_get_contents($jsonFile), true); 

// ****************************************************************************


if (isset($_POST['LOGUP'])) {
  
    $AdminName = isset($_POST['Full_Name']) ? $_POST['Full_Name'] : "";
    $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
    $PassWord = isset($_POST['Password']) ? $_POST['Password'] : "";
    $Birthdate = isset($_POST['Birthdate']) ? $_POST['Birthdate'] : "";
    $Location = isset($_POST['Location']) ? $_POST['Location'] : "";
    $Bio = isset($_POST['Bio']) ? $_POST['Bio'] : "";

  

    if (!empty($_POST['img']) )   $imagePath = './assets/' . $img;
    else   $imagePath =  $img;

    $datetime = date('y-m-d H:i:s');

    $newUser = [
        "User_Id" => uniqid(),
        "UserName" => $AdminName,
        "Email" => $Email,
        "PassWord" => $PassWord, // Assuming Password is the correct field name 
        "Birthdate" => $Birthdate,
        "Location" => $Location,
        "Bio" => $Bio,
        "Admin" => "0",
        "Posts" => [],
        "created_at" => $datetime,
        "img" => $imagePath,
    ];

  
   // Load existing data from JSON file
    $data['users'][] = $newUser; // Add the new user
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));    // Save the updated data back to the JSON file

    header("location: Admin.php");

    exit();
}
?>


<!-- // ******************************************************************************************************************* -->
<?php

if (isset($_POST['user_id']) && isset($_POST['Delet'])  ) {

  $user_id = $_POST['user_id'];

  foreach ($data['users'] as $key => $user) {
      if ($user['User_Id'] == $user_id) {
          unset($data['users'][$key]);
          break;
      }
  }
  

  $updatedJsonData = json_encode( $data, JSON_PRETTY_PRINT);
  file_put_contents($jsonFile, $updatedJsonData);

  header("Location: Admin.php");
  exit();   
}
// **************************************************************************************************************************
if (isset($_POST['user_id']) && isset($_POST['Update'])  ) {
 
  $user_id = $_POST['user_id'];


  foreach ($data['users'] as $key => $user) {     
  if ($user['User_Id'] == $user_id) {

  $AdminName =!empty($_POST['Full_Name']) ? $_POST['Full_Name'] : $user['UserName']; 
  $Email     =!empty($_POST['Email']) ? $_POST['Email'] : $user['Email'];
  $PassWord  =!empty($_POST['PassWord']) ? $_POST['PassWord'] : $user['PassWord'];
  $Birthdate =!empty($_POST['Birthdate']) ? $_POST['Birthdate'] : $user['Birthdate'];
  $Location  =!empty($_POST['Location']) ? $_POST['Location'] : $user['Location'];
  $Bio       =!empty($_POST['Bio']) ?  $_POST['Bio']: $user['Bio'];

 

  $img = !empty($_POST['img']) ? $_POST['img'] : $user['img'];

  if (!empty($_POST['img']) )   $imagePath = './assets/' . $img;
  else   $imagePath =  $img;



  $datetime = date('y-m-d H:i:s');

  $data['users'][$key]['UserName'] = $AdminName;
  $data['users'][$key]['Email'] = $Email;
  $data['users'][$key]['PassWord'] = $PassWord;
  $data['users'][$key]['Birthdate'] = $Birthdate;
  $data['users'][$key]['Location'] = $Location;
  $data['users'][$key]['Bio'] = $Bio;
  $data['users'][$key]['img'] =   $imagePath;
  $data['users'][$key]['created_at'] = $datetime;
   
  break;
}
}

$updatedJsonData = json_encode( $data, JSON_PRETTY_PRINT);
file_put_contents($jsonFile, $updatedJsonData);

  header("Location: Admin.php");
  exit();

}
 

  
 
//**********************************************************************************

if (isset($_POST['addcomment'])) {
  $id_post = $_POST['id_post'];
  $comment = $_POST['comment'];
  $datetime = date('y-m-d H:i:s');


  $jsonFilePath = 'database.json'; 
  $jsonFileContent = file_get_contents($jsonFilePath);

  if ($jsonFileContent === false) {
      die('Error reading JSON file');
  }


  $data = json_decode($jsonFileContent, true);

  if ($data === null) {
      die('Error decoding JSON');
  }
  foreach ($data['posts'] as &$post) {
      if ($post['Post_Id'] == $id_post) {
          
          $post['Comments'][] = [
              "Comment_Id" => uniqid(),
              "Content" => $comment,
              "Created_At" => $datetime
          ];
          break;
      }
  }

  file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

  $_SESSION['message'] = "Comment added successfully";
  header("location: mycomment.php");
  exit();
}

//************************************************************ */
if (isset($_POST['addpost'])) {
  if (isset($_POST['id_user'])) {
      $user_id = $_POST['id_user'];

      if (isset($_POST['Content'])) {
          $content = $_POST['Content'];
      } else {
          $content = "";
      }

      $datetime = date('y-m-d H:i:s');

      foreach ($_SESSION['users'] as $key => &$user) {
          if ($user['User_Id'] == $user_id) {
              $user['Posts'][] = [
                  "Post_Id" => uniqid(),
                  "Content" => $content,
                  "Created_At" => $datetime
              ];
              break;
          }
      }

      $jsonFile = 'database.json'; 
      file_put_contents($jsonFile, json_encode($_SESSION['users'], JSON_PRETTY_PRINT));

      $_SESSION['message'] = "Added successfully";
      header("location: profile.php");
      exit();
  }
}





  //**********************************************************************************
  if (isset($_POST['like'])) {
    $id_post = mysqli_real_escape_string($conn, $_POST['id_post']);
    $jsonFilePath = 'database.json';
    $jsonFileContent = file_get_contents($jsonFilePath);

    if ($jsonFileContent === false) {
        die('Error reading JSON file');
    }

    $data = json_decode($jsonFileContent, true);

    if ($data === null) {
        die('Error decoding JSON');
    }

    foreach ($data['posts'] as &$post) {
        if ($post['Post_Id'] == $id_post) {
            $post['Likes'][] = [
                "Like_Id" => uniqid(),
                  "Post_Id"=>$id_post
            ];
            break;
        }
    }

    file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

    $_SESSION['message'] = "Like added successfully";
    header("location: profile.php");
    exit();
}


//************************************************************ */



?>
  