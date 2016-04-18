 <?php
require_once 'db.php';

function getProduct($id, $conn)
{
    $sql = "SELECT * FROM products WHERE product_id=" . $id;
    if ($result = $conn->query($sql)) {
        while ($book = $result->fetch_object()) {
            return $book;
        }
    }
    return null;
}

function getLastWeekCharts($conn){

	$sql= "SELECT DAYNAME(DATE(created_at)) as day, count(order_id) as number_of_orders from orders WHERE created_at >= DATE(NOW()) - INTERVAL 7 DAY GROUP by day";

    if ($result = $conn->query($sql)) {
        return $result;
    }
    return null;
}
?>