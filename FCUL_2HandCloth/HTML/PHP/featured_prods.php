<?php
// Include database connection code or configuration file
include('abreconexao.php');

// Check if the form has been submitted or any other condition

// Fetch the four most recent products from the database
$sqlFeatured = "SELECT title, price, photo_name FROM clothes_listings WHERE type = 'Tshirts' ORDER BY id DESC LIMIT 4";
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

            // Find the image file with the correct extension
            $imagePathFeatured = '../HTML/Imagens/' . $imageFeatured . '.*';
            $filesFeatured = glob($imagePathFeatured);
            $extensionFeatured = pathinfo($filesFeatured[0], PATHINFO_EXTENSION);

            // Generate HTML code for each product
            echo '
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <!-- Image and product name container -->
                </div>
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="../HTML/Imagens/' . $imageFeatured . '.' . $extensionFeatured . '" style="width:350px;  height: 300px;">
                        <span class="w3-tag w3-display-topleft">Sale</span>
                    </div>
                    <p>' . $nameFeatured . '<br><b>$' . $priceFeatured . '</b></p>
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