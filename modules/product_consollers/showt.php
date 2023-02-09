<?php
        if(isset($_GET['id_product']))
        {
            $id_product= $_GET['id_product'];
        }
        else{
            $id_product= '';
        }
    ?>
<?php
    echo $id_product;
?>