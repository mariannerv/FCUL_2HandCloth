<?php
// Include database connection code or configuration file
session_start();
include('abreconexao.php');
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 300px;
            background-color: #f9f9f9;
            color: #000;
            text-align: left;
            padding: 15px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>

<?php
// Fetch the four most recent products from the database
$sqlFeatured = "SELECT id, title, price, photo_name, description, state FROM clothes_listings ORDER BY id DESC LIMIT 4";
$resultFeatured = $conn->query($sqlFeatured);

// Check if the query was successful
if ($resultFeatured) {
    // Check if there are any products
    if ($resultFeatured->num_rows > 0) {
        // Generate HTML code for each product
        while ($rowFeatured = $resultFeatured->fetch_assoc()) {
            $nameFeatured = $rowFeatured['title'];
            $priceFeatured = $rowFeatured['price'];
            $imageFeatured = $rowFeatured['photo_name'];
            $descriptionFeatured = $rowFeatured['description'];
            $stateFeatured = $rowFeatured['state'];
            $productId = $rowFeatured['id']; // Retrieve the product ID

            // Find the image file with the correct extension
            $imagePathFeatured = 'Imagens/' . $imageFeatured . '.*';
            $filesFeatured = glob($imagePathFeatured);
            $extensionFeatured = pathinfo($filesFeatured[0], PATHINFO_EXTENSION);

            // Generate HTML code for each product
            echo '
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <!-- Image and product name container -->
                </div>
                <div class="w3-container">
                    <div class="w3-display-container tooltip">
                        <img src="../HTML/Imagens/' . $imageFeatured . '.' . $extensionFeatured . '" style="width:350px; height:300px;">
                        <div class="tooltiptext">
                            <p>Descricao: ' . $descriptionFeatured . '</p>
                            <p>Estado: ' . $stateFeatured . '</p>
                        </div>
                        <span class="w3-tag w3-display-topleft">Sale</span>
                    </div>
                    
                    <p>' . $nameFeatured . '<br><b>$' . $priceFeatured . '</b></p>
                    <button class="add-to-cart-button" data-product-id="' . $productId . '" data-price="' . $priceFeatured . '">Add to Cart</button>
                </div>
            </div>';
        }
    } else {
        echo "No products found.";
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close the database connection
mysqli_close($conn);
?>

<script>
// Get all the add to cart buttons
var addToCartButtons = document.getElementsByClassName("add-to-cart-button");

// Add click event listener to each button
for (var i = 0; i < addToCartButtons.length; i++) {
  addToCartButtons[i].addEventListener("click", function() {
    // Get the product ID and price from data attributes
    var productId = this.getAttribute("data-product-id");
    var price = this.getAttribute("data-price");
    add_to_cart(productId, price);
  });
}

function add_to_cart(productId, price) {
  console.log("Adding product to cart...");
  // Send an AJAX request to the PHP backend
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "teste.php?product_id=" + productId + "&price=" + price, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the PHP backend if needed
      alert(xhr.responseText);
    }
  };
  xhr.send();
}
</script>

</body>
</html>