<?php
    $id_product=$_GET['id_product'];
    $sql_product_list=' SELECT * FROM tbl_product WHERE product_id='.$id_product.' LIMIT 1';
    $query_product_list= mysqli_query($mysqli,$sql_product_list);
    $row= mysqli_fetch_array($query_product_list);
?>
<h2 style="text-align:center">Product Details</h2>
    <table border="1" width="100%" style="border-collapse:collapse">
    <form method="POST" action="modules/product_consollers/process.php">
        <tr>
                <th>ID Product</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Image Product</th>
            </tr>
                <tr>
                    <td width="70px"><?php echo $id_product ?></td>
                    <td><input type="text" value="<?php echo $row['product_name'] ?>"></td>
                    <td><input type="text" value="<?php echo $row['category_name'] ?>"></td>
                    <td style="text-align:center"><img src='modules/product_consollers/product_image/<?php echo $row['images']?>'style='max-height:80px;max-width:40px'  alt='no image'>
                <p>Upload new images product : <input type="file" name="images"></p>
                </td>
                </tr>
                <tr><td colspan="4" border="0"><input type="submit" class="btn btn-primary" style="float:right" name="product_edit" value="edit"></td></tr>
                </form>
    </table>