<?php
session_start();
require "header.php";
?>
    

    <div class="container-lg mt-5">
        <?php
            if(isset($_SESSION['userId'])){
            echo '
                <h3 class="text-center text-success">You are logged in!</h3>
            ';
            }
            else{
            echo '
                <h3 class="text-center">\'SIGNUP\' 버튼을 클릭하여 회원가입하세요.</h3>
            ';
            }
        ?>
    </div>



    <?php
require "footer.php";
?>