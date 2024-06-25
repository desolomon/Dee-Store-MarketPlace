<?php include("layouts/header.php") ?>

      <!--Home-->
      <section id="home">
        <div class="container">
            <h5 style="color: white;">NEW ARRIVALS</h5>
            <h1 style="color: white;"><span>Best Prices</span> This Season</h1>
            <p style="color: white;">DeeStore offers the best products for the most affordable prices</p>
            <button>Shop Now</button>
        </div>
      </section>

      <!--Brand-->
      <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 py-5" src="assets/imgs/Nike-Logo.png" id="brand-img"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 py-5" src="assets/imgs/iphone logo.png" id="brand-img"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 py-5" src="assets/imgs/samsung logo.png" id="brand-img"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 py-5" src="assets/imgs/hp logo.jpg" id="brand-img" style="height: 300px;"/>
        </div>
      </section>

      <!--New-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--One-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/shoe2.jpg" />
                <div class="details">
                    <h2>Extreamely Awesome Shoes</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/men's denim jacket, bomber jacket hip hop lightweight jacket.jpg" />
              <div class="details">
                  <h2> Awesome Jacket</h2>
                  <button class="text-uppercase">Shop Now</button>
              </div>
          </div>
            <!--Three-->

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/brand8.jpg" />
              <div class="details">
                  <h2>50% OFF Watches</h2>
                  <button class="text-uppercase">Shop Now</button>
              </div>
          </div>

        </div>
      </section>

      <!--Featured-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our Featured</h3>
          <hr class="mx-auto">
          <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php'); ?>

        <?php while($row= $featured_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image'];?>" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'];?></h5>
            <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
          <a href="<?php echo "single_product.php?product_id=".$row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>  
          </div>
          <?php } ?>
        </div>
      </section>

      <!--Banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON'S SALE</h4>
          <h1>Autumn Collection <br> UP to 30% OFF</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </section>

      <!--Laptops-->
      <section id="featured" class="my-5">
        
        <div class="container text-center mt-5 py-5">
          <h3>Laptops</h3>
          <hr class="mx-auto">
          <p>Here you can check out our amazing laptops</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_laptop.php'); ?>

        <?php while($row= $laptops_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        <?php } ?>
        </div>
      </section>


      <!--Shoes-->
      <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Shoes</h3>
          <hr class="mx-auto">
          <p>Here you can check out our amazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_shoe.php'); ?>

<?php while($row= $shoes_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        <?php } ?>
        </div>
      </section>

      <!--Watches-->
      <section id="watches" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Best Watches</h3>
          <hr class="mx-auto">
          <p>check out our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/silicone led digital sports electronics wristwatch.jpg" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/wlisth luminous tungsten steel Waterproof fashion couple watch.jpg" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/full touch screen smart watch-for android & ios.jpg" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/fngeen 05 calendar sporty waterproof quartz watch.jpg" class="img-fluid mb-3" id="product-img">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.8</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </section>


    
      <!--BoostTrap js file-->
      <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

 <?php include("layouts/footer.php"); ?>
  </body>
</html>
