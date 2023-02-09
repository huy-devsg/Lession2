<?php
    $id_product=$_GET['id_product'];
    $sql_product_list=' SELECT * FROM tbl_product WHERE product_id='.$id_product.' LIMIT 1';
    $query_product_list= mysqli_query($mysqli,$sql_product_list);
    $row= mysqli_fetch_array($query_product_list);
?>
<h2 style="text-align:center">Product Details</h2>
    <table border="1" width="100%" style="border-collapse:collapse">
        <tr>
            <th>ID Product</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Image Product</th>

        </tr>
            <tr>
                <td><?php echo $id_product ?></td>
                <td><?php echo $row['product_name'] ?></td>
                <td>
                <?php echo $row['category_name'] ?>
                </td>
                <td><img src='modules/product_consollers/product_image/<?php echo $row['images']?>'style='max-height:80px;max-width:40px'  alt='no image'></td>
            </tr>
    </table>