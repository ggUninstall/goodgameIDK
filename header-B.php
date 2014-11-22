<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(!is_page(753)) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php endif; ?>

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>


<?php
	ob_start();
    language_attributes();
    $clang = ob_get_clean();
	$pos = strpos($clang, 'es');
	if ($pos !== false) {
 ?>
 <style>
 	#mainhead {
		width:100% !important;
		margin-top: -40px;
	}
	@media screen and (max-width: 880px) {
		#book-online {
			position: relative !important;
		}
		#mainhead {
			margin-top: 0px;
		}
		.main-navigation ul.nav-menu, .main-navigation div.nav-menu > ul {
			display: block !important;
			text-align: center;
		}
	}
	@media screen and (max-width: 768px) {
		.main-navigation ul.nav-menu, .main-navigation div.nav-menu > ul {
			text-align: left;
		}
	}
</style>
<?php } ?>

</head>
<?php
// get locale
$a = mb_convert_encoding(get_locale(), "UTF-8");
$locl = '';
if(strpos($a,"_") > -1){
	$a = explode("_",$a);
	$locl = strtolower($a[0]);
} elseif(strpos($a,"-") > -1){
	$a = explode("-",$a);
	$locl = strtolower($a[0]);
} else {
	$locl = strtolower($a);
}
$locl = ($locl != "en") ? "/".$locl : "";
?>
<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<div id="header-container" class="container">
		<header id="masthead" class="site-header row" role="banner">
			<div id="head-top">
				<div id="reservations">
					<div id="reservations-b">
						<h4><a href="/luau-packages/" target="_blank">Reservations:</a> <span>(808) 842-5911</span></h4>
						<div id="Call-to-Action">
							<h4>Call Now: <a href="tel:18088425911"><span>(808) 842-5911</span></a></h4>
						</div>
					</div>
				</div>
			</div>
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" /></a>
			</div> <!-- #logo -->

			<div id="mainhead" class="five column">
					<div class="cb"></div>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<!-- <h3 class="menu-toggle"><?php //_e( 'Navigation', 'twentytwelve' ); ?></h3> -->
						<button class="menu-button">Navigation</button>
						<!-- <div class="skip-link assistive-text"><a href="#content" title="<?php //esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php //_e( 'Skip to content', 'twentytwelve' ); ?></a></div> -->
						<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					<div class="cb"></div>
			</div> <!-- #mainhead -->

			<div class="cb"></div>
		</header><!-- #masthead -->
		<div class="cb"></div>
	</div><!-- #header-container -->

	<?php if(is_front_page() || is_page('luau-packages-b')) : ?>
	<?php
		$uri = get_template_directory_uri();
	?>
	<div id="banner-container" class="container" style="background: url(<?php echo $uri; ?>/images/banner.png) center top no-repeat; background-size: cover;">

		<div id="banner" class="row"><div id="bannertext">
			<img src="<?php echo get_template_directory_uri(); ?>/images/Paradise-Cove-Small.png" alt="" /></div>
			<div id="take-a-tour-btn"><a href="<?php echo $locl; if(!empty($subs)) { echo $subs; } else echo "/"; ?>paradise-cove-map/" title=""><img src="<?php echo get_template_directory_uri(); ?>/images/Take-a-Tour.png" alt="" /></a></div>
		</div>
	</div>
	<?php endif; ?>


	<?php
	$page_url = CurrentPageURL();
	$lang_abv = strstr($page_url, 'com');
	$clean_page_url = str_replace(' ', '', $lang_abv);
	$lowercase = strtolower($clean_page_url);
	$subs = substr($lowercase, 3, 6)
	?>
	<?php if(is_front_page() || is_page( 'home-b' )) : ?>
	<div id="main-slider-container" class="container">
		<div id="main-slider" class="flexslider">
			<div class="slides">
				<img src="/wp-content/uploads/2013/04/homepage-slide-02.jpg" alt="Paradise Cove Dancer">
					<div class="slider-content">
						<img src="<?php echo get_template_directory_uri();?>/images/Paradise-Cove.png" alt="Paradise Cove Quote">
					</div>
			</div>
		</div>

	</div>
	<?php endif; ?>

	<div id="main-container" class="container">


	<div id="main" class="row">
	<?php if(is_page('home-b')):?>
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="entry-content" id="home-content">

					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
						<div id="Home-View-Packages">
							<a title="Luau Packages" href="/luau-packages-b/">
								View Luau Packages
							</a>
						</div>
					<div class="Home-Content-Footer">
						<div id="Award-Emblems">
							<img src="<?php echo get_template_directory_uri();?>/images/Star-Advertiser-Emblem.png">
							<img src="<?php echo get_template_directory_uri();?>/images/Honolulu-Magazine-Emblem.png">
						</div>
					</div>
				</div><!-- .entry-content -->
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->

				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	<?php endif; ?>
