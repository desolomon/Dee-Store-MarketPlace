<?php
include("server/connection.php");

if(isset($_GET['product_id'])){

$product_id = $_GET['product_id'];

$stmt = $conn->prepare("SELECT * FROM products where product_id = ?");
$stmt->bind_param("i", $product_id);

$stmt->execute();

$products = $stmt->get_result(); // an array

  //no product id was given
}else{
  header('location: index.php');
}


include("layouts/header.php");
?>


<!--single product-->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">

      <?php while($row = $products->fetch_assoc()){?>

       
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="image-fluid w-100 pb-1" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image2']; ?>" alt="" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image3']; ?>" alt="" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image4']; ?>" alt="" width="100%" class="small-img">
                </div>
            </div>
        </div>
       

        <div class="col-lg-6 col-md-12 col-sm-12">
            <h6>Men/Shoes</h6>
            <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
            <h2>$<?php echo $row['product_price']; ?></h2>

            <form action="cart.php" method="POST" >
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
          <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

            <input type="number" value="1" name="product_quantity">
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>
           
            <h4 class="mt-5 mb-5">Product details</h4>
            <span><?php echo $row['product_description']; ?>
            </span>
        </div>

         <?php } ?>
    </div>
</section>



 <!--Related products-->
 <section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Related products</h3>
      <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/brand6.jpg" class="img-fluid mb-3">
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
        <img src="assets/imgs/brand1.jpg" class="img-fluid mb-3">
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
        <img src="assets/imgs/brand7.jpg" class="img-fluid mb-3">
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
        <img src="assets/imgs/brand3.jpg" class="img-fluid mb-3">
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
<script>

  var mainImg =  document.getElementById("mainImg");
  var smallImg = document.getElementsByClassName("small-img");

  for(let i=0; i<4; i++){
    smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }    
  }
 
  
</script>

 <?php include("layouts/footer.php"); ?>
</body>
</html>