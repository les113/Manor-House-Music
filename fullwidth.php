<?php
/*
Template Name: full width page
*/
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

	<!-- page header -->   
	<?php include('pageheader.php') ?>

	<!-- content -->
    <div id="content"> <!-- page content -->

		<section>
			<div class="">
				<div class="container">
					<div class="row">	  
						<div  class="col-md-12">

							<!-- Start the Loop. --> 
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<!-- Display the Post's Content -->

							<div><h1><?php the_title(); ?></h1></div>
							<div class="dashedline"></div>
							<?php the_content(); ?>

							<!-- Stop The Loop (but note the "else:" - see next line). -->
							<?php endwhile; else: ?>

							<!-- The very first "if" tested to see if there were any Posts to -->
							<!-- display.  This "else" part tells what do if there weren't any. -->
							<h1>Page not found</h1>
							<p>Sorry, that page no longer exists. The page may have been removed or you have followed an obsolete link.
							Please use the site's navigation menus to try again.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

							<!-- REALLY stop The Loop. -->
							<?php endif; ?>

							<!-- /post -->
							
						</div> 
					</div>
				</div>
			</div>
		</section>

    </div><!-- end page container -->   

<?php get_footer(); ?>
