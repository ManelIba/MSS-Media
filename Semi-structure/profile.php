<?php 
     require_once('login.php');
     require_once('header.php');
   


   $UserName = $_SESSION['UserName'] ;
   $userbirthday= $_SESSION['Birthdate'];
   $userbio= $_SESSION['Bio'];
   $userlocation=$_SESSION['Location'];
   $useremail = $_SESSION['Email'];
   $usereimg  = $_SESSION['img'] ;

   ?>
   

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MSS Media</title>
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

.partProfile{
     width: 550px;
     background-color: white;
 }

 .profile-container {
     width: 1000px;
     margin-top:6rem  ;
     margin-left:6rem  ;
     margin-right:6rem  ;
     margin-bottom:0.5rem  ;
     background-color:#ddd;
     border-radius: 5px;
     box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
     padding: 20px;
 }

 .profile-header {
     display: flex;
     justify-content: space-between;
     align-items: center;
     margin-bottom: 20px;
 }


 .profile-info {
     flex-grow: 1;
     margin-left: 20px;
 }

 .profile-name {
     font-size: 28px;
     font-weight: bold;
     margin-bottom: 10px;
     color: rgb(253, 88, 82);
 }

 .profile-username {
     font-size: 18px;
     color: #888;
     margin-bottom: 10px;
 }

 .profile-details {
     display: flex;
     justify-content: space-between;
 }

 .profile-detail {
     flex-basis: 33.33%;
     text-align: center;
 }

 .profile-detail-label {
     font-size: 14px;
     color: rgb(253, 88, 82);
 }

 .profile-detail-value {
     font-size: 18px;
     font-weight: bold;
 }

 .profile-bio {
margin-top: 20px;
font-size: 16px;
 display: block;
 flex-direction: column;
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
        
      </style>
  </head>

  <body>
  <div class="partProfile">
    <div class="profile-container">
        <div class="profile-header">
           <div ><img src="<?php echo  $usereimg ; ?>" class="img"></div>
            <div class="profile-info">
                <div class="profile-name"><?php echo  $UserName  ; ?></div>
                <div class="profile-Adminname">@<?php echo  $UserName ; ?></div>
              
                <div class="profile-details">
                    <div class="profile-detail">
                        <div class="profile-detail-label">location</div>
                        <div class="profile-detail-value"><?php echo $userlocation; ?></div>
                    </div>
                    <div class="profile-detail">
                        <div class="profile-detail-label">Birthdate</div>
                        <div class="profile-detail-value"><?php echo $userbirthday; ?></div>
                    </div>
                </div>

            </div>
        
        
          </div>


        <div class="profile-bio"> <?php echo $userbio; ?> </div>
       
        <a href="mycomment.php">
        <button style= "color: #fff; background-color: rgb(253, 88, 82);margin:3rem 3rem 0rem  0rem; padding: 0.3rem ;border-radius:10%;border:none;  ">My Comments</button>
    </a>
    <button onclick="show()" style= "color: #fff; background-color: rgb(253, 88, 82);margin:3rem 3rem 0rem  0rem; padding: 0.3rem ;border-radius:10%;border:none;  " >Add Post</button>

</div>
<!-- ********************************************************************************************************************************************************* -->
    
<main class="main-container" style=" margin-left:20rem; width:100%">  
      <section class="content-container">
        <div class="content">
          <div class="posts" >
 
<!--                 
            <article class="post"  >
           <div class="post__content" >
                <div class="post_content" >
                    <div class="post-header">
                      <div class="post__profile">
                        <a
                          target="_blank"
                          class="post__avatar"
                        >
                        <img src="<?php echo   $usereimg ; ?>" class="PetiteImg">
                        </a>
                        <a
                          target="_blank"
                          class="post__user"
                          ><?php echo $UserName  ?> </a
                        >  
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

     
            </article> 
             <div class="post_footer" >
             <div class="post__buttons">
                  <button class="post__button" >
                       <form action="loginAdmin.php" method="post">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                          d="M11.4995 21.2609C11.1062 21.2609 10.7307 21.1362 10.4133 20.9001C8.2588 19.3012 3.10938 15.3239 1.81755 12.9143C0.127895 9.76543 1.14258 5.72131 4.07489 3.89968C5.02253 3.31177 6.09533 3 7.18601 3C8.81755 3 10.3508 3.66808 11.4995 4.85726C12.6483 3.66808 14.1815 3 15.8131 3C16.9038 3 17.9766 3.31177 18.9242 3.89968C21.8565 5.72131 22.8712 9.76543 21.186 12.9143C19.8942 15.3239 14.7448 19.3012 12.5902 20.9001C12.2684 21.1362 11.8929 21.2609 11.4995 21.2609ZM7.18601 4.33616C6.34565 4.33616 5.5187 4.57667 4.78562 5.03096C2.43888 6.49183 1.63428 9.74316 2.99763 12.2819C4.19558 14.5177 9.58639 18.6242 11.209 19.8267C11.3789 19.9514 11.6158 19.9514 11.7856 19.8267C13.4082 18.6197 18.799 14.5133 19.997 12.2819C21.3603 9.74316 20.5557 6.48738 18.209 5.03096C17.4804 4.57667 16.6534 4.33616 15.8131 4.33616C14.3425 4.33616 12.9657 5.04878 12.0359 6.28696L11.4995 7.00848L10.9631 6.28696C10.0334 5.04878 8.6611 4.33616 7.18601 4.33616Z"
                          fill="red"
                          stroke="red"
                          stroke-width="3"
                           />
                        </svg>
                               <input      type="hidden"          name="id_post"   value="<?php echo $PostId; ?>">
                               <input type="submit" value="like"  name="like" style="border:none;">
                               <p><?php echo $row_count; ?></p>
                               
                       </form>
                  </button>              

                  <div class="post__indicators"></div>
                  <button class="post__button post__button--align-right"  onclick="showOverlay(' <?php echo  $PostId ?>')">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd"
                        d="M21.2959 20.8165L20.2351 16.8602C20.1743 16.6385 20.2047 16.3994 20.309 16.1907C21.2351 14.3342 21.5438 12.117 20.9742 9.80402C20.2003 6.67374 17.757 4.16081 14.6354 3.33042C13.7833 3.10869 12.9442 3 12.1312 3C6.29665 3 1.74035 8.47365 3.31418 14.5647C4.04458 17.3819 7.05314 20.2992 9.88344 20.9861C10.6486 21.173 11.4008 21.26 12.1312 21.26C13.7006 21.26 15.1701 20.8557 16.4614 20.1601C16.6049 20.0818 16.7657 20.0383 16.9222 20.0383C17.0005 20.0383 17.0787 20.047 17.157 20.0688L21.009 21.0991C21.0307 21.1035 21.0525 21.1078 21.0699 21.1078C21.2177 21.1078 21.3351 20.9687 21.2959 20.8165ZM19.0178 17.1863L19.6178 19.4253L17.4831 18.8558C17.3005 18.8079 17.1135 18.7819 16.9222 18.7819C16.557 18.7819 16.1875 18.8775 15.8571 19.0558C14.6963 19.6818 13.4441 19.9992 12.1312 19.9992C11.4834 19.9992 10.8269 19.9166 10.1791 19.7601C7.78354 19.1775 5.14453 16.6037 4.53586 14.2473C3.90111 11.7865 4.40109 9.26057 5.90536 7.31719C7.40964 5.3738 9.6791 4.26081 12.1312 4.26081C12.8529 4.26081 13.5876 4.35646 14.3137 4.5521C16.9961 5.26511 19.0786 7.39544 19.7525 10.1084C20.2264 12.0213 20.0308 13.9299 19.183 15.6298C18.9395 16.1168 18.8787 16.6689 19.0178 17.1863Z"
                        fill="var(--text-dark)"
                        stroke="var(--text-dark)"
                        stroke-width="0.7"
                      />
                    </svg>+ com
                  </button>
                </div>
                         
                      
                        </div>
 -->

          </div>
        </div>
      </section>
    </main>
<!-- **************************************************************************************************************************** -->
    <div class="blockOverlay" id="blockOverly">
          <div class="showBlock">      
              <button class="off" onclick="hideOverlay()">&times;</button>    
          <form  method="POST" action="loginAdmin.php" style="text-align: center;" >
                     
                 <textarea id="userComment" name="comment" placeholder=" Add your comment..." style="margin-top: 4rem; width: 100%; height: 15vh;font-size:20px;padding:3px;"></textarea>                    
                 <input      type="hidden"      name="id_post"   id="userIdInput">
                 <input      class="input"      type="submit"    name="addcomment"   onclick="return confirm('Are you sure you want to add this comment?');" style= "color: #fff; cursor: pointer;  background-color:black ;margin-top:1rem" value="add">
               
           </form>
       </div>
     </div>

                

  <!-- ************************************************************************************************************************** -->  
  <div class="blockOverlay" id="block">
    <div class="showBlock">
    <button class="off" onclick="hide()">&times;</button>         
       
        <form  action="loginAdmin.php" method="POST"   style="text-align: center;" action="#">              

            <input type="text"     id="Content"  placeholder="Content"   name="Content"      class="input" />
            <input type="file"     id="Content"  placeholder="Content"   name="ContentIMG"   class="input" /> 
            
            <input type="hidden"   name="id_user"   value="<?php echo $User_Id ?>">
            <input class="input"   type="submit"    value="ok" name="addpost" style= "color: #fff; cursor: pointer;  background-color:black ">      
        </form>
    
    </div>
</div> 
<!-- *************************************************************************************************************************** -->
<script>
    function show() {
        var overlay = document.getElementById('block');
        overlay.style.display = 'block';
    }

    function hide() {
        var overlay = document.getElementById('block');
        overlay.style.display = 'none';
    }

                
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
