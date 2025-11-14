<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

		<title><?php echo (is_home() ? '' : (is_404() ? 'Erreur - ' : get_the_title() . ' - ') ) . get_bloginfo('title') . ' - ' . get_bloginfo('description'); ?></title>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

		<!-- fonts -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
		<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->

		<!-- <link rel="stylesheet" href="https://use.typekit.net/gbe2pwk.css"> -->

		<!-- theme -->
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/theme.css"></noscript>	

		<!-- libs -->
        <!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/headroom.min.js"></script> -->
	
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
			/>

		<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class("age-verified"); ?>>

		<?php get_template_part('template-parts/common/component/age-gate'); ?>

		<div class="wrapper">

            <?php get_template_part('template-parts/common/header', false, $args); ?>

			<div class="main">
