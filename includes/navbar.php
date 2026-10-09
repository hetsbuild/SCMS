<nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <!--@Html.ActionLink("Home", "Index", "Home", new { area = "" }, new { @class = "nav-link" }) //from asp.net nav-->
          <a href="<?php echo BASE_URL; ?>pages\dashboard\admin.php" class="nav-link">Home</a>
        </li>
        <li style="display:none" class="nav-item d-none d-sm-inline-block">
          <!--@Html.ActionLink("About", "About", "Home", new { area = "" }, new { @class = "nav-link" }) //from asp.net nav-->
          <a href="#" style="display:none" class="nav-link">Contact</a>
        </li>
        <li style="display:none" class="nav-item d-none d-sm-inline-block">
          <!--@Html.ActionLink("Contact", "Contact", "Home", new { area = "" }, new { @class = "nav-link" }) //from asp.net nav-->
          <a href="#" style="display:none" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>