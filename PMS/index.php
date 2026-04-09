<?php
  include('./includes/config.php');
  include('./functions/my_functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePharmacy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./includes/css/style.css">
    <style>
      /* Color Scheme */
      :root {
        --cream: #fef7e5;
        --light-blue: #e6f2ff;
        --primary-blue: #4a90e2;
        --dark-blue: #2c6fb7;
      }
      
      body {
        background-color: var(--cream);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      
      .navbar {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue)) !important;
        box-shadow: 0 2px 10px rgba(74, 144, 226, 0.3);
      }
      
      /* Cart Overlay */
      .cart-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: none;
        z-index: 1000;
      }
      
      .cart-panel {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        width: 90%;
        max-width: 500px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        overflow: hidden;
      }
      
      .cart-header {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: white;
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .close-cart {
        background: none;
        border: none;
        color: white;
        font-size: 26px;
        cursor: pointer;
        transition: transform 0.2s;
      }
      
      .close-cart:hover {
        transform: scale(1.1);
      }
      
      .cart-body {
        padding: 20px;
        max-height: 400px;
        overflow-y: auto;
        background-color: var(--cream);
      }
      
      .cart-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        background: white;
        border-radius: 8px;
        margin-bottom: 8px;
        transition: transform 0.2s;
      }
      
      .cart-item:hover {
        transform: translateX(5px);
      }
      
      .cart-footer {
        padding: 20px 25px;
        background: var(--light-blue);
        text-align: right;
        border-top: 2px solid var(--primary-blue);
      }
      
      /* Enhanced Sidebar */
      .sidebar-card {
        background: linear-gradient(135deg, white, var(--light-blue));
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(74, 144, 226, 0.1);
        border-left: 4px solid var(--primary-blue);
      }
      
      .sidebar-title {
        font-weight: 600;
        color: var(--dark-blue);
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--primary-blue);
        font-size: 1.1rem;
      }
      
      .list-group-item {
        background: transparent;
        border: none;
        padding: 12px 15px;
        margin-bottom: 5px;
        border-radius: 8px !important;
        transition: all 0.3s ease;
        color: #555;
        font-weight: 500;
      }
      
      .list-group-item:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateX(8px);
        box-shadow: 0 3px 8px rgba(74, 144, 226, 0.3);
      }
      
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
      }
      
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(74, 144, 226, 0.15);
      }
      
      .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        transition: all 0.3s ease;
      }
      
      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
      }
      
      h2 {
        color: var(--dark-blue);
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
      }
    </style>
  </head>
  
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
      <div class="container-fluid px-4">
        <a class="navbar-brand fw-semibold" href="#">
          <i class="fas fa-prescription-bottle-alt me-2"></i>ePharmacy
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="fas fa-home me-1"></i>Home
              </a>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-user-cog me-1"></i>Admin
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" id="cartButton">
                <i class="fa-solid fa-cart-shopping"></i> 
                <sup><?php count_cart_items(); ?></sup> 
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cartOverlay">
      <div class="cart-panel">
        <div class="cart-header">
          <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Your Cart</h4>
          <button class="close-cart" id="closeCart">&times;</button>
        </div>
        
        <div class="cart-body">
          <!-- Cart items will go here -->
          <div class="cart-item">
            <span>Siddalepa</span>
            <span>Rs.250</span>
          </div>
          <div class="cart-item">
            <span>Iodex</span>
            <span>Rs.150</span>
          </div>
        </div>
        
        <div class="cart-footer">
          <strong>Total: Rs.650</strong>
          <button class="btn btn-primary ms-3">
            <i class="fas fa-credit-card me-2"></i>Checkout
          </button>
        </div>
      </div>
    </div>

    <div class="container-fluid mt-4 px-4">
      <?php cart_function(); ?>
      
      <!-- MAIN CONTENT AREA -->
      <div class="container-fluid mt-4 px-4">
        <div class="row">
          <!-- SIDEBAR: START -->
          <div class="col-lg-3 col-md-4 mb-4">
            <div class="card sidebar-card p-4">
              <!-- Categories -->
              <div class="mb-4">
                <div class="sidebar-title">
                  <i class="fas fa-list-alt me-2"></i>Categories
                </div>
                <ul class="list-group list-group-flush">
                  <?php getCat(); ?>
                </ul>
              </div>
              <!-- Brands -->
              <div>
                <div class="sidebar-title">
                  <i class="fas fa-tags me-2"></i>Brands
                </div>
                <ul class="list-group list-group-flush">
                  <?php getBrands(); ?> 
                </ul>
              </div>
            </div>
          </div>
          <!-- SIDEBAR: END -->

          <!-- PRODUCTS AREA: START -->
          <div class="col-lg-9 col-md-8">
            <h2 class="text-center mb-4 fw-semibold">
              <i class="fas fa-heartbeat me-2"></i>Welcome to ePharmacy
            </h2>
            <div class="row g-4">
              <!-- Fetch Products -->
              <?php getProducts(); ?>
            </div>
          </div>
          <!-- PRODUCTS AREA: END -->
        </div>
      </div>
    </div>

    <script>
      // Simple JavaScript to toggle cart overlay
      document.getElementById('cartButton').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('cartOverlay').style.display = 'block';
      });
      
      document.getElementById('closeCart').addEventListener('click', function() {
        document.getElementById('cartOverlay').style.display = 'none';
      });
      
      // Close when clicking outside the cart panel
      document.getElementById('cartOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
          document.getElementById('cartOverlay').style.display = 'none';
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>