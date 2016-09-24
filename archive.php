<?php
/* default blog category page */
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

	<!-- page header -->   
	<?php include('pageheader.php') ?>

   <!-- content -->
    <div id="content"> <!-- page content -->

		<section>
			<div class="">
				<div class="container contentArea">
					<div class="row">	  
						<div  class="col-md-9">

							<!-- Start the Loop. --> 
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<!-- Display the Post's Content -->

							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<hr/>

							<?php the_excerpt(); ?>
							
							<!-- Stop The Loop (but note the "else:" - see next line). -->
							<?php endwhile; 
							
							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page'),
								'next_text'          => __( 'Next page'),
							) );
							
							else: ?>

							<!-- The very first "if" tested to see if there were any Posts to -->
							<!-- display.  This "else" part tells what do if there weren't any. -->
							<h1>Page not found</h1>
							<p>Sorry, that page no longer exists. The page may have been removed or you have followed an obsolete link.
							Please use the site's navigation menus to try again.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

							<!-- REALLY stop The Loop. -->
							<?php endif; ?>

							<!-- /post -->
							
						</div> 
						<div  class="col-md-3">
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
						</div> 
					</div>
				</div>
			</div>
		</section>

		
    </div><!-- end page container -->   

<?php get_footer(); ?>