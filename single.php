<?php
/* default blog post */
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
						<div  class="col-md-9">

							<!-- Start the Loop. --> 
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<!-- Display the Post's Content -->

							<div><h1><?php the_title(); ?></h1></div>
							<h2>By <?php the_author(); ?> &bull; <?php the_date(); ?> &bull; Posted in: <?php the_category(', ') ?> </h2>
							<?php the_content(); ?>
							<p class="tags">Tags: <?php print get_the_term_list( $post->ID, 'post_tag', '', ' ', '' ) ;?></p>

							<!-- AddThis Button BEGIN -->
							<?php echo "<div><a class=\"addthis_button\" href=\"http://www.addthis.com/bookmark.php?v=250&amp;pub=manorhouse\" addthis:url=\"".urlencode(get_permalink())."\" addthis:title=\"".urlencode(get_the_title($id))."\"><img src=\"http://s7.addthis.com/static/btn/v2/lg-share-en.gif\" width=\"125\" height=\"16\" alt=\"Bookmark and Share\" style=\"border:0\"/></a><script type=\"text/javascript\" src=\"http://s7.addthis.com/js/250/addthis_widget.js?pub=manorhouse\"></script></div>"; ?>
							<!-- AddThis Button END -->

							<h3>Comments</h3><?php comments_template(); // include comments template ?>

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
						<div  class="col-md-3">
							<?php dynamic_sidebar( 'sidebar-7' ); ?><!-- sidebar for posts -->
						</div> 
					</div>
				</div>
			</div>
		</section>

		
    </div><!-- end page container -->   

<?php get_footer(); ?>