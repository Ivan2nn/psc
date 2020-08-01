<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Podere San Cristoforo</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.usebootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/original.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head();?>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"  /> -->
</head>
<body>
	<!-- HEADER -->
    <div class="header-area">
        <nav class="navbar navbar-dark fixed-top navbar-expand-lg bg-faded justify-content-center navbar-sets">
            <span class="d-flex w-50 mr-auto"></span>
            <div class="w-100 justify-content-center bg-black">
                <?php wp_nav_menu( array( 'container_class' => '', 'theme_location' => 'primary', 'menu_class'=> 'navbar-nav w-100 justify-content-between', 'walker' => new IMimi_Walker ) ); ?>
                <!-- <ul class="navbar-nav w-100 justify-content-center text-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="//codeply.com">Codeply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul> -->
                
                
            </div>
            <span class="d-flex w-50 ml-auto"></span>
        </nav>
        
    </div>
    
    <!-- END-HEADER -->