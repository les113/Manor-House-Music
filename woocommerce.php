<?php
/* the template for woocommerce */
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
						<div class="col-md-9" id="woocommerce">

							<?php woocommerce_breadcrumb(); ?>
							
							<!-- Start the Loop. --> 
							<?php woocommerce_content(); ?>
							
							<!--<h2>Top Rated Products</h2>-->
							<?php //echo do_shortcode("[top_rated_products per_page='4']"); ?>
							
						</div> 
						<div class="col-md-3" id="">

							<!-- Sidebar --> 
							<?php get_sidebar(); ?>
							
						</div> 
					</div>
				</div>
			</div>
		</section>
		
    </div><!-- end page container -->   

<?php get_footer(); ?>