<?php
class CategoryList
{
    protected $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

}

    $product_id = $_GET['product_id'];
    $sql_product_delete=' SELECT * FROM tbl_product WHERE product_id='.$product_id.' LIMIT 1';
    $query_product_delete= mysqli_query($mysqli,$sql_product_delete);
    $row= mysqli_fetch_array($query_product_delete);
?>
<h2 style="text-align:center">Product Copy</h2>
    <table border="1" width="100%" style="border-collapse:collapse">
    <form method="POST" action="modules/product_consollers/process.php"enctype="multipart/form-data">
        <tr>
                <th>ID Product</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Image Product</th>
            </tr>
                <tr>
                    <td width="70px" align="center" >
                        <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                        <?php echo $product_id ?>
                    </td>
                    <td>
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                        <?php echo $row['product_name'] ?>
                    </td>
                    <td>
                     <input type="hidden" name="category_name" value="<?php echo $row['category_name'] ?>">
                         <?php echo $row['category_name']; ?>                               
                    </td>
                    <td style="text-align:center">
                        <input type="hidden" name="copy_images" value="<?php echo $row['images'] ?>">
                        <img src='modules/product_consollers/product_image/<?php echo $row['images']?>'style='max-height:80px;max-width:40px'  alt='no image'>
                </td>
                </tr>
                <tr><td colspan="4" border="0"><input type="submit" class="btn btn-primary" style="float:right" name="product_copy" value="Copy"></td></tr>
    </form>
    </table>