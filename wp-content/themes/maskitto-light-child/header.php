<?php
/**
 * The header for this UCLA theme.
 *
 * @package Maskitto Light Child
 */

global $maskitto_light;

$enable_javascript = 'http://www.enable-javascript.com';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if( isset($maskitto_light['favicon-image']['thumbnail']) && $maskitto_light['favicon-image']['thumbnail'] ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url($maskitto_light['favicon-image']['thumbnail']); ?>" />
	<?php endif; ?>
	<?php echo maskitto_light_generate_css(); ?>
	<!--TESTING BREAK Load the plugins-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- TESTING BREAK
<div style="width:100%;height:500px;background-color:black"> testing</div>
-->

<?php
	$loading_animation = 0;
	if( isset($maskitto_light['loading-animation']) && $maskitto_light['loading-animation'] == 2 ) : 
		if (strpos(wp_get_referer(), get_home_url()) !== false) :
			$loading_animation = 0;
		else :
			$loading_animation = 1;
		endif;
	endif; ?>

<?php if( isset($maskitto_light['loading-animation']) && ( $maskitto_light['loading-animation'] == 1 || $loading_animation == 1 ) ) : ?>
	<div class="loading-animation">
		<div class="loading-animation-spinner spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<style>
		/* Loading animation keyframe and style */
		body {
			overflow: hidden;
		}

		.double-bounce1, .double-bounce2 {
			background-color: <?php echo $maskitto_light['primary-color']; ?>;
		}

		@-webkit-keyframes bounce {
			0%, 100% { -webkit-transform: scale(0.0) }
			50% { -webkit-transform: scale(1.0) }
		}

		@keyframes bounce {
			0%, 100% { 
				transform: scale(0.0);
				-webkit-transform: scale(0.0);
			} 50% { 
				transform: scale(1.0);
				-webkit-transform: scale(1.0);
			}
		}
	</style>
<?php endif; ?>



<header class="top<?php
		if( isset($maskitto_light['header-layout']) && $maskitto_light['header-layout'] == 4 ) :
			echo ' header-inverted-layout';
		elseif( isset($maskitto_light['header-layout']) && $maskitto_light['header-layout'] == 2 ) :
			echo ' header-layout-large';
		elseif( isset($maskitto_light['header-layout']) && $maskitto_light['header-layout'] == 3 ) :
			echo ' header-layout-large header-layout-large-small';
		elseif( isset($maskitto_light['header-layout']) && $maskitto_light['header-layout'] == 5 ) :
			echo ' header-layout-standard-large';
		endif;

		if( isset( $maskitto_light['header-layout'] ) && $maskitto_light['header-layout'] ) :
			echo ' framework-ok';
		endif;
	?>"<?php if( !isset($maskitto_light['header-sticky']) || $maskitto_light['header-sticky'] == 1 ) : ?> data-sticky="1"<?php endif; ?>>

	<?php if( ( isset( $maskitto_light['header-contacts'] ) && isset( $maskitto_light['header-social'] ) ) && ( $maskitto_light['header-contacts'] || $maskitto_light['header-social'] ) ) : ?>
	<div class="header-details<?php echo ( isset($maskitto_light['header-top-accent']) && $maskitto_light['header-top-accent'] == 1 ) ? ' header-details-accent-color' : ''; ?>">
		<div class="container">
			<div class="row">
				<!--ECHO email contact for website -->
				<div class="col-md-7 col-sm-7 our-info">
					<?php if(isset($maskitto_light['header-contacts']) && $maskitto_light['header-contacts']){ ?>

						<?php if( isset($maskitto_light['header-contacts-mail']) && $maskitto_light['header-contacts-mail'] ){ ?>
							<a href="mailto:<?php echo esc_attr($maskitto_light['header-contacts-mail']); ?>"><i class="fa fa-envelope"></i><?php echo esc_attr($maskitto_light['header-contacts-mail']); ?></a>
						<?php } ?>

						<?php if( isset($maskitto_light['header-contacts-phone']) && $maskitto_light['header-contacts-phone'] ){ ?>
							<span><i class="fa fa-phone"></i><?php echo esc_attr($maskitto_light['header-contacts-phone']); ?></span>
						<?php } ?>

					<?php } ?>
				</div>

				<!-- Maskitto theme social icons header
				<div class="col-md-5 col-sm-5 text-right soc-icons">
					<?php // if(isset($maskitto_light['header-social']) && $maskitto_light['header-social']) : ?>
						<?php // echo maskitto_light_social_icons(); ?>

						<?php // if(isset($maskitto_light['header-search']) && $maskitto_light['header-search']) : ?>
							<span class="search-input">
								<i class="fa fa-search"></i>
								<?php // get_search_form(); ?> 
							</span>
						<?php // endif; ?>
					<?php // endif; ?>
				</div>
				-->
				<!-- TOP NAV BAR UCLA to replace above code -->
				<div style="text-align:right" class="col-md-5 col-sm-5 text-right our-info">
					<span>
						<a style="padding:0" href="https://chancellorssociety.ucla.edu/alumni" class="learn" title="alumni portal">Alumni</a> | 
						<a style="padding:0" href="https://chancellorssociety.ucla.edu/students/" class="learn" title="student portal">Students</a> | 
						<a style="padding:0" href="https://chancellorssociety.ucla.edu/parents/" class="learn" title="parents portal">Parents</a> | 
						<a style="padding:0" href="https://chancellorssociety.ucla.edu/friends/" class="learn" title="friends portal">Friends</a> | 
						<a style="padding:0" href="https://chancellorssociety.ucla.edu/my-account/" class="learn" title="my account portal">My Account</a>
					</span>
				</div>
				
				
			</div>
		</div>
	</div>
	<?php elseif( isset($maskitto_light['header-layout']) && ( $maskitto_light['header-layout'] == 2 || $maskitto_light['header-layout'] == 3 ) ) : ?>
		<div style="height: 53px;"></div>
	<?php endif; ?>
	
	<nav class="primary navbar navbar-default" role="navigation">

		<div class="container" style="position: relative;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<i class="fa fa-bars"></i>
				</button>
				
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if(isset($maskitto_light['logo-image']) && $maskitto_light['logo-image']['url']) : ?>
						<img src="<?php echo esc_url( $maskitto_light['logo-image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
					<?php elseif( get_header_image() ) : ?>
						<img src="<?php echo esc_url( header_image() ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
					<?php elseif( isset($maskitto_light['header-layout']) ) : ?>

						<?php if( $maskitto_light['header-layout'] == 2 ) : ?>
							<div class="desktop-only" style="height: 53px;"></div>
						<?php elseif( $maskitto_light['header-layout'] == 3 ) : ?>
							<div class="desktop-only" style="height: 28px;"></div>
						<?php endif; ?>
						
					<?php endif; ?>
				</a>
			</div>

			<div id="donate-menu-button-mobile"><a class="btn give" href="https://giving.ucla.edu/Campaign/Donate.aspx?SiteNum=4&fund=00412G&lg=y" role="button" title="menu donate button">Donate</a></div>			

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
					/* Primary navigation */
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu' => 'Primary navigation',
						'depth' => 3,
						'container' => false,
						'fallback_cb' => 'false',
						'menu_class' => 'nav navbar-nav navbar-right navbar-primary',
						'walker' => new maskitto_light_wp_bootstrap_navwalker())
					);
				?>
			</div>
			
			

		</div>



	</nav>

</header>
	<div id="wrapper">

		<noscript>
			<div class="enable-javascript">
				<?php _e( 'Javascript is disabled in your web browser. Please enable it', 'maskitto-light' ); ?> 
				<a href="<?php echo esc_attr($enable_javascript); ?>" target="_blank" style="color:#fff;"><?php _e( '(see how)', 'maskitto-light' ); ?></a>.
			</div>
		</noscript>

	<?php 
		/* Reset search from layout to default */ 
		remove_filter( 'get_search_form', 'maskitto_light_header_seach_form' ); 
	?>