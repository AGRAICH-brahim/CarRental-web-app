<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../VIEW/css/signup.css">
    <title>SIGNUP</title>
</head>
<body>
    <main>
    <section>
        <div id="container">
            <form action="usersController.php?action=saveuser" method="POST">

                <div class="form_header"> 
                    <h1>Create Account</h1> 
                    <img src="../../../VIEW/images/my_logo_app.png" />
                </div>

                <div>
              
                <h3 style="color : white ; display : flex ; justify-content : center ; position : relative ; top : -10px ;"><?php echo @$result ;?></h3>
    
                </div>

                <div class="input-container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>
                </div>

                <div class="input-container">
                    <label for="email"><b>Email</b></label>
                    <input type="email" id="email" placeholder="Entrer votre email" name="email" required>
                </div>

                <div class="input-container">
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </div>

                <div class="input-container">
                    <label for="confirm-password">Confirm Password</label>
                     <input type="password" placeholder="Confirmer le mot de passe" id="confirm-password" name="confirm-password" required>
                </div>

                <div class="input_submit">
                        <input type="submit" id='submit' value='Sign Up' >
                </div>
                
                <div class="go_submit"> 
                       <span> Already have an account ? click<a href="usersController.php?action=login"> here  </a> <span>
                    <div>

             </form> 
        </div>
    </section>
    </main>
     
</body>
</html>



