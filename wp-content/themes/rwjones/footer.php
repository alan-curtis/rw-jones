<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RWJones
 */

?>
<?php
if (have_rows('footer', 'option')) {
  while (have_rows('footer', 'option')) {
    the_row();
	$footerlogo = get_sub_field('footer_logo');
	$email = get_sub_field('email');
	$phone = get_sub_field('phone');
	$socials =  get_sub_field('social_repeater');
	$menu_1 = get_sub_field('menu_link_repeater_1');
	$menu_2 = get_sub_field('menu_link_repeater_2');
	$menu_3 = get_sub_field('menu_link_repeater_3');
	$menu_4 = get_sub_field('menu_link_repeater_4');
	$title_1 = get_sub_field('column_title_1');
	$title_2 = get_sub_field('column_title_2');
	$title_3 = get_sub_field('column_title_3');
    $footercopyright = get_sub_field('footer_copyright');
  }
}

?>
	<footer id="colophon" class="site-footer">
		<div class="bg-img">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div class="footer-image">
						<img src="<?= $footerlogo; ?>" alt="RW Jones Logo" class="footer-bg">
					</div>
					<div class="footer-info">
					<div class="email">
						Email: <a href="<?= $email['url']; ?>"><?= $email['title']; ?></a>
					</div>
					<div class="phone">
						Phone: <a href="<?= $phone['url']; ?>"><?= $phone['title']; ?></a>
					</div>
					<div class="social-wrap">
					<?php foreach ($socials  as $social ) {?>

				<a href="<?= $social['social_link']['url']?>" title="<?= $social['social_link']['title'];?>" class="social-icon">
					<?= $social['icon']; ?>
				</a>
				<?php } ?>
				</div>
					</div>

				</div>
				<div class="col-lg-3 col-12 px-3 px-md-2">
					<div class="footer-nav">
						<div class="column-title">
							<?= $title_1; ?>
						</div>
						<div class="row align-items-center">

						
					<?php foreach ($menu_1  as $menu ) {?>

						<div class="col-lg-12 col-6 menu-item">
							<a href="<?= $menu['menu_link']['url']; ?>" target="<?= $menu['menu_link']['target']; ?>"><?= $menu['menu_link']['title']; ?></a>
						</div>
						<?php } ?>
						</div>
					</div>

				</div>
				<div class="col-lg-3 col-12 px-3 px-md-2">
				<div class="footer-nav-2">
						<div class="row align-items-center">

						
					<?php foreach ($menu_2  as $menu ) {?>

						<div class="col-lg-12 col-6 menu-item">
							<a href="<?= $menu['menu_link']['url']; ?>" target="<?= $menu['menu_link']['target']; ?>"><?= $menu['menu_link']['title']; ?></a>
						</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-12 px-3 px-md-2">
				<div class="footer-nav">
				<div class="column-title">
							<?= $title_2; ?>
						</div>
						<div class="row align-items-center">

						
					<?php foreach ($menu_3  as $menu ) {?>

						<div class="col-lg-12 col-6 menu-item">
							<a href="<?= $menu['menu_link']['url']; ?>" target="<?= $menu['menu_link']['target']; ?>"><?= $menu['menu_link']['title']; ?></a>
						</div>
						<?php } ?>
						</div>
						<div class="footer-nav-last">
				<div class="column-title">
							<?= $title_3; ?>
						</div>
						<div class="row align-items-center">

						
					<?php foreach ($menu_4  as $menu ) {?>

						<div class="col-lg-12 col-6 menu-item">
							<a href="<?= $menu['menu_link']['url']; ?>" target="<?= $menu['menu_link']['target']; ?>"><?= $menu['menu_link']['title']; ?></a>
						</div>
						<?php } ?>
						</div>
					</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
				<div class="footer-copyright">
                    <?php echo $footercopyright; ?>
                  </div>
				</div>
			</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
