<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Create Post</title>
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
        <link rel="stylesheet" href="./assets/styles/blog-home.css">
        <link rel="stylesheet" href="./assets/styles/create.css">

    </head>
    <body>
        <?php
			session_start();
			/*session is started if you don't write 
				this line can't use $_Session  global variable*/
			if(!isset($_SESSION['username'])){
				header('Location:./nologin.php');
			}
		?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> 
            <a class="navbar-brand" href="./home.php">Blogs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div hidden class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">
                    <?php echo $_SESSION['name'] ?> create and share a new post
                </span>
            </div>
            <ul class="nav navbar-nav ml-md--auto">
                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" 
                        data-toggle="dropdown" aria-expanded="false"> 
                        <i class="fas fa-user-circle isize"></i> <?php echo $_SESSION['username'] ?> 
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right" 
                            aria-labelledby="navbarDropdown">
                        <!-- ADDED CLASS -->
                        <a class="dropdown-item" href="#"><i class="fas fa-blog"></i> My Posts</a>
                        <a class="dropdown-item" href="./create.php">
                            <i class="fas fa-plus-square"></i> Create New Post</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./logout.php">Log out
                            <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <h1>Create post</h1>
                    <form id="create-post" method="POST" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="title">
                                <i class="fas fa-heading"></i>
                                Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title" required/>
                        </div>
                        <div class="form-group">
                            <label for="image">
                                <i class="fas fa-image"></i>
                                Load image <span class="require">*</span> <small>recommended image size: 900x300</small></label>
                            <input type="file" class="form-control" name="image" required/>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                <i class="fas fa-paragraph"></i>
                                Description <span class="require">*</span></label>
                            <textarea rows="5" class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">
                                <i class="far fa-edit"></i>
                                Content <span class="require">*</span></label>
                            <textarea rows="10" class="form-control" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <p><span class="require">*</span> - required fields</p>
                        </div>
                        <div class="form-group">
                            <a href="./home.php" class="btn btn-default">
                                <i class="far fa-times-circle"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Create
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
                    <div class="widgets">
                        <h5>Programación Web 2021</h5>
                        <p>
                            <ul>
                                <li>Joan Méndez Pool | 160300102</li>
                                <li>Uziel Torres Valera | 170300150</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <?php include_once("modals.html"); ?>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; <?php echo date("Y"); ?></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </footer>
        </div>
        <!-- /.container -->
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
        <script type="text/javascript" src="./assets/scripts/create-post-action.js"> </script>
    </body>
</html>
