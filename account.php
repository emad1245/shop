<?php
session_start();
include('server/connection.php');
if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit();
}
if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit();
  }

}

if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $user_email = $_SESSION['user_email'];

  if($password !== $confirmpassword){
    header('location: account.php?error= passwords don’t match');
  }

  else if(strlen($password) <6){
    header('location: account.php?error= password can be at least 6 characters');

  }else{
    $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
    $stmt->bind_param('ss', md5($password),$user_email);
    if($stmt->execute()){
      header('location: account.php?message=password changed successfully');
    }else{
      header('location: account.php?error=could not change password');

    }

  }
}

//orders
if(isset($_SESSION['logged_in'])){
  $user_id = $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
  $stmt->bind_param('i',$user_id);
  $stmt->execute();
  $orders = $stmt->get_result();
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
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
                          
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
              <a href="account.html"><i class="fas fa-user"></i></a>
        
            
            
            
          </ul>

        </div>
      </div>
    </nav>
      <!--Account-->
      <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name<span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }?></span></p>
                    <p>Email<span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; }?></span></p>
                    <p><a href="#orders" id="orders-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                  <p class="text-center" style="color: red;"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
                  <p class="text-center" style="color: green;"><?php if (isset($_GET['message'])) { echo $_GET['message']; } ?></p>
                    <h3>Change password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="accoun-password" name="password" placeholder="password" required/>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="accoun-password-confirm" name="confirmpassword" placeholder="password" required/>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="change password" class="btn" id="change-pass-btn" name="change_password">
                    </div> 

                </form>

            </div>

        </div>

      </section>
      <!--orders-->

      <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bolde text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Order id</th>
                <th>Order cost</th>
                <th>Order status</th>
                <th>Oder date</th>
                <th>Oder details</th>
                
            </tr>
            <?php while($row = $orders->fetch_assoc()){ ?>

                    <tr>
                        <td>
                          <span><?php echo $row['order_id']; ?></span>
                        </td>
                        <td>
                          <span><?php echo $row['order_cost']; ?></span>
                        </td>
                        <td>
                          <span><?php echo $row['order_status']; ?></span>
                        </td>                        
                        
                        
                        <td>
                          <span><?php echo $row['order_date']; ?></span>

                        </td>
                        <td>
                          <form method="GET" action="order_details.php">
                            <input name="order_id" type="hidden" value="<?php echo $row['order_id'];?>"/>
                            <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details"/>
                          </form>
                        </td>

                    </tr>
            <?php } ?>        
            
        </table>


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