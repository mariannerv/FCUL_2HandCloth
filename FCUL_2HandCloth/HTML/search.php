<?php
include('check_login.php');
include('abreconexao.php');

// Prepare search query
$search_title = mysqli_real_escape_string($conn, $_GET['search_title']);
$search_desc = mysqli_real_escape_string($conn, $_GET['search_desc']);
$search_cat = mysqli_real_escape_string($conn, $_GET['search_cat']);
$search_type = mysqli_real_escape_string($conn, $_GET['search_type']);
$search_brand = mysqli_real_escape_string($conn, $_GET['search_brand']);
$search_state = mysqli_real_escape_string($conn, $_GET['search_state']);
$search_price = mysqli_real_escape_string($conn, $_GET['search_price']);

$sql = "SELECT * FROM clothes_listings WHERE 1=1";

if (!empty($search_title)) {
  $sql .= " AND title LIKE '%" . $search_title . "%'";
}

if (!empty($search_desc)) {
  $sql .= " AND description LIKE '%$search_desc%'";
}

if (!empty($search_cat)) {
  $sql .= " AND category = '$search_cat'";
}

if (!empty($search_type)) {
  $sql .= " AND type = '$search_type'";
}

if (!empty($search_brand)) {
  $sql .= " AND brand LIKE '%$search_brand%'";
}

if (!empty($search_state)) {
  $sql .= " AND state = '$search_state'";
}

if (!empty($search_price)) {
  $sql .= " AND price <= '$search_price'";
}

// Execute query
$result = mysqli_query($conn, $sql);

// Display results
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "Title: " . $row['title'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    echo "Category: " . $row['category'] . "<br>";
    echo "Type: " . $row['type'] . "<br>";
    echo "Brand: " . $row['brand'] . "<br>";
    echo "State: " . $row['state'] . "<br>";
    echo "Price: " . $row['price'] . "<br><br>";
  }
} else {
  echo "No results found.";
}

// Close connection
mysqli_close($conn);
?>
