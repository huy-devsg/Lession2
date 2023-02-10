<?php
    class Category
    {
        public function showModal()
        {
            ?>
            <div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
    
                        <div class="modal-header">
                            <h5 class="modal-title">Add new category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="modules/category_consollers/process.php">
                            <div class="modal-body">
                                <p>Category name</p>
                                <p><input type="text" name="category_name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" name="category_add" value="ADD">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog1" style="float:right">
+
</button>
            <?php
        }
    }
    $category = new Category();
    $category->showModal();     
?>