<?php 
session_start();
if(!isset($_SESSION['username']))
header('location:login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head> 
<link rel="stylesheet" href="home.css">
<?php include 'links.php' ?>
</head>



<header>
  <nav class="navbar">
    <div class="logo">
      <a href="" class="nav-link"> welcome

      </a>
    </div>
      <div class="menu">
        <ul>
          <li> <a href="" class="active"> home</a></li>
          <li> <a href="" class=""> about</a></li>
          <li> <a href="" class=""> serves</a></li>
          <li> <a href="" class=""> gallary</a></li>
        </ul>
      </div>

    <div class="logout_btn">
      <a href="logout.php">logout</a>
    </div>
  </nav>

  <div class="content-center">
    <h1>hello this is <?php echo $_SESSION[ 'username'] ?></h1>
    <h2>web developer</h2>
  </div>

  <div class="icons">
    <ul class="icons-item">

      <a href="" ><i class="fa  fa-facebook"  ></i></a>
    
      <a href="" ><i class="fa  fa-instagram"></i> </a>
      
      <a href="" ><i class="fa fa-twitter"></i></a>
      
      
      <a href="" ><i class="fa fa-linkedin"></i></a>
        
    </ul>
  </div>

  <div class="grid">
    <img src="images/download.png">
  </div>

</header>

