<?php
session_start();
if( !empty ($_SESSION['cart']) && isset($_POST['checkout'])){

  //let user in
}else{
  header('location: index.php');
  //send user to homepage
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
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-user"></i>
          
              
              
              
            </ul>

          </div>
        </div>
      </nav>
    <!--checkout-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method = "POST" action = "server/place_order.php">
                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="name" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
                </div>                
                <div class="form-group checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
                </div>                                                
                <div class="form-group checkout-btn-containor">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
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
  
      