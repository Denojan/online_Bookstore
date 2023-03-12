<?php
// Loading Middle Row Products
function load_middle_products()
{
    include "./Inc/connection.php";
    $products = "";

    // Prepare Query
    $query = "SELECT * FROM `book` ORDER BY `book_no` DESC LIMIT 4";
    $query_result = mysqli_query($connection, $query);

    if ($query_result) {
        if (mysqli_num_rows($query_result) > 0) {
            while ($row = mysqli_fetch_assoc($query_result)) {
                $products .= "<div class='coloumn'>
                                    <div class='product-table'>
                                        <div class='product-image-box'>
                                            <img class='product-image' src='{$row['img_url']}' alt=''>
                                        </div>
                                        <div class='product-meta-data-section'>
                                            <div class='product-meta-data-name-box'>
                                                <span class='product-meta-data-name'>{$row['name']}</span>
                                            </div>
                                            <div class='product-meta-data-price-box'>
                                                <span class='product-meta-data-price'>LKR: {$row['price']}.00</span>
                                            </div>
                                            <div style='margin-top: 10px;'>
                                                <a class='link' href='./action/cart_action.php?product_id={$row['book_no']}&type=book'>
                                                    <button class='btn-main' style='margin-bottom: 10px'>Add to Cart</button>
                                                </a>
                                                <a class='link' href='./action/wishlist_action.php?product_id={$row['book_no']}&type=book'>
                                                    <button class='btn-main' style='margin-bottom: 10px'>Wishlist</button>
                                                </a>
                                            </div>                                     
                                        </div>
                                    </div>
                            </div>";
            }
        }
        return $products;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

// Load Last Row Products using parameter filter
function loadSetProducts($PARAMETER)
{
    include "./Inc/connection.php";

    $products = "";
    $query = "";

    // Prepare Query
    if ($PARAMETER === "book") {
        $query = "SELECT * FROM `book` ORDER BY `book_no` DESC LIMIT 4";
    } else if ($PARAMETER === "magazine") {
        $query = "SELECT * FROM `magazine` ORDER BY `magazine_no` DESC LIMIT 4";
    }
    $query_result = mysqli_query($connection, $query);

    if ($query_result) {
        if (mysqli_num_rows($query_result) > 0) {
            while ($row = mysqli_fetch_assoc($query_result)) {
                $DATA = null;
                if ($PARAMETER === "book") {
                    $DATA = array(
                        "id" => $row['book_no'],
                        "image_url" => $row['img_url'],
                        "name" => $row['name'],
                        "price" => $row['price']
                    );
                } else if ($PARAMETER === "magazine") {
                    $DATA = array(
                        "id" => $row['magazine_no'],
                        "image_url" => $row['img_url'],
                        "name" => $row['name'],
                        "price" => $row['price']
                    );
                }

                $products .= getProductBox($DATA,$PARAMETER);
            }
        }
        return $products;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

function getProductBox($DATA,$PARAMETER)
{
    $product = "<div class='coloumn-3'>
                       <div class='product-table'>
                           <div class='product-image-box'>
                               <img class='product-image' src='{$DATA['image_url']}' alt=''>
                           </div>
                           <div class='product-meta-data-section'>
                               <div class='product-meta-data-name-box'>
                                   <span class='product-meta-data-name'>{$DATA['name']}</span>
                               </div>
                               <div class='product-meta-data-price-box'>
                                   <span class='product-meta-data-price'>LKR: {$DATA['price']}.00</span>
                               </div>
                               <div style='margin-top: 10px;'>
                                   <a class='link' href='./action/cart_action.php?product_id={$DATA['id']}&type={$PARAMETER}'>
                                        <button class='btn-main' style='margin-bottom: 10px'>Add to Cart</button>
                                   </a>
                                   <a class='link' href='./action/wishlist_action.php?product_id={$DATA['id']}&type={$PARAMETER}'>
                                        <button class='btn-main' style='margin-bottom: 10px'>Wishlist</button>
                                   </a>
                               </div> 
                           </div>
                       </div>
               </div>";
    return $product;
}

// Function for load cart using session
function loadCart(){
    include "./Inc/connection.php";
    // Check if session is set
    if (isset($_SESSION['product_id'])) {
        // Get product id from session
        $row_data = "";
        $product_id = $_SESSION['product_id'];

        if(empty($_SESSION['product_id'])){
            return "<tr><td colspan='5' style='text-align: center;'>No Product Found</td></tr>";
        }
        foreach($product_id as $product){
                $query = "";

                if($product[1] == "book"){
                    $query = "SELECT * FROM `book` WHERE `book_no` = '{$product[0]}' LIMIT 1";
                }else if($product[1] == "magazine"){
                    $query = "SELECT * FROM `magazine` WHERE `magazine_no` = '{$product[0]}' LIMIT 1";
                }

                $query_result = mysqli_query($connection, $query);

                if ($query_result) {
                    if ($row = mysqli_fetch_assoc($query_result)){
                        $DATA = null;
                        if ($product[1] === "book") {
                            $DATA = array(
                                "id" => $row['book_no'],
                                "image_url" => $row['img_url'],
                                "name" => $row['name'],
                                "price" => $row['price'],
                                "qty" => $product[2]
                            );
                        } else if ($product[1] === "magazine") {
                            $DATA = array(
                                "id" => $row['magazine_no'],
                                "image_url" => $row['img_url'],
                                "name" => $row['name'],
                                "price" => $row['price'],
                                "qty" => $product[2]
                            );
                        }
                        $row_data .= loadTableRow($DATA,$product[1]);
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($connection);
                }
        }
        return $row_data;
    } else {
       return "<tr><td colspan='5' style='text-align: center;'>No Product Found</td></tr>";
    }
}

function loadTableRow($DATA,$product_type){
    $product = "";
    $product .= "<tr>
                        <td>
                            <div class='cart-table-fst-main dis-flex'>
                                <a class='link' href='./action/remove_product.php?product_id={$DATA['id']}&type={$product_type}'>
                                    <div class='cart-table-fst-close-btn-group'>
                                        <button class='cart-table-fst-close-btn'>X</button>
                                    </div>
                                </a>
                                <div class='cart-table-img-box'>
                                    <img class='cart-table-img' src='{$DATA['image_url']}' alt=''>
                                </div>
                            </div>
                        </td>
                        <td>{$DATA['name']}</td>
                        <td>LKR: {$DATA['price']}.00</td>
                        <td>{$DATA['qty']}</td>
                        <td>LKR: {$DATA['price']}.00</td>
                    </tr>";

    return $product;
}

// Function for calculate Cart Total
function cartTotal(){
    include "./Inc/connection.php";
    $total = 0;

    if (isset($_SESSION['product_id'])) {
        if (empty($_SESSION['product_id'])) {
            return array(0,0);
        } else {
            foreach($_SESSION['product_id'] as $product){
                $query = "";

                if($product[1] == "book"){
                    $query = "SELECT * FROM `book` WHERE `book_no` = '{$product[0]}' LIMIT 1";
                }else if($product[1] == "magazine"){
                    $query = "SELECT * FROM `magazine` WHERE `magazine_no` = '{$product[0]}' LIMIT 1";
                }

                $query_result = mysqli_query($connection,$query);

                if ($query_result) {
                    if(mysqli_num_rows($query_result) > 0){
                        $row = mysqli_fetch_assoc($query_result);
                        $total += $row['price'] * $product[2];
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($connection);
                }
            }
            return array($total /*Sub Total*/, $total+500 /*Total*/);
        }
    }else{
        return array(0,0);
    }
}

// Load Wishlist
function loadWishlist(){
    include "./Inc/connection.php";
    // Check if session is set
    if (isset($_SESSION['wishlist'])) {
        // Get product id from session
        $row_data = "";
        $product_id = $_SESSION['wishlist'];

        if(empty($_SESSION['wishlist'])){
            return "<tr><td colspan='5' style='text-align: center;'>No Product Found</td></tr>";
        }
        foreach($product_id as $product){
            $query = "";

            if($product[1] == "book"){
                $query = "SELECT * FROM `book` WHERE `book_no` = '{$product[0]}' LIMIT 1";
            }else if($product[1] == "magazine"){
                $query = "SELECT * FROM `magazine` WHERE `magazine_no` = '{$product[0]}' LIMIT 1";
            }

            $query_result = mysqli_query($connection, $query);

            if ($query_result) {
                if ($row = mysqli_fetch_assoc($query_result)){
                    $DATA = null;
                    if ($product[1] === "book") {
                        $DATA = array(
                            "id" => $row['book_no'],
                            "image_url" => $row['img_url'],
                            "name" => $row['name'],
                            "price" => $row['price'],
                            "qty" => $product[2]
                        );
                    } else if ($product[1] === "magazine") {
                        $DATA = array(
                            "id" => $row['magazine_no'],
                            "image_url" => $row['img_url'],
                            "name" => $row['name'],
                            "price" => $row['price'],
                            "qty" => $product[2]
                        );
                    }
                    $row_data .= getWishlistRow($DATA,$product[1]);
                }
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
            }
        }
        return $row_data;
    } else {
        return "<tr><td colspan='6' style='text-align: center;'>No Product Found</td></tr>";
    }
}

function getWishlistRow($DATA,$product_type){
    $product = "";
    $product .= "<tr>
                        <td>
                            <div class='cart-table-fst-main dis-flex'>
                                <a class='link' href='./action/remove_wishlist.php?product_id={$DATA['id']}&type={$product_type}'>
                                    <div class='cart-table-fst-close-btn-group'>
                                        <button class='cart-table-fst-close-btn'>X</button>
                                    </div>
                                </a>
                                <div class='cart-table-img-box'>
                                    <img class='cart-table-img' src='{$DATA['image_url']}' alt=''>
                                </div>
                            </div>
                        </td>
                        <td>{$DATA['name']}</td>
                        <td>{$product_type}</td>
                        <td>{$DATA['qty']}</td>
                        <td>LKR: {$DATA['price']}.00</td>
                        <td>
                            <a href='./Payment.php' class='link btn-main'>Buy Now</a>
                        </td>
                    </tr>";

    return $product;
}