<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper text-white" id="wrapper-footer">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-12 logo-col">
							<?php $footerimage = get_field('logo_footer', 'option');
							$x2 = '@2x';
							$position = '-4';
							$retina2 = substr_replace( $footerimage, $x2, $position, 0 );
							?>
							<a href="/" title="Reliance Bank"><img class="logo-footer" srcset="<?php echo $footerimage ?>, <?php echo $retina2 ?> 2x" src="<?php echo $footerimage ?>" alt="Reliance Bank"></a>

							<p class="routing-number">Routing # <?php the_field('routing_number', 'option'); ?></p>

							<?php $fdic = get_field('fdic_logo', 'option');
							$fdic_retina = substr_replace( $fdic_logo, $x2, $position, 0 );
							?>
							<a href="/" title="Member FDIC"><img class="fdic" srcset="<?php echo $fdic; ?>, <?php echo $fdic_retina ?> 2x" src="<?php echo $fdic ?>" alt="Member FDIC"></a>

						</div>

						<div class="col-lg col-md-6 col-sm-12 quick-links">
							<h3>Quick Links</h3>
							<?php wp_nav_menu( array ( 'menu' => 'quick-links') ); ?>
						</div>	

						<div class="col-lg col-md-6 col-sm-12 connect-col">
							<h3>Connect</h3>
							<a href="#" title="Contact" class="btn btn-outline-light">Contact</a>

							<p class="telephone"><a href="tel:1-800-570-0876" title="Telephone">1-800-570-0876</a></p>

							<div class="mobile-app">
								<?php $mobileapp = get_bloginfo('wpurl'). '/wp-content/uploads/2022/07/mobile.png';
								$mobileapp_retina = substr_replace( $mobileapp, $x2, $position, 0 ); ?>
								<a href="<?php the_field('mobile_app_link', 'option'); ?>" title="mobile app"><img srcset="<?php echo $mobileapp; ?>, <?php echo $mobileapp_retina ?> 2x" src="<?php echo $mobileapp; ?>" alt="mobile app" /><p>Download Our Mobile App</p></a>
							</div>

							<?php if( have_rows('social_media', 'option' ) ): ?>
							<ul class="social-media">
								<?php while( have_rows('social_media', 'option') ): the_row();  ?>
								<?php $icon = get_sub_field('icon');
								$icon_retina = substr_replace( $fdic_logo, $x2, $position, 0 );
								?>
								<li><a href="<?php the_sub_field('link'); ?>" title=""><img class="icon" srcset="<?php echo $icon; ?>, <?php echo $icon_retina ?> 2x" src="<?php echo $icon ?>" alt=""></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="col-lg col-md-6 col-sm-12 contact-col">
							<div class="contact-us">
							<h3>Contact Us</h3>
							<?php echo do_shortcode('[wpforms id="150" title="false"]'); ?>
							</div>
						</div>
					</div class="row">

					<div class="site-info">

						<?php understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

