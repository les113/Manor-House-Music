<?php
/**
 * The template for displaying the header
 *
 **/
 ?><!doctype html>
<html <?php language_attributes(); ?>>

<head>  
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?>
	</title>
    
    <meta name="author" content="Lamtha2 Web Design, Aylesbury">
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	
    <meta charset="utf-8">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/bootstrap-3.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/font-awesome-4.2.0/css/font-awesome.min.css" >

    <!-- fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

    <!-- stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style.css">

	<?php wp_head(); ?>
</head>

