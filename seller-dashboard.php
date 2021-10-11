<?php
ob_start();
session_start();
require_once "connection.php";

//make sure login first, so that can fetch email, echo email to see if you logged in
$email = $_SESSION['email'];
//echo $email;

$select = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$statement = $conn->prepare($select);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

// display item sell
$selectproduct = "SELECT * FROM product WHERE display_name = '$email'";

$result = $conn->query($selectproduct);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/user-profile.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

body {
    font-family: 'Open Sans', sans-serif
}

.search {
    top: 6px;
    left: 10px
}

.form-control {
    border: none;
    padding-left: 32px
}

.form-control:focus {
    border: none;
    box-shadow: none
}

.green {
    color: green
}
    </style>
</head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
    <!-- Navigation-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style='color:black' > 
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="store.php">Beetriv</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="store.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bid</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Active Bid</a></li>
                                <li><a class="dropdown-item" href="#!">Ending Soon</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                    <li><a class="nav-item nav-link" style='color:black' aria-current="page" href="wishlist.php">
                    <i class="bi bi-heart" style='color:black'><?php echo (isset($_SESSION['wish_items']) && count($_SESSION['wish_items'])) > 0 ? count($_SESSION['wish_items']):''; ?></i>
                    <li><a class="nav-item nav-link" style='color:black' aria-current="page" href="cart.php">
                    <i class="bi bi-cart4" style='color:black'><?php echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):''; ?></i>
                    <li><a class="nav-item nav-link" style='color:black' aria-current="page" href="user-profile.php"><i class="bi-person-circle"></i></a></li>
                    <li><a class="nav-item nav-link" style='color:black' aria-current="page" href="login.php"><i class="bi bi-box-arrow-right"></i></a></li>
                    </a></li>
                    </ul>
                </div>
            </div>
        </nav>

  <div class="main-content">
    <div class="container mt-7 p-5">
      <!-- Table -->
      <?php foreach($row as $seller){ ?>
      <div class="row">
        <div class="col-xl-10 m-auto order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($seller['img']);?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="managestore.php" class="btn btn-sm btn-warning mr-4"><strong>Manage Store</strong></a>
                <a href="edit-profile.php" class="btn btn-sm  float-right"><strong>EDIT PROFILE</strong></a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              
              <div class="text-center pt-5">
                <h3>Hi
                <?php echo $seller['fname'];?> <?php echo $seller['lname'];?><span class="font-weight-light">, @<?php echo $seller['username'];?></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $seller['email'];?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><strong>Personal Information</strong>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><strong>Phone Number</strong> <?php echo $seller['phone_number'];?>
                  <i class="ni education_hat mr-2"></i><strong>IC Number</strong> <?php echo $seller['ic_number'];?>
                  <i class="ni education_hat mr-2"></i><strong>IC Colour</strong> <?php echo $seller['ic_color'];?>
                </div>
                <hr class="my-4">
                <p class="text-align-center">Disclaimer & Policies</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>   

<!-- Selling Item -->
  <div class="container mt-3 px-2 pb-5">
      <h4 class="pb-3"><strong>Sell Item</strong></h4>
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    
                    <th scope="col" width="10%">Product ID</th>
                    <th scope="col" width="10%">Product Image</th>
                    <th scope="col" width="10%">Product Name</th>
                    <th scope="col" width="10%">Product Category</th>
                    <th scope="col" width="10%">Price</th>
                    <th scope="col" width="10%">Product Quantity</th>
                    <th scope="col" width="10%">Product Condition</th>
                    <th scope="col" width="10%">Product Description</th>
                    <th scope="col" width="10%">Product Rating</th>
                    <th scope="col" width="10%">Meet Up Location</th>
                    <th scope="col" width="10%">Edit Product</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                <!-- display sell item     -->
                
                <?php
                foreach($result as $rowProduct){

                ?>
                <tr>
                <td><?php echo $rowProduct['prd_id']; ?></td>
                <td><?php echo $rowProduct['prd_name']; ?></td>
                <th scope="row"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowProduct['prd_img']); ?>" class="rounded" style="width:150px;"></th>
                <td><?php echo $rowProduct['prd_category']; ?></td>
                <td>$<?php echo $rowProduct['prd_price']; ?></td>
                <td><?php echo $rowProduct['prd_qty']; ?></td>
                <td><?php echo $rowProduct['prd_condition']; ?></td>
                <td><?php echo $rowProduct['prd_desc']; ?></td>
                <td><?php echo $rowProduct['prd_rating']; ?></td>
                <td><?php echo $rowProduct['prd_location']; ?></td>
                <td><a href="edit-product.php?id=<?php echo $rowProduct['prd_id'];?>">
					        <button class="btn btn-warning btn-lg float-right">Edit</button></a></tr>
                <?php } ?>
                
            </tbody>
        </table>
    </div>
</div>
  
  <!-- Footer-->
<footer class="site-footer">

<div class="container">
    <div class="row">
        <!-- first section -->
        <div class="col-xs-6 col-md-3">
        <h6>CORPORATE</h6>
        <ul class="footer-links">
            <li><a href="footer/about.php">About Beetriv</a></li>
            <li><a href="footer/privacy-policy.php">Privacy Policy</a></li>
            <li><a href="footer/termsco.php">Terms and Conditions</a></li>
        </ul>
        </div>

        <!-- second section -->
        <div class="col-xs-6 col-md-3">
        <h6>DEALS, PAYMENT & DELIVERY</h6>
        <ul class="footer-links">
            <li><a href="footer/deals.php">Our Deals</a></li>
            <li><a href="footer/delivery.php">Delivery Services</a></li>
            <li><a href="footer/payment.php">Payment</a></li>
        </ul>
        </div>

        <!-- third section -->
        <div class="col-xs-6 col-md-3">
        <h6>CUSTOMER CARE</h6>
        <ul class="footer-links">
            <li><a href="footer/be-seller.php">Become Our Seller</a></li>
            <li><a href="footer/faq.php">FAQ</a></li>
            <li><a href="footer/buy-guides.php">How to Buy on Beetriv</a></li>
            <li><a href="footer/sell-guides.php">How to Sell on Beetriv</a></li>
            <li><a href="footer/bid-guides.php">How Bidding Works</a></li>
            <li><a href="footer/customer-protection.php">Customer Protection</a></li>
        </ul>
        </div>

        <!-- fourth section -->
        <div class="col-xs-6 col-md-3">
        <h6>CONTACT US</h6>
        <p>Phone: 257 3663</p>
        <p>Email: beetrivteam@gmail.com</p>
        <p>Instagram: @beetriv</p>
        <p>Facebook: @beetriv</p>
        </div>
    </div>
</div>

</footer>
</body>

<script>
    var Tooltip = (function() {

// Variables

var $tooltip = $('[data-toggle="tooltip"]');

unction init() {
  $tooltip.tooltip();
}


// Events
// Methods

if ($tooltip.leng th) {
  init()
  f;
}

})();

</script>