<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
	<link rel="stylesheet" href="../../../VIEW/css/login.css">
</head>

<body>
    <main>
        <section>
            <div id="container">
            <!-- zone de connexion -->            
                <form action="usersController.php?action=loginA" method="POST">
                    <div class="form_header"> 
                        <h1>Welcome Back</h1> 
                        <img src="../../../VIEW/images/my_logo_app.png" />
                    </div>
                    <h3 style="color : white ; display : flex ; justify-content : center ; position : relative ; top : -10px ;"><?php echo @$reponse ; ?></h3>


                    <div class="input-container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                    </div>
                    
                    <div class="input-container">
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                    </div>

                    <div class="link account_recovering"> 
                        <a href="#"> Did you forget your password ? </a> 
                    </div>
                                             
                    <div class="input_submit">
                        <input type="submit" id='submit' value='Login' >
                    </div>

                    <div class="go_submit"> 
                       <span> You don't have an account yet ? click<a href="usersController.php?action=signup"> here  </a> <span>
                    <div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
