<?php
session_start();
if(!isset($_SESSION['username'])){

      header('login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head> 
<?php include 'links.php' ?>
<link rel="stylesheet" href="login.css">
</head>

<body>  
    <div class="container">
    <h1 class="text-center">Login Into Page</h1>
        <div class="card">
            <article class="card-body">
                <p class="text-center">Let's Login</p>
                <a href="" class="btn btn-block btn-twitter">Login via Twitter</a>
                <a href="" class="btn btn-block btn-facebook">Login via facebook</a>
                <br>

                <form class="form bg-light" action=" <?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">       
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="email" required>
                        
                        </div>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                        
                        </div>
                    </div>
                    <br>
                    <a href="#"> <button type="submit"  name="submit"  class="btn btn-primary" value="Submit">
                    login
                    </button>
              </a>

                    <br>
                    <p > don't have account  <a href="registration.php" >Sign Up </a>
                </form>
            </article>
        </div>
     
    </div>
</body>

</html>



<?php include 'connection.php'  ?>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailsearch = "SELECT * FROM registration WHERE email='$email' ";
    $query = mysqli_query($con,$emailsearch);
    $emailcount = mysqli_num_rows($query);


    if($emailcount){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password,$db_pass);

        $_SESSION['username']=$email_pass['username'];

            if($pass_decode){
                ?>
                <script>alert("login succusful");</script>
                <script> location.replace("home.php");</script>
                <?php
            }
            else{
                ?>
                <script>alert("password are not match");</script>
                <?php
            }

    }
    else{
        ?>
        <script>alert("email already exist");</script>
        <?php
    }

}

?>