
<div style="text-align:center">
    <?php
        $sql = "SELECT COUNT(*) as count FROM tbl_product";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
        $total_records = $row['count'];
        $product = new Product($mysqli);
        $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $per_page = 10;
        $productList = $product->list($current_page, $per_page);
        $total_pages = ceil($total_records / $per_page);
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo "<span style='font-weight:bold; color:red;'>" . $i . "</span> &emsp;";
            } else {
                echo "<a href='?page=" . $i . "'>" . $i . "</a> &emsp;";
            }
        }
    ?>
