<?php
require "header.php";
?>


    <div class="container-lg mt-5">
        <hr class="my-5 invisible ">
        <hr class="my-5 invisible ">
        <div class="col-6 m-auto">
        <div>
            <form action="includes/login.inc.php" method="post"> 
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control"  name="mailuid" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pwd" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary"  name="login-submit">Login</button>
                <button type="submit" class="btn btn-primary"  name="logout-submit">Logout</button>
            </form>
            <hr>
            <a href="signup.php">Signup</a>
        </div></div>
    </div>



    <?php
require "footer.php";
?>