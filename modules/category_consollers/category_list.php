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
}

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
        echo '
                    <i class="fas fa-edit"></i>
                </a>&nbsp;
                        <i class="fa fa-minus-circle"></i>
                </a>&emsp;
                        <i class="fa fa-clone" aria-hidden="true"></i>
                </a>&emsp;
                        <i class="fa fa-eye" aria-hidden="true"></i>
                </a>';
    echo "</td>";
    echo "</tr>";
} 
?>
</table>
<br/>