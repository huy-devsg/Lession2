<div class="menu">
  <div class="menu_list">
    <nav class="navbar navbar-expand-lg navbar-light bg-light"style="height:120px">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText" style="font-size:20px">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0"style="padding:60px">
            <?php
                include('menu_list.php');
            ?>
          </ul>
          </div>
          <span class="navbar-text" style="float:right;">
          <a href="index.php"><img src="images/logo.png" width="120px"></a>
          </span>
        </div>
      </div>
    </nav>
  </div>