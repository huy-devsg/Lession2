<?php
class CategoryList
{
    protected $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM tbl_category ORDER BY category_name asc";
        $query = mysqli_query($this->mysqli, $sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}

$categoryList = new CategoryList($mysqli);
$categories = $categoryList->getCategories();
    $product_id = $_GET['product_id'];
    $sql_product_edit=' SELECT * FROM tbl_product WHERE product_id='.$product_id.' LIMIT 1';
    $query_product_edit= mysqli_query($mysqli,$sql_product_edit);
    $row= mysqli_fetch_array($query_product_edit);
?>
<h2 style="text-align:center">Product Edit</h2>
    <table border="1" width="100%" style="border-collapse:collapse">
        <form method="POST" action="modules/product_consollers/process.php"enctype="multipart/form-data">
            <tr>
                <th>ID Product</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Image Product</th>
            </tr>
            <tr>
                <td width="70px" align="center">
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">    
                        <?php echo $product_id ?>
                </td>
                <td>
                    <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>">
                </td>
                <td>
                    <select name="category_name"style="width:100%;height:30px;">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    </select></td>
                <td style="text-align:center">
                    <input type="hidden" name="copy_images" value="<?php echo $row['images']?>">
                        <img src='modules/product_consollers/product_image/<?php echo $row['images']?>'style='max-height:80px;max-width:40px'  alt='no image'>
                            <p>Upload new images product : <input type="file" name="images"></p>
                </td>   
            </tr>
            <tr>
                <td colspan="4" border="0">
                    <input type="submit" class="btn btn-primary" style="float:right" name="product_edit" value="edit">
                </td>
            </tr>
        </form>
    </table>