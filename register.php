<?php
session_start();
include('server/connection.php');

if(isset($_POST['register'])){
  $name = $_POST['name'];

  $email = $_POST['email'];

  $password = $_POST['password'];

  $confirmpassword = $_POST['confirmpassword'];

  if($password !== $confirmpassword){
    header('location: register.php?error= passwords don’t match');
  }

  else if(strlen($password) <6){
    header('location: register.php?error= password can be at least 6 characters');

  }
  //if there is not error
  else{
    //check there is a user email or not
    $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");

    $stmt1->bind_param('s',$email);    
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();
    if($num_rows != 0){
      header('location: register.php?error= user with htis email is already exist');

    }else{
      //

      $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                          VALUE(?,?,?)");

      $stmt->bind_param('sss',$name,$email,md5($password)); 
      if($stmt->execute()){
        $user_id = $stmt->insert_id;
        
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register= you registered successfully');
      }else{
        header('location: register.php?error= could not create an account');

      } 
    }
    }                  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
          <img class="logo" src="assets/imgs/logo.jpeg"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-user"></i>
              </li>
              
              
              
            </ul>

          </div>
        </div>
      </nav>
      <!--login-->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
                </div>                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-register-password" name="confirmpassword" placeholder="Confirm Password" required/>
                </div>                
                <div class="form-group">
                    
                    <input type="submit" class="btn" id="register-btn" name="register" value="register"/>
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Do you have an account? login</a>
                </div>                
            </form>
            
        </div>
      </section>
    <!--footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/imgs/logo.jpeg"/>
            <p class="pt-3">We provide the best products for the affordable price</p>
  
          </div>
          <div class="footer one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
              <li><a href="#">men</a></li>
              <li><a href="#">boys</a></li>
              <li><a href="#">women</a></li>
              <li><a href="#">girls</a></li>
              <li><a href="#">new arrivals</a></li>
              <li><a href="#">clothes</a></li>
            </ul>
  
          </div>
  
          <div class="footer one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>1234 Street Naeme, City</p>
            </div>
  
            <div>
              <h6 class="text-uppercase">Phone</h6>
              <p>012 345 678 910</p>
            </div>
  
            <div>
              <h6 class="text-uppercase">Email</h6>
              <p>Info@gmail.com</p>
            </div>
          </div>
          <div class="footer one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Instgram</h5>
            <div class="row">
              <img src="assets/imgs/footer1.jpeg" class="w-25 h-100 m-2"/>
              <img src="assets/imgs/footer2.jpeg" class="w-25 h-100 m-2"/>
              <img src="assets/imgs/footer3.jpeg" class="w-25 h-100 m-2"/>
              <img src="assets/imgs/footer4.jpeg" class="w-25 h-100 m-2"/>
              <img src="assets/imgs/footer5.jpeg" class="w-25 h-100 m-2"/>
            </div>          
          </div>
  
        </div>
  
        <div class="copyrighte mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="assets/imgs/pay.jpeg"/>       
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
              <p>Ecommerse @2025 all right reserved</p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a> 
            </div>                 
          </div>
  
        </div>
      </footer>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
  </body>
  </html>          