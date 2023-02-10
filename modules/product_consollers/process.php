<?php
include('../../config/config.php');
session_start();
class Product
{
    protected $product_name;
    protected $category_name;
    protected $category_id;
    protected $images;
    protected $mysqli;
    protected $copy_images;

    public function __construct($mysqli)
    {
        $this->images_product_edit;
        $this->mysqli = $mysqli;
        $this->product_name = $_POST['product_name'];
        $this->category_name = $_POST['category_name'];
        $this->category_id = $_POST['id_category'];
        $this->product_id = $_POST['product_id'];
        if(($_FILES["images"]["error"])!==0)
        {
            $this->images=$_POST['copy_images'];
        }

        else{
            $this->images = time().'_'.$_FILES['images']['name'];
            $this->images_tmp = $_FILES['images']['tmp_name'];
        }
    }

    public function addProduct()
    {
        if (isset($_POST['product_add'])) {
            $sql_add = "INSERT INTO tbl_product (product_name, category_name, category_id, images)
            VALUES ('".$this->product_name."','".$this->category_name."','".$this->category_id."','".$this->images."')";
            mysqli_query($this->mysqli, $sql_add);
            move_uploaded_file($this->images_tmp, 'product_image/'.$this->images);
            header('location:../../index.php?action=products');
        }
    }

    public function editProduct()
    {
        if (isset($_POST['product_edit'])) {
            $sql_edit = "UPDATE tbl_product SET product_name='$this->product_name',category_name='$this->category_name',category_id='$this->category_id', category_id='$this->category_id',images='$this->images' where product_id='$this->product_id' ";
            mysqli_query($this->mysqli, $sql_edit);
            move_uploaded_file($this->images_tmp, 'product_image/'.$this->images);
            header('location:../../index.php?action=products');

        }
    }
    public function deleteProduct()
    {
        
        if (isset($_POST['product_delete'])) {
            $sql_detete = "DELETE FROM tbl_product where product_id='$this->product_id'";
            mysqli_query($this->mysqli, $sql_detete);
            $images_delete= unlink("product_image/'.$this->images.'"); 
            header('location:../../index.php?action=products');
        }
    }
    public function copyProduct()
    {
        if (isset($_POST['product_copy'])) {
            $sql_add = "INSERT INTO tbl_product (product_name, category_name, category_id, images)
            VALUES ('".$this->product_name."','".$this->category_name."','".$this->category_id."','".$this->images."')";
            mysqli_query($this->mysqli, $sql_add);
            header('location:../../index.php?action=products');
        }
    }
}

$product = new Product($mysqli);
$product->addProduct();
$product->editProduct();
$product->deleteProduct();
$product->copyProduct();


?>