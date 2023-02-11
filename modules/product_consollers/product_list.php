<?php
declare(strict_types=1);
class product
{
    protected $mysqli;
    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
        
    }
    public function list(int $page = 1, int $itemsPerPage = 10): array
{
    $start = ($page-1) * $itemsPerPage;
    $sqlProductList = "SELECT * FROM tbl_product ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
    $queryProductList = $this->mysqli->query($sqlProductList);
    $productList = array();
    while ($row = $queryProductList->fetch_array()) {
        $productList[] = $row;
    }
    return $productList;
}
public function count(string $productName = ''): int
{
    $sqlProductCount = "SELECT COUNT(*) as total FROM tbl_product WHERE product_name LIKE '%$productName%' OR category_name LIKE '%$productName%'";
    $queryProductCount = $this->mysqli->query($sqlProductCount);
    $row = $queryProductCount->fetch_array();
    return (int) $row['total'];
}

public function search(int $page = 1, int $itemsPerPage = 10, string $productName = ''): array
{
    $start = ($page - 1) * $itemsPerPage;
    $sqlProductList = "SELECT * FROM tbl_product WHERE product_name LIKE '%$productName%' OR category_name LIKE '%$productName%' ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
    $queryProductList = $this->mysqli->query($sqlProductList);
    $productList = array();
    while ($row = $queryProductList->fetch_array()) {
        $productList[] = $row;
    }
    return $productList;
}


}
$sqlProductList = new Product($mysqli);
$categories = $categoryList->getCategories();
$currentPage = 1;
if (isset($_GET['pages'])) {
    $currentPage = (int) $_GET['pages'];
}
$totalItems = 0;
$totalPages = 0;
    $itemsPerPage = 10;
    $product = new Product($mysqli);
    $currentProductName = '';
    if (isset($_GET['search_keyword'])) {
        $currentProductName = $_GET['search_keyword'];
    }
    
    $productList = $product->search($currentPage, $itemsPerPage, $currentProductName);
$totalItems = $product->count($currentProductName);
$totalPages = ceil($totalItems / $itemsPerPage);
if ($totalItems > 0) {

include('search.php');
?>
            <table border="1" width="90%" text-align="center" style="border-collapse:collapse">
                <tr>
                    <th width="50px" style="text-align:center">#</th>
                    <th class="th_product">Product name</th>
                    <th class="th_product">Category</th>
                    <th class="th_product">Image</th>
                    <th class="th_product">Operations</th>
                </tr>
                <?php
                        $i = ($currentPage - 1) * $itemsPerPage;
                        foreach ($productList as $row) {
                            $i++;
                    ?>
                    <tr align="center" style="height:100px">
                            <td>                   <?php echo $i ?></td>
                            <td class="td_product"><?php echo $row['product_name'] ?> </td>
                            <td class="td_product"><?php echo  $row['category_name'] ?></td>
                            <td class="td_product" width="100px"><img src="modules/product_consollers/product_image/<?php echo $row['images']?>"style="max-height:80px;max-width:40px"  alt="no image"></td>
                            <td>
                            <a href="?menu=products&product_id=<?php echo $row['product_id'] ?>&query=edit">
                                    <i class="fas fa-edit"></i>
                                </a>&nbsp;
                                <a href="?menu=products&product_id=<?php echo $row['product_id'] ?>&query=delete">
                                    <i class="fa fa-minus-circle"></i>
                                </a>&emsp;
                                <a href="?menu=products&product_id=<?php echo $row['product_id'] ?>&query=copy">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </a>&emsp;
                                <a href="?menu=products&product_id=<?php echo $row['product_id'] ?>&query=show">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                    </tr>
                        <?php } ?>
            </table>
<?php
        }
        else
        {
            echo 'No product -> Click the button to add new product';
        } ?>