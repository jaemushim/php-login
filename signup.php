<?php
require "header.php";
?>


<section>
   <div class="container text-center mt-5">
   <h1 class="mb-4">Signup</h1>
        <form action="includes/signup.inc.php" method="post">
        <div class="form-group col-3 m-auto mb-4">
            <input type="text" class="form-control mb-3" name="uid" placeholder="Username">
        </div>
        <div class="form-group col-3 m-auto">
            <input type="email" class="form-control  mb-3"name="mail"  placeholder="Email address">
        </div>
        <div class="form-group col-3 m-auto">
            <input type="password" class="form-control mb-3" name="pwd"  placeholder="Password">
        </div>
        <div class="form-group col-3 m-auto">
            <input type="password" class="form-control  mb-3" name="pwd-repeat"  placeholder="Repeat Password">
        </div>
        <button type="submit" name="signup-submit" class="btn btn-primary">Sign up</button>
        </form>
    </div>
</section>



<?php
require "footer.php";
?>

