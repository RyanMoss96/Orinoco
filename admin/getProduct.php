 <?php
    require_once('db.php');

    function getProduct($id, $conn){
        $sql="SELECT * FROM Products WHERE product_id=".$id;
        if ($result = $conn->query($sql)) {
            while($book = $result->fetch_object()){
              return $book;
            }
        }
        return NULL;
    }

?>