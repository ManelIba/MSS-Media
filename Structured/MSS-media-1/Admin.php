<?php
 session_start();
 require_once('setting/connect.php'); 

$query = " SELECT * FROM `users` WHERE `Admin`= '0'";
$info= mysqli_query($conn,$query);
$row_count = mysqli_num_rows($info);


$Admin = " SELECT * FROM `users` WHERE `Admin`= '1'";
$info1= mysqli_query($conn,$Admin);
$row_info1= mysqli_fetch_assoc($info1);

$IS;


//********************************************************************************

require_once('headerAdmin.php');


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            padding:0px 12.5rem;
            margin-top:5rem;
        }
        .partProfile{
            width: 550px;
            background-color: white;
        }

        .profile-container {
            width: 1000px;
            margin:10 auto;
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

        .img{
            width: 150px;
            height: 150px;
            border-radius: 50%; 
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

        .profile-Bio {
            margin-top: 20px;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
        }

        .center-table {
        width: 1000px;
        margin: 1rem auto;
       
    }
    th{
       background-color:rgb(253, 88, 82);
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
  height: 90vh ;
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

  
</style>


<div class="partProfile">
    <div class="profile-container">
        <div class="profile-header">
        <div ><img src="<?php echo $row_info1['img']; ?>" class="img"></div>
            <div class="profile-info">
                <div class="profile-name"><?php echo  $row_info1['UserName']; ?></div>
                <div class="profile-Adminname">@<?php echo $row_info1['UserName']; ?></div>
              
                <div class="profile-details">
                    <div class="profile-detail">
                        <div class="profile-detail-label">Utilisateurs</div>
                        <div class="profile-detail-value"><?php echo $row_count; ?></div>
                    </div>
                   
                    <div class="profile-detail">
                        <div class="profile-detail-label">location</div>
                        <div class="profile-detail-value"><?php echo $row_info1['Location']; ?></div>
                    </div>
                    <div class="profile-detail">
                        <div class="profile-detail-label">birthdate</div>
                        <div class="profile-detail-value"><?php echo $row_info1['Birthdate']; ?></div>
                    </div>
                </div>
              
            </div>
        </div>

       <div class="profile-Bio">
    <div><?php echo $row_info1['Bio']; ?></div>
    <div><?php echo $row_info1['Email']; ?></div>
    <div><?php echo $row_info1['created_at']; ?></div>
    <div><button onclick="show('1')"><i class="fas fa-pen"></i></button></div>
</div>
        
    </div>

    
<button onclick="showOverlay()" style= "color: #fff; background-color:rgb(95, 0, 37);margin-top:3rem; " >Add user</button>


<table class="center-table" border="1">
    <tr>
        <th>userId</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Birthday</th>
        <th>location</th>
        <th>Bio</th>
        <th>created at</th>
        <th>Modification</th>
    </tr>

    <?php while ($row_info = mysqli_fetch_assoc($info)) { 
        $ID=$row_info['User_Id'];

    ?>

        <tr>
            <td><?php echo $row_info['User_Id']; ?></td>
            <td><?php echo $row_info['UserName']; ?></td>
            <td><?php echo $row_info['Email']; ?></td>
            <td><?php echo $row_info['PassWord']; ?></td>
            <td><?php echo $row_info['Birthdate']; ?></td>
            <td><?php echo $row_info['Location']; ?></td>
            <td><?php echo $row_info['Bio']; ?></td>
            <td><?php echo $row_info['created_at']; ?></td>
            <td>
            
            <div style="display: flex; align-items: center;">
                <form method="POST" action="loginAdmin.php">
                    <input    type="hidden"   name="user_id"             value="<?php echo $ID; ?>">
                    <input    type="submit"   name="Delet"               onclick="return confirm('Are you sure you want to delete this user? <?php echo $ID; ?>');" style="margin-left: 20px; margin-right: 10px;padding:1px;" value="Del">
                    
                </form> 
 
                    <button   onclick="show('<?php echo $ID; ?>')" ><i class="fas fa-pen"></i></button>
               
            </div>
             
        </td>
        </tr>
    <?php } ?>
</table>



<!-- ********************************************************************************************************************************** -->
    <div class="blockOverlay" id="block">
                <div class="showBlock">  
                          <button class="off" onclick="hide()">&times;</button>

                          <input type="hidden" name="Value" id="Value">

                          <form action="loginAdmin.php" method="POST" style="text-align: center;">
                              <div style="display: flex; align-items: center;">
                                <h1 style="margin-bottom: 20px; color: #333;" id="idValue"></h1>                       
                                <h1 style="margin-bottom: 20px; color: #333;"> ---User's information</h1>                         
                              </div>                   
                            
                             <input type="text"            placeholder="Full Name"   name="Full_Name"    class="input" />
                             <input type="email"           placeholder="Email"       name="Email"        class="input" />
                             <input type="password"        placeholder="Password"    name="PassWord"     class="input" />
                             <input type="date"            placeholder="Birthday"    name="Birthdate"    class="input" />
                             <input type="text"            placeholder="Location"    name="Location"     class="input" />
                             <input type="text"            placeholder="Bio"         name="Bio"          class="input" />        
                             <input type="file"            name="img"                class="input" />        
                            
                             <input type="hidden" name="user_id"  id="userIdInput" >
                             <input class="input" type="submit"   value="Update" name="Update" style="color: #fff; cursor: pointer; background-color: black;">
                       </form>
                 </div>
      </div>  



<div class="blockOverlay" id="blockOverlay">
        <div class="showBlock">
            <button class="off" onclick="hideOverlay()">&times;</button>         
           
            <form  action="loginAdmin.php" method="POST"   style="text-align: center;" action="#">              
                <h1 style="margin-bottom: 20px; color: #333;">User's information</h1>
                <input type="text"         placeholder="Full Name"   name="Full_Name"   class="input" />
                <input type="email"        placeholder="Email"       name="Email"       class="input" />
                <input type="password"     placeholder="Password"    name="Password"    class="input" />
                <input type="date"         placeholder="Birthday"    name="Birthdate"    class="input" />
                <input type="text"         placeholder="Location"    name="Location"    class="input" />
                <input type="text"         placeholder="Bio"         name="Bio"         class="input" />        
                <input type="file"         name="img"                class="input" />
                <input class="input"       type="submit"             value="ok"         name="LOGUP" style= "color: #fff; cursor: pointer;  background-color:black ">      
                
            
            </form>
        
        </div>
    </div>    
 

<script>
    

      function showOverlay() {
            var overlay = document.getElementById('blockOverlay');
            overlay.style.display = 'block';
        }

        function hideOverlay() {
            var overlay = document.getElementById('blockOverlay');
            overlay.style.display = 'none';
        }
       
       function show(user_id) {
           var overlay = document.getElementById('block');
           overlay.style.display = 'block';
           document.getElementById('idValue').textContent = user_id;
           document.getElementById('Value').value = user_id;
           document.getElementById('userIdInput').value = user_id; 
}             
        
     

    function hide() {
        var overlay = document.getElementById('block');
        overlay.style.display = 'none';
    }


</script>