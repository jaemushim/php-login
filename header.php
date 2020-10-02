<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">
        <img src="logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
          </ul>

          <?php
                if(isset($_SESSION['userId'])){
                  echo '
                  <form action="includes/logout.inc.php" class="form-inline my-lg-0">
                    <button class="btn my-0 my-sm-0 btn-dark" name="logout-submit" type="submit">LOGOUT</button>
                  </form>
                  ';
                }
                else{
                  echo '
                  <form action="includes/login.inc.php" method="post" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="mailuid" type="text" placeholder="E-mail / Username" aria-label="Id">
                    <input class="form-control mr-sm-2"  name="pwd" type="password" placeholder="Password" aria-label="Password">
                    <button class="btn my-0 my-sm-0 btn-dark" name="login-submit" type="submit" >LOGIN</button>
                  </form>
                  <a href="signup.php" class="btn my-0 my-sm-0 btn-light">SIGN UP</a>
                  ';
                }
          ?>
        </div>
      </div>
    </nav>