<?php

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $url_carts = "https://fakestoreapi.com/carts/user/$user_id";
    $ch = curl_init($url_carts);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_carts = curl_exec($ch);
    curl_close($ch);

    $carts = json_decode($response_carts, true);

    $total_value = 0;

    echo "<h2>User ID: $user_id - Cart Summary</h2>";

    foreach ($carts as $cart) {
        foreach ($cart['products'] as $product_in_cart) {
            $product_id = $product_in_cart['productId'];
            $quantity = $product_in_cart['quantity'];

            $url_product = "https://fakestoreapi.com/products/$product_id";
            $ch = curl_init($url_product);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response_product = curl_exec($ch);
            curl_close($ch);

            $product = json_decode($response_product, true);

            $product_price = $product['price'];
            $product_total = $product_price * $quantity;

            $total_value += $product_total;

            echo "Product ID: " . $product['id'] . "<br>";
            echo "Title: " . $product['title'] . "<br>";
            echo "Price: \$" . $product['price'] . "<br>";
            echo "Quantity: " . $quantity . "<br>";
            echo "Total for this product: \$" . number_format($product_total, 2) . "<br><br>";
        }
    }

    echo "<h3>Total value of all carts: \$" . number_format($total_value, 2) . "</h3>";

}

?>