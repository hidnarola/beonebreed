<?php
/*
 * Developed by "ar", to fix the issue of not assigned barcode
 * 
 * Barcode were already assigned to products, but in barcode table it is having is_assigned flag as 0.
 * So there is chance of assign already assigned barcode to another product. And by this way duplicate barcode problem is generating
 * 
 * This script is used to identified such products and set is_assigned flag as 1.
 */

function open_connection(){
    $conn = mysqli_connect("192.168.1.201", "beonebreed", "h13B8n17LMD7VtR", "beonebreed");
//    $conn = mysqli_connect("192.168.1.201", "habby", "6735C63zY35gOwF", "habby");
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function close_connection($conn){
    mysqli_close($conn);
}

$conn = open_connection();

$query = "SELECT b.*,dimension_id FROM `dimension` d join bar_code b on d.upc = b.upc and b.is_assigned = 0"; // identify those barcodes who is assigned but having is_assigned flag 0

$result = mysqli_query($conn, $query) or mysqli_error($conn);

if (mysqli_num_rows($result) > 0) {
    echo "<pre>";
    while ($row = mysqli_fetch_assoc($result)) {
        // Fetch row one by one
        print_r($row);
        $desc = "";
        switch($row['dimension_id'])
        {
            case 1:
                $desc = ""; // No records comes under this category
                break;
            case 2:
                $desc = "Assigned for mastercase UPC";
                break;
            case 3:
                $desc = "Assigned for intercase UPC";
                break;
            case 4:
                $desc = "Assigned for pallet UPC";
                break;
        }
        $update = "update bar_code set description = '".$desc."', is_assigned = 1 where id = ".$row['id'];
        mysqli_query($conn, $update) or mysqli_error($conn);
    }
}

    $query = 'SELECT b.id,p.id as product_id,p.product_name FROM `bar_code` b join products_new p on p.barcode_id = b.id and b.description = "" AND b.is_assigned = 1';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        echo "<pre>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch row one by one
            print_r($row);
            
            // Update description of barcode that assigned to main product
            $update = "update bar_code set description = 'Assigned for product : ".$row['product_name']."' where id = ".$row['id'];
            mysqli_query($conn, $update) or mysqli_error($conn);
        }
    }