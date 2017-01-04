<?php
/*
default homepage
*/
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

	<!-- page header -->   
	<?php include('pageheader.php') ?>

    <!-- content -->
    <div id="content"> <!-- page content -->

		<!-- wordpress loop -->
 		<section>
			<div class="">
				<div class="row">
					<div  class="col-md-12">				
						<!-- Start the Loop. --> 
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<!-- Display the Page's Content -->
						<!-- not used <h1><?php //the_title(); ?></h1>-->

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
		</section>
		
	<!-- pull in section content from other pages -->
 		<section class="sectionOdd">
			<div class="container">
				<div class="row">	
					<div class="col-sm-12 col-md-6">
						<div class="">
						<?php
						$page_id = 3042; // page to pull in
						$post_id = get_post($page_id);
						$content = $post_id->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						echo $content;
						?>
						</div>
					</div>	
					<div class="col-sm-6 col-md-6">
						<div class="">
						<?php
						$page_id = 3042; // page's featured image
						$post_id = get_post($page_id);
						if ( ( is_singular() || is_home() ) && current_theme_supports( 'post-thumbnails' ) ) :
						echo get_the_post_thumbnail($post_id, 'medium', $post_title); ?>
						<?php endif;?>
						</div>
					</div>					
				</div>
			</div>
		</section>
 		<section class="sectionEven">
			<div class="container">
				<div class="row">	
					<div class="col-sm-12 col-md-6 col-md-push-6">
						<div class="">
						<?php
						$page_id = 3044; // page to pull in
						$post_id = get_post($page_id);
						$content = $post_id->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						echo $content;
						?>
						</div>
					</div>	
					<div class="col-sm-6 col-md-6 col-md-pull-6">
						<div class="">
						<?php
						$page_id = 3044; // page's featured image
						$post_id = get_post($page_id);
						if ( ( is_singular() || is_home() ) && current_theme_supports( 'post-thumbnails' ) ) :
						echo get_the_post_thumbnail($post_id, 'medium', $post_title); ?>
						<?php endif;?>
						</div>
					</div>					
				</div>
			</div>
		</section>
 		<section class="sectionOdd">
			<div class="container">
				<div class="row">	
					<div class="col-sm-12 col-md-6">
						<div class="">
						<?php
						$page_id = 3046; // page to pull in
						$post_id = get_post($page_id);
						$content = $post_id->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						echo $content;
						?>
						</div>
					</div>	
					<div class="col-sm-6 col-md-6">
						<div class="">
						<?php
						$page_id = 3046; // page's featured image
						$post_id = get_post($page_id);
						if ( ( is_singular() || is_home() ) && current_theme_supports( 'post-thumbnails' ) ) :
						echo get_the_post_thumbnail($post_id, 'medium', $post_title); ?>
						<?php endif;?>
						</div>
					</div>					
				</div>
			</div>
		</section>	
 		<section class="sectionEven hidden-xs hidden-sm">
			<div class="container">
				<div class="row">	
					<div class="col-md-12">
						<div>
						<?php
						$page_id = 3048; // page to pull in
						$post_id = get_post($page_id);
						$content = $post_id->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						echo $content;
						?>
						</div>
					</div>					
				</div>
			</div>
		</section>
 		<section>
			<div class="container hidden-xs hidden-sm">
				<div class="row">	
					<div class="col-md-6">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, "video1-id", true); ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="col-md-6">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, "video2-id", true); ?>" frameborder="0" allowfullscreen></iframe>
					</div>						
				</div>
			</div>
			<div class="container">
				<div class="row">	
					<div class="col-md-12 marginTop marginBottom aligncenter">
						<div>
							<h2>Contact us to discuss your event</h2>
						</div>
						<div><a href="/contact-us/"><button class="btn">Contact Us</button></a></div>
					</div>
				</div>
			</div>	
		</section>
    </div><!-- end content -->   

    <!-- footer -->
	<?php get_footer(); ?>
 