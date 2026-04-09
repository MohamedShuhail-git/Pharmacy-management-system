<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        /* Overlay Styles */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        /* Product Details Container */
        .product-details {
            background-color: white;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Header */
        .product-header {
            background-color: #0d6efd;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Content */
        .product-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        /* Product Image */
        .product-image {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 5px;
            margin: 0 auto;
            display: block;
        }
        
        /* Product Info */
        .product-info {
            flex: 1;
        }
        
        .product-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 1.25rem;
            color: #0d6efd;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .product-description {
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .product-meta {
            color: #6c757d;
            margin-bottom: 15px;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            color: white;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        /* Responsive Layout */
        @media (min-width: 768px) {
            .product-content {
                flex-direction: row;
            }
            
            .product-image-container {
                flex: 0 0 40%;
            }
        }
    </style>
</head>
<body>
    <!-- Product Details Overlay -->
    <div class="overlay">
        <div class="product-details">
            <!-- Header -->
            <div class="product-header">
                <h2 class="mb-0">Product Details</h2>
                <button class="close-btn" onclick="window.history.back()">&times;</button>
            </div>
            
            <!-- Content -->
            <div class="product-content">
                <!-- Product Image -->
                <div class="product-image-container">
                    <img src="product-image.jpg" alt="Product Image" class="product-image">
                </div>
                
                <!-- Product Information -->
                <div class="product-info">
                    <h3 class="product-title">Iodex</h3>
                    <div class="product-price">Rs.150</div>
                    
                    <div class="product-meta">
                        <div><strong>Category:</strong> Medicines</div>
                        <div><strong>Brand:</strong> PharmaBrand</div>
                        <div><strong>Product ID:</strong> #12345</div>
                    </div>
                    
                    <p class="product-description">
                        This is a detailed description of the product. It includes information about 
                        the ingredients, usage instructions, side effects, and other important details 
                        that customers should know before purchasing this product.
                    </p>
                    
                    <div class="action-buttons">
                        <button class="btn btn-primary">Add to Cart</button>
                        <button class="btn btn-secondary" onclick="window.history.back()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>