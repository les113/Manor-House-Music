	<!-- page header --> 
	<div class="transwrap">	
		<div id="topbar" class="wrapTopbar">
			<div class="container">
				<div class="row">	
					  <nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="topnav">
							<?php /* function for dropdown menu */
								wp_nav_menu( array(
								  'theme_location' => 'top-menu',
								  'depth' => 2,
								  'container' => false,
								  'menu_class' => 'nav navbar-nav',
								  //Process nav menu using our custom nav walker
								  'walker' => new wp_bootstrap_navwalker()
								  )
								);
							?>
						<!-- social links -->
						<?php dynamic_sidebar( 'sidebar-4' ); ?>
						</div><!-- /.navbar-collapse -->	
					</nav>
				</div>
			</div><!-- /.container-fluid -->
		</div> <!-- end wrapper -->

		<!-- bootstrap menu -->  
		<div class="container">
			<div class="row">	
				<header class="col-md-12 textCenter">
					<div class="sitelogo marginTop marginBottom">
						<a href="<?php echo site_url(); ?>"><img alt="Logo" src="<?php bloginfo( 'template_url' ); ?>/img/logo.png" /></a>
					</div>
				</header>
			</div>
		</div>
		<div class="container">
			<div class="row">	
				  <nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="mainnav">
						<?php /* function for dropdown menu */
							wp_nav_menu( array(
							  'theme_location' => 'main-menu',
							  'depth' => 2,
							  'container' => false,
							  'menu_class' => 'nav navbar-nav',
							  //Process nav menu using our custom nav walker
							  'walker' => new wp_bootstrap_navwalker()
							  )
							);
						?>
					</div><!-- /.navbar-collapse -->	
				</nav>
			</div>
		</div><!-- /.container-fluid -->
	</div>