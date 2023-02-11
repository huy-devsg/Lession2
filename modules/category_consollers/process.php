<?php 
include('../../config/config.php');
$category_name =$_POST['category_name'];
if(isset($_POST['category_add'])){
    $sql_add= "INSERT INTO tbl_category(category_name) value ('".$category_name."')";
    mysqli_query($mysqli,$sql_add);
header('location:../../index.php?menu=categories');
}elseif(isset($_POST['suadanhmuc'])){
}else{
    $id=$_GET['iddanhmuc'];
    $sql_xoa="DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header("location:../../index.php?menu=quanlydanhmucsanpham");
}
?>