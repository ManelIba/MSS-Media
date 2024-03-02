<?php 
session_start();
     require_once('header.php');

  //  require_once('login.php');
   require_once('setting/connect.php'); 
   $User_Id = $_SESSION['UserId'] ;
   $UserName = $_SESSION['UserName'] ;
   $usereimg= $_SESSION['Userimg'];
   
   $query = "SELECT * FROM `posts` WHERE `User_Id` = '$User_Id'
    AND `Post_Id` IN (SELECT DISTINCT `Post_Id` FROM `comments`)";

   $info = mysqli_query($conn, $query);



  //  $row_info = mysqli_fetch_assoc($info);

   $row_count = mysqli_num_rows($info);

  
   ?>
   


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Social Media</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="script.js" defer></script>
  

    <style>
      .imgPost{
  width: 100%;
  height: 50vh;
      
 }
 .img{
     width: 150px;
     height: 150px;
     border-radius: 50%; 
 }

 .PetiteImg{
     width: 100%;
     height: 100%;
 }

      .blockOverlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.showBlock{
  position: absolute ;
  top: 50% ;
  left: 50% ;
  transform: translate(-50%, -50%) ;
  width: 400px ;
  height: 40vh ;
  background: linear-gradient(-225deg,white,rgb(253, 88, 82), white);
  border: 3px solid black;
  padding: 20px ;
  text-align: center;
  border-Radius: 10px ;
 
 }
 .off{
    position: absolute;
    top: 10px;
    right: 10px;
    font-Size: 50px;
    background-Color: red;
    border: none;
    border-Radius: 50% ;
    width: 50px;
    height: 50px ;
    display: flex ;
    justify-Content: center;
    align-Items: center ;
    cursor: pointer ;
    box-Shadow: 0 2px 5px rgba(0, 0, 0, 10);
   }
 
.showBlock h1 {
  margin-bottom: 20px;
  margin-top:40px;
  text-align: center;
  color: #333;
}

.showBlock .input {
  margin-bottom: 10px;
  padding: 5px;
  width: 200px;
}

.showBlock button {
  background-color: var(--colr3);
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}



      .post_content{

             width: 100%;

      }
      .comment-button {
  background-color: #d74652;
  color: #fff;
  padding: 8px 12px; /* Adjusted padding for a smaller button */
  
  border: none;
  border-radius: 100%;
  cursor: pointer;
  float: right; /* Align to the right */
  margin-top: 5px; 
  margin-left: 90%;
  transition: background-color 0.3s;
}

.comment-button:hover {
  background-color: #860e2a;
}

        .post-container {
          max-width: 600px;
          margin: 20px auto;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
          overflow: hidden;
        }
    
        .post-header {
          padding: 20px;
          border-bottom: 1px solid #eee;
        }
    
        .post-content {
          padding: 20px;
        }
    
        .comment-container {
          margin-top: 20px;
        }
    
        .comment {
          background-color: #f9f9f9;
          border: 1px solid #eee;
          border-radius: 4px;
          margin-bottom: 10px;
          padding: 10px;
        }
        .comment h5{
          text-align: right;
          margin-left: 10%;
        }

        .post_footer{
          width:100%;
        }
      </style>
  </head>

  <body>
        
    <main class="main-container">  
      <section class="content-container">
        <div class="content">
          <div class="posts" >
 
          <?php while ($row_info = mysqli_fetch_assoc($info)) {           
                   $PostId = $row_info['Post_Id'];
                   $que = "SELECT * FROM `comments` WHERE `Post_ID`='$PostId'";
                   $comments_result = mysqli_query($conn, $que);          
            ?>

            <article class="post"  >
                      <div class="post__content" >
                          <div class="post_content" >
                              <div class="post-header">
                                   <div class="post__profile">
                                       <a  target="_blank"    class="post__avatar"  >  <img src="<?php echo  $usereimg ; ?>" class="PetiteImg"> </a>
                                       <a  target="_blank"    class="post__user"    > <?php echo $UserName  ?> </a >  
                                   </div><h5>Posted on: <?php echo $row_info['creat_at']; ?></h5>
                              </div>
                            <div class="post-content">
                                <p> <?php echo $row_info['Content']; ?></p>
                                <?php if ($row_info['ContentIMG'] === "./assets/") { 
                                  echo '';
                              } else { ?>
                                    <img src="<?php echo $row_info['ContentIMG']; ?>" class="imgPost">
                                <?php } ?>

                          </div>
                      </div>

                      <div class="post_footer" >
                           <div class="comment-container"  >
                                <?php while ($row_infocc = mysqli_fetch_assoc( $comments_result)) {   ?>
                                   <div class="comment">
                                        <div class="post__profile">
                                            <a target="_blank"   class="post__avatar"  >  <img src="<?php echo  $usereimg ; ?>" class="PetiteImg"> </a>
                                            <a target="_blank"   class="post__user"    > <?php echo $UserName  ?> </a>  <h5> <?php echo $row_infocc['creat_at']; ?></h5> 
                                         </div> 
                                             <?php echo $row_infocc['Content']; ?></p>
                                    </div>
                                 <?php  } ?>
                           </div>
                           <button onclick="showOverlay(' <?php echo  $PostId ?>')" class="comment-button">   +   </button>
                        </div>
            </article>
            
        
   <?php  } ?>

          </div>
        </div>
      </section>
    </main>

<!-- *************************************************************************************************************** -->
<div class="blockOverlay" id="blockOverly">
              <div class="showBlock">   
                    
                        <form  method="POST" action="loginAdmin.php" style="text-align: center;" >
                     
                            <textarea   id="userComment"   name="comment"                  placeholder="   Add your comment..." style="width: 100%; hight:50%;"></textarea>
                            <button     class="input"      onclick="hideOverlay()"         style= "color: #fff; cursor: pointer;  background-color:rgb(203, 23, 68) ">cancel </button>  
                     
                            <input      type="hidden"      name="id_post"   id="userIdInput">
                            <input      class="input"      type="submit"    name="addcomment"   onclick="return confirm('Are you sure you want to add this comment?');" style= "color: #fff; cursor: pointer;  background-color:rgb(203, 23, 68) " value="add">
               
                        </form>
                    </div>
     </div>

                 <script>    
                     
                             function showOverlay(ID) {
                                   var overlay = document.getElementById('blockOverly');
                                   overlay.style.display = 'block';                                 
                                   document.getElementById('userIdInput').value = ID;
                                   
                           }
                             function hideOverlay() {
                                var overlay = document.getElementById('blockOverly');
                                overlay.style.display = 'none';
                              }
                 </script>


  </body>
</html>
