<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RWJones
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rwjones' ); ?></a>
  <div class="sticky-logo">
                  <div class="logo">
                  <?php
                  the_custom_logo();
                  ?>
                  </div>
                  </div>
	<header id="masthead" class="site-header">

		<div class="site-branding">
		<div class="container-fluid px-5">
            <div class="site-branding row align-items-center">
                <div class="col-3">
                </div>
                <div class="col-7">
				<div class="menu-wrapper">
                        <nav id="site-navigation" class="main-navigation desktop-nav">
                          <?php
                          wp_nav_menu(
                            array(
                              'theme_location' => 'menu-1',
                              'menu_id' => 'primary-menu',
                            )
                          );
                          ?>
                        </nav>
                    </div>
                </div>
            </div><!-- .site-branding -->
        </div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
