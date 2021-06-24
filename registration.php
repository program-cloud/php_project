<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>registration</title>
 <?php  include 'links.php' ?>
 

 
 <link rel="stylesheet" href="regi.css">


</head>
    <body>
        <div class="container">
            <h1 class="text-success text-center ">
                Create Account</h1>
        
           <div class="card">

           <article class="card-body ">
           <p class="text-center">let's start free account</p>
           <a href="" class="btn btn-block btn-twitter">  Login via Twitter</a>
           <a href="" class="btn btn-block btn-facebook">  Login via facebook</a>

	      <br>
           <form class="form  bg-light" action=" <?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" >
               
               <div class="form-group input-group">
               <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                 <input type="text" name="username" id="user" class="form-control " placeholder="username" required>

                </div>
               </div>

                <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                 <input type="email" name="email" id="email" class="form-control " placeholder="email" required>

                </div>
                </div>

                <div class="form-group input-group ">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                 <input type="number" name="mobile" id="mobile" class="form-control" placeholder="mobileno" required>
                </div>
                </div>


                <div class="form-group input-group ">
                <div class="input-group-prepend"> 
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                </div>
                </div>
                <div class="form-group input-group ">
                <div class="input-group-prepend"> 
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="repassword" required>
                </div>
                </div>
                <br>
            
                  <a href="login.php"> <button type="submit"  name="submit"  class="btn btn-primary" value="Submit">
                    submit
                    </button>
              </a>
              <br>
              <p>
                  have you account..?   <a href="login.php" class="form-link">Login</a>
              </p>
            
           </form>
        </article>
    </div>    
        </div>
    </body>
</html>


<!--connection-->
<?php include 'connection.php' ?>

<?php
if (isset($_POST['submit'])){

$username = mysqli_real_escape_string($con, $_POST['username']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$mobile =mysqli_real_escape_string($con,$_POST['mobile']);
$password =mysqli_real_escape_string($con,$_POST['password']);
$cpassword =mysqli_real_escape_string($con,$_POST['cpassword']);

$pass = password_hash($password,PASSWORD_BCRYPT);
$cpass = password_hash($cpassword,PASSWORD_BCRYPT);


$emailquery = "SELECT * FROM registration WHERE email='$email' " ;
$query = mysqli_query($con,$emailquery);
$emailcount = mysqli_num_rows($query);

    if($emailcount > 0){
        ?>
        <script>alert("Email already exist");</script>
        <?php 
    }
    else{
        if($password===$cpassword){
            $insertquery ="INSERT INTO `registration`(username, email, mobile, password, cpassword) 
            VALUES ('$username','$email','$mobile','$pass','$cpass')";
            $iquery =mysqli_query($con,$insertquery);
    
            if($iquery){
                
                 ?>
                 <script>alert("data inserted properly");</script>
                 <script>location.replace("login.php");</script>
                 <?php
            }
            else{
                ?>
                 <script>alert("data  not inserted properly");</script>
                <?php
            } 

        }
        else{
            ?>
             <script>alert("password are not match");</script>
            <?php     
        }
    }

}
?>
