<?php
    $sql_sua_danhmucsp=" SELECT * FROM tbl_danhmuc WHERE $id_danhmuc='$_GET['iddanhmuc'] LIMIT 1";
    $query_sua_danhmucsp= mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<h3> Sửa danh mục sản phẩm</h3>
<table border="1" width="50%" style="border-collapse:collapse">
<form method="POST" action="modules/quanlydanhmucsp/xuly.php">
    <tr>
        <th colspan="2"> Điền danh mục sản phẩm </th>
    </tr>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc"></td>
    </tr>  
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu"></td>
    </tr>  
    <tr>
        <td><input type="submit" name="themdanhmuc"value="Thêm danh mục sản phẩm"></td>
    </tr>
</form>
</table>