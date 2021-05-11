<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log In & Sing Up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Boostrap -->
		<link rel="stylesheet" 
			href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
			integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
			crossorigin="anonymous">
		<!-- Font Awesome -->
		<link rel="stylesheet" 
			href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel='stylesheet' 
			href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link rel='stylesheet' 
			href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>      
        <!-- CSS files -->
        <link rel="stylesheet" href="./assets/styles/login.css">
	</head>
    <body class="p-3 mb-2">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Sing In <i class="fas fa-sign-in-alt"></i></h3>
                        <form id="singin-form">
                            <br>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fa fa-user text-primary"></i></div>
                                    </div>
                                    <input type="text" class="form-control" 
                                        name="user" placeholder="User *" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-lock text-primary"></i></div>
                                    </div>
                                    <input type="password" class="form-control" 
                                        name="password" placeholder="Password *" value="" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Sing In" />
                            </div>
                            <div class="form-group">
                                <a href="#" class="ForgetPwd">Forget Password?</a>
                            </div>
                        </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Sing Up <i class="fas fa-user-plus"></i></h3>
                        <form id="singup-form">
                            <br>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fa fa-font text-dark"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Name *" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fa fa-user text-dark"></i></div>
                                    </div>
                                    <input type="text" class="form-control" 
                                        name="user" placeholder="User *" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-lock text-dark"></i></div>
                                    </div>
                                    <input type="password"  pattern=".{8,}" class="form-control" 
                                        name="password" placeholder="8 characters minimum *" 
                                        value="" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Sing Up" />
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <?php include_once("modals.html"); ?>
        <!-- Footer -->
        <footer id="Foot" class="bg-dark text-center text-white">
                <div class="container-fluid">
                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © <?php echo date("Y"); ?> copyright:
                        <a class="text-white" href="https://www.unicaribe.mx/" target="blank_">
                            Universidad del Caribe</a>
                    </div>
                    <!-- Copyright -->
                </div>
            </footer>
        <!-- End Footer -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
			integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
			crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
			integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" 
			crossorigin="anonymous"></script>
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/ae2bc38384.js" crossorigin="anonymous"></script>
        <!-- Script -->
        <script type="text/javascript" src="./assets/scripts/Log-actions.js"> </script>
	</body>
</html>
