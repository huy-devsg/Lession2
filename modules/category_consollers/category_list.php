<?php
class CategoryManager
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getCategoryList()
    {
        $sql_category_list = " SELECT * FROM tbl_category ORDER BY category_name asc";
        $query_category_list = mysqli_query($this->mysqli, $sql_category_list);
        return mysqli_fetch_all($query_category_list, MYSQLI_ASSOC);
    }
/*
    public function deleteCategory($categoryId)
    {
        $sql_delete_category = "DELETE FROM tbl_category WHERE id = '$categoryId'";
        mysqli_query($this->mysqli, $sql_delete_category);
    }

    public function updateCategory($categoryId, $categoryName)
    {
        $sql_update_category = "UPDATE tbl_category SET category_name = '$categoryName' WHERE id = '$categoryId'";
        mysqli_query($this->mysqli, $sql_update_category);
    }
*/
}
?>
<?php
$categoryManager = new CategoryManager($mysqli);
$categoryList = $categoryManager->getCategoryList();
    echo "<table border='1' width='100%' style='border-collapse:collapse;text-align:center'>";
    echo "<tr>";
    echo "<th class='title'>#</th>";
    echo "<th align='center'>Tên danh mục</th>";
    echo "<th align='center'>Quản lý</th>";
    echo "</tr>";

$i = 0;
foreach ($categoryList as $category) {
    $i++;
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    echo "<td align='center'>" . $category['category_name'] . "</td>";
    echo "<td>";
    echo "CODE NOT ADDED FUNCTION ADDED, REMOVED";
    echo "</td>";
    echo "</tr>";
} 
?>
</table>
<br/>