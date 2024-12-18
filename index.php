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
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                <a href="account.php"><i class="fas fa-user"></i></a>
          
              
              
              
            </ul>

          </div>
        </div>
      </nav>
      <!--home-->
      <section id="home">
        <div class="container">
          <h5>NEW ARRIVAL</h5>
          <h1><span>Best Prices</span>This Year</h1>
          <p>Eshop Offers The Best Products For The Affordable Price</p>
          <a href="shop.php"><button class="buy-btn">Buy Now</button></a> 
        </div>
        <style>
          
        </style>  

      </section>
      <!--brand-->
      <section id="brand" class="container">
        <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpeg"/>

        </div>


      </section>
      <!--new-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--one-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/1.jpeg"/>
            <div class="details">
              <h2>Extreamly Awsome Products</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          <!--two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/2.jpeg"/>
            <div class="details">
              <h2>30% Off Jackets</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          <!--three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/3.jpeg"/>
            <div class="details">
              <h2>50% Off Shoeses</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
        </div>






      </section>
      <!--featured-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our video games products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our video games products</p>                      
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_featured_products.php'); ?>
        
        <?php while($row = $featured_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
           <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
          </div>

        <?php } ?>

        </div>






      </section>
      <!--banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON’S SALE</h4>
          <h1>Automn Collection <br> UP to 30% OFF</h1>
          <button class="text-uppercase">Shop now</button>
        </div>
      </section>
      <!--clothes-->
      <section id="clothes" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Coats</h3>
          <hr class="mx-auto">
          <p>Here you can check out our amazing clothes</p>                      
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_coats.php'); ?>
        
        <?php while($row=$coats_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
          </div>

        <?php } ?>
        </div>

      </section>
      <!--shoes-->
      <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Shoeses</h3>
          <hr class="mx-auto">
          <p>Here you can check out our amazing shoeses</p>                      
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_shoes.php'); ?>
        <?php while($row = $shoes_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
          </div>
        <?php } ?>

      </section>
      <!--watches-->
      <section id="watches" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Smart Watches</h3>
        <hr class="mx-auto">
        <p>Here you can check out our smart watches</p>                      
    </div>
    <?php include('server/get_watches.php'); ?>
    <div class="row mx-auto container-fluid">
        <?php while($row = $watches_products->fetch_assoc()){ ?>        
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
            </div>
        <?php } ?>
    </div> 
</section>

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
