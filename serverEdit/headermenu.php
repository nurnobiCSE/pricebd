<style>
.topnav {
    overflow: hidden;
    background-color: #000000;
}

.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #008000;
    color: #fff;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}

.topnav .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {
        display: none;
    }

    .topnav a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .topnav.responsive {
        position: relative;
    }

    .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
/*.dropdown:hover .dropdown-menu{*/
/*  display: block;*/
/*}*/
.dropdown-submenu .dropdown-menu {
  position: absolute;
  top: 0;
  left: 100%;
  margin-top: 100px; /* Adjust this value based on your design */
  min-width: 200px; /* Set the width for the nested submenu */
}
.navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
    color: #fff !important;
    background-color: green;
}
.navbar-default .navbar-brand {
    color: #fff;
}
.navbar-default .navbar-nav>li>a {
    color: #fff;
    font-size:18px !important;
}
.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color: green;
}
</style>

<!--<div class="topnav" id="myTopnav">-->
    
<!--    <a href="<?php echo site_url(); ?>">Home</a>-->
    <!--<a href="<?php  echo site_url('page','about'); ?>">About us</a>-->
<!--    <a href="<?php echo site_url('offers',"offers"); ?>">Discount & Offers </a>-->
<!--    <a href="<?php echo site_url('brands',"brands"); ?>">Brands</a>-->
<!--    <a href="<?php echo site_url('showrooms',"showrooms"); ?>">Showrooms</a>-->
<!--    <a href="<?php echo site_url('posts',"posts"); ?>">Review</a>-->
    <!--<a href="<?php echo site_url('page','contact'); ?>">Contact us</a>-->
    <!--<div class="dropdown">-->
<!--      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">-->
<!--        Dropdown-->
<!--        <span class="caret"></span>-->
<!--      </button>-->
<!--      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
<!--        <li><a href="#">Action</a></li>-->
<!--        <li><a href="#">Another action</a></li>-->
<!--        <li><a href="#">Something else here</a></li>-->
<!--        <li role="separator" class="divider"></li>-->
<!--        <li><a href="#">Separated link</a></li>-->
<!--      </ul>-->
<!--</div>-->
<!--    <a href="javascript:void(0);" class="icon" onclick="myFunction()">-->
<!--        <i class="fa fa-bars"></i>-->
<!--    </a>-->
<!--</div>-->
<!--<br>-->
<nav id="myTopnav" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('offers',"offers"); ?>">Discount & Offers </a></li>
        <li><a href="<?php echo site_url('brands',"brands"); ?>">Brands</a></li>
        <li><a href="<?php echo site_url('showrooms',"showrooms"); ?>">Showrooms</a></li>
        <li><a href="<?php echo site_url('posts',"posts"); ?>">Review</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category List <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <?php
                 $result = get_result('shop_categories','category_id,category_name,category_slug',"status ='1' AND parent_id=0",'category_name ASC');
                 foreach ($result as $r) {
                ?>
             <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $r['category_name']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                      $parent_id=$r['category_id'];
                      $result2 = get_result('shop_categories','category_id,category_name,category_slug',"status ='1' AND parent_id=$parent_id",'category_name ASC');
                      foreach ($result2 as $r2) {
                    ?>
                      <li><a href="<?php echo site_url('category',$r2['category_slug']); ?>"
                                        title="<?php echo $r2['category_name']; ?> Price in Bangladesh"><?php echo $r2['category_name']; ?></a></li>
                    <?php }?>
                </ul>
             </li>
             <?php } ?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
    // Add event listener to handle clicks on nested dropdowns
    var nestedDropdownToggles = document.querySelectorAll('.dropdown-submenu .dropdown-toggle');
    nestedDropdownToggles.forEach(function (toggle) {
      toggle.addEventListener('click', function(event) {
        var submenu = this.nextElementSibling;
        var otherSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-menu');
        otherSubmenus.forEach(function (otherSubmenu) {
          if (otherSubmenu !== submenu) {
            otherSubmenu.style.display = 'none';
          }
        });
        submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
        event.stopPropagation();
      });
    });

    // Add event listener to close submenus when clicking outside
    document.addEventListener('click', function(event) {
      var submenus = document.querySelectorAll('.dropdown-submenu .dropdown-menu');
      submenus.forEach(function (submenu) {
        if (!submenu.contains(event.target)) {
          submenu.style.display = 'none';
        }
      });
    });
  </script>