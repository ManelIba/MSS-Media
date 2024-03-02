
<?php 
session_start();
  ?>

<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nelma'social">
    <meta name="author" content="Edlávio Alberto">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>MSS media</title>
    <style>
         .error{
            background:#F2DEDE;
            color :#A94442;
            padding:10px;
            width: 80%;
           
            border-radius :5px;
         }
        
    </style>

</head>
<body onload="SwitchScreen()">
        <section class="container">
           
         
            <article class="form-area">
                <div class="logo">
                     <h1 style="color: black;">MSS Media</h1>
                </div>
                <form action="login.php" method="post">

                <?php if ( isset($_GET['error']  ) ) { ?>
                <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php }?>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="submit" value="LOGIN" id="LOGIN" name="LOGIN">
                    <div class="other-option">
                        <div></div> <p>OU</p> <div></div>
                    </div>
                    <div class="options">
                        <div class="forget"> <a href="#">Forget password ?</a> </div>
                    </div>
                </form>
                
            
            </article>
        </section>
            <!-- FORM SECTION END -->
            <!-- FOOTER -->
        <footer>
            <div class="footer-content">
                <a href="#">Meta</a>
                <a href="#">About </a>
                <a href="#">Blog</a>
                <a href="#">Job</a>
                <a href="#">Help</a>
                <a href="#">API</a>
                <a href="#">Privacy</a>
                <a href="#"> Terms</a>
                <a href="#">Location</a>
                <a href="#">Instgram Life</a>
                <a href="#"> Thread</a>
                <a href="#">Contct Uploading & Non-Users</a>
                <a href="#">Meta verified</a>
            </div>
          
            <div class="copyright">
                <select aria-label="Trocar idioma de exibição">
                
                    <option value="en">English</option>
                    <option value="en-gb">English (UK)</option>
                    <option value="es">Español (España)</option>
                    <option value="es-la">Español</option>
                    <option value="fr">Français</option>
                
                <span>&copy; 2024 Nelma'social from Meta</span>
            </div>
        </footer>
    <script src="js/app.js"></script>
    <script src="js/brands.min.js"></script>
    <script src="js/fontawesome.min.js"></script>
</body>
</html>