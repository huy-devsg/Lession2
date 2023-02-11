<div style="text-align: center;">
  <ul class="pagination">
    <?php if ($currentPage > 1) { ?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $prevPageLink; ?>">Previous</a>
      </li>
    <?php } else { ?>
      <li class="page-item">
        <span class="page-link">Previous</span>
      </li>
    <?php } ?>
    <?php for ($i = 1; $i <= $totalPages; $i++) {
      if ($i == $currentPage) {
        echo '<li class="page-item"><a class="page-link" style="color:red;font-weight:bold" href="index.php?menu=products&pages='.$i.'">'.$i.'</a></li>';
      } else {
        if ($currentProductName == "") {
          echo '<li class="page-item"><a class="page-link" href="index.php?menu=products&pages='.$i.'">'.$i.'</a></li>';
        } else {
          echo '<li class="page-item"><a href="?menu=products&search_keyword='.$currentProductName.'&pages='.$i.'">'.$i.'</a></li>';
        }
      }
    }
    ?>
    <?php if ($currentPage < $totalPages) { ?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $nextPageLink; ?>">Next</a>
      </li>
    <?php } else { ?>
      <li class="page-item">
        <span class="page-link">Next</span>
      </li>
    <?php } ?>
  </ul>
</div>
