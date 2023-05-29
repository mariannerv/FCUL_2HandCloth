function finalizePurchase() {
  console.log("Finalizing purchase...");
  // Send an AJAX request to the PHP backend
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "finalize_purchase.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the PHP backend if needed
      alert(xhr.responseText);
    }
  };
  xhr.send();
}
