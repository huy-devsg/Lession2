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
?>
<script>
    $('#dialog1').modal('show')
</script>
<div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Add new category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="modules/product_consollers/process.php" enctype="multipart/form-data">
                <div class="modal-body">            
                            <p>Product Name</p>
                                <p><input type="text" name="product_name"style="width:100%;height:30px;">
                                <p> Category</p>
                                <select name="category_name"style="width:100%;height:30px;">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <p>Product Image</p>
                                <input type="file" name="images">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" name="product_add"value="ADD" >  
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog1" style="float:right">
+
</button>