<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="">

    <title></title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?=base_url()?>library/content/styles/foundation.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=base_url()?>library/content/styles/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=base_url()?>library/content/styles/foundation-icons/foundation-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=base_url()?>library/content/styles/vendor/sol.css" type="text/css" media="all">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="<?=base_url();?>library/scripts/sol.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxscdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <header>
      <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title">Menu</div>
      </div>
      <div class="top-bar" id="realEstateMenu">
        <div class="top-bar-left">
          <ul class="menu" data-responsive-menu="accordion">
            <li class="menu-text">PSI SCHEDULE</li>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/branches">Branches</a></li>
            <li><a href="/crew">Crew</a></li>
            <li><a href="/tasks">Tasks</a></li>
            <li><a href="/users">Users</a></li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
            <?php $name = $this->session->userdata('name'); ?>
            <?php if(!empty($name)) : ?>
              <li>Signed in as <?=$name;?>&nbsp;</li>
            <?php endif; ?>
            <li><a class="button" href="<?=base_url();?>logout">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </header>
