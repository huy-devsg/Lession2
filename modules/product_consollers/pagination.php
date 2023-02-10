<?php
declare(strict_types=1);
class Product{
    public function list(int $page = 1, int $itemsPerPage = 10): array
    {
        $start = ($page-1)  * $itemsPerPage;
        $sqlProductList = "SELECT * FROM tbl_product ORDER BY product_name DESC LIMIT $start, $itemsPerPage";
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









}

$itemsPerPage = 10;

$product = new Product($mysqli);
$productList = $product->list($currentPage, $itemsPerPage);
$totalItems = $product->count();
$totalPages = ceil($totalItems / $itemsPerPage);



?>
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