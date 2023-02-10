<?php
declare(strict_types=1);
class Product
{
    protected $mysqli;
    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
        
    }

    public function list(int $page = 1, int $itemsPerPage = 10, string $searchKeyword = ""): array
{
    $start = ($page-1) * $itemsPerPage;
    $whereClause = "";
    if (!empty($searchKeyword)) {
        $whereClause = "WHERE product_name LIKE '%$searchKeyword%' OR category_name LIKE '%$searchKeyword%'";
    }
    $sqlProductList = "SELECT * FROM tbl_product $whereClause ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
    $queryProductList = $this->mysqli->query($sqlProductList);

    $productList = array();
    while ($row = $queryProductList->fetch_array()) {
        $productList[] = $row;
    }

    return $productList;
}

    public function count(): int
    {
        $sqlProductCount = "SELECT COUNT(*) as total FROM tbl_product";
        $queryProductCount = $this->mysqli->query($sqlProductCount);
        $row = $queryProductCount->fetch_array();
        return (int) $row['total'];
    }
    public function search(string $keyword, int $page = 1, int $itemsPerPage = 10): array
    {
        $start = ($page-1)  * $itemsPerPage;
        $keyword = $this->mysqli->real_escape_string($keyword);
        $sqlProductSearch = "SELECT * FROM tbl_product WHERE product_name LIKE '%$keyword%' ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
        $queryProductSearch = $this->mysqli->query($sqlProductSearch);
    
        $productList = array();
    
        while ($row = $queryProductSearch->fetch_array()) {
            $productList[] = $row;
        }
    
        return $productList;
    }
    
    public function filterByCategory(string $category, int $page = 1, int $itemsPerPage = 10): array
    {
        $start = ($page-1)  * $itemsPerPage;
        $category = $this->mysqli->real_escape_string($category);
        $sqlProductFilter = "SELECT * FROM tbl_product WHERE category_name = '$category' ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
        $queryProductFilter = $this->mysqli->query($sqlProductFilter);
    
        $productList = array();
    
        while ($row = $queryProductFilter->fetch_array()) {
            $productList[] = $row;
        }
    
        return $productList;
    }
    
    
    
}

$sqlProductList = new Product($mysqli);
$categories = $categoryList->getCategories();
$currentPage = 1;
if (isset($_GET['id_pages'])) {
    $currentPage = (int) $_GET['id_pages'];
}

$keyword = '';
$category = '';
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $productList = $product->search($keyword, $currentPage, $itemsPerPage);
    $totalItems = count($productList);
} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $productList = $product->filterByCategory($category, $currentPage, $itemsPerPage);
    $totalItems = count($productList);
}



$itemsPerPage = 10;
$searchKeyword = "";
if (isset($_GET['search_keyword'])) {
    $searchKeyword = $_GET['search_keyword'];
}

$product = new Product($mysqli);
$productList = $product->list($currentPage, $itemsPerPage, $searchKeyword);
$totalItems = $product->count();
$totalPages = ceil($totalItems / $itemsPerPage);
        if($totalItems>0)
        {
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
                            <a href="?action=products&product_id=<?php echo $row['product_id'] ?>&query=edit">
                                    <i class="fas fa-edit"></i>
                                </a>&nbsp;
                                <a href="?action=products&product_id=<?php echo $row['product_id'] ?>&query=delete">
                                    <i class="fa fa-minus-circle"></i>
                                </a>&emsp;
                                <a href="?action=products&product_id=<?php echo $row['product_id'] ?>&query=copy">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </a>&emsp;
                                <a href="?action=products&product_id=<?php echo $row['product_id'] ?>&query=show">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                    </tr>
                        <?php } ?>
            </table>
            <div style="text-align: center;">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo '<li class="page-item"><a class="page-link" style="color:red;font-weight:bold" href="index.php?action=products&id_pages='.$i.'">'.$i.'</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="index.php?action=products&id_pages='.$i.'">'.$i.'</a></li>';
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </div>
        <?php }
        else
        {
            echo 'No product';
        } ?>
