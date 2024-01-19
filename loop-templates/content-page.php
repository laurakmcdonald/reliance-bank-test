<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="entry-content">
		<?php // ACF flexible content section

			// Check value exists.
			if( have_rows('page_content') ):

				// Loop through rows.
				while ( have_rows('page_content') ) : the_row();

					// Case: Hero layout
					if( get_row_layout() == 'hero' ):
						$bgimage = get_sub_field('background_image'); 
						$title = get_sub_field('header');
						$text = get_sub_field('text'); 
						?>

						<section class="text-white home-hero">
							<div class="container-fluid" <?php if ($bgimage) { ?>style="background: url(<?php echo $bgimage; ?>) no-repeat 50%; background-size: cover;"<?php } ?>>
								<div class="row">
									<div class="col-lg-5">
										<header class="entry-header">
											<h1><?php echo $title; ?></h1>
										</header><!-- .entry-header -->
										<?php echo $text; ?>
										<?php
										$button_hero = get_sub_field('button');
										if( $button_hero ): ?>
											<a href="<?php echo esc_url( $button_hero['button_link'] ); ?>" title=""><div class="btn btn-outline-light"><?php echo $button_hero['button_text']; ?></div></a>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
						</section>	

					<?php // Case: Title with text
					elseif( get_row_layout() == 'title_with_text' ):
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						$bgimage = get_sub_field('background_image'); ?>

						<section class="title-with-text" <?php if ($bgimage) { ?>style="background-image: url(<?php echo $bgimage; ?>)"<?php } ?>>
							<div class="container-fluid">
								<div class="row justify-content-md-center">
									<div class="col-md-7">
										<h2 class="text-center text-primary text-uppercase"><?php echo $title; ?></h2>
										<?php echo $text; ?>
									</div>
								</div>
							</div>

						</section>		

					<?php // Case: Image left text right
					elseif( get_row_layout() == 'image_left_text_right' ):
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						$leftimage = get_sub_field('image');	
						$leftimage_retina = substr_replace( $leftimage, '@2x', '-4', 0 );
						?>
					
						<section class="image-left-text-right">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6">
										<img class="" srcset="<?php echo $leftimage ?>, <?php echo $leftimage_retina ?> 2x" src="<?php echo $leftimage ?>" alt=""></a>
									</div>
									<div class="col-lg-6">
										<div class="main-text">
											<h4 class="text-primary"><?php echo $title; ?></h4>
											<?php echo $text; ?>
											<?php
											$button_right = get_sub_field('button');
											if( $button_right ): ?>
												<a href="<?php echo esc_url( $button_right['button_link'] ); ?>" title="" class="btn btn-outline-primary"><?php echo $button_right['button_text']; ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</section>		
					
					<?php // Case: text left image right
					elseif( get_row_layout() == 'text_left_image_right' ):
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						$rightimage = get_sub_field('image');	
						$rightimage_retina = substr_replace( $leftimage, '@2x', '-4', 0 );
						?>
					
						<section class="text-left-image-right">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6 order-lg-last">
										<img class="" srcset="<?php echo $rightimage ?>, <?php echo $rightimage_retina ?> 2x" src="<?php echo $rightimage ?>" alt=""></a>
									</div>	
									<div class="col-lg-6 order-lg-first">
										<div class="main-text">
											<h4 class="text-primary"><?php echo $title; ?></h4>
											<?php echo $text; ?>
											<?php
											$button_left = get_sub_field('button');
											if( $button_left ): ?>
												<a href="<?php echo esc_url( $button_left['button_link'] ); ?>" title="" class="btn btn-outline-primary"><?php echo $button_left['button_text']; ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</section>	

					<?php // Case: Rate repeater
					elseif( get_row_layout() == 'rate_repeater' ):
						$title = get_sub_field('title');
						?>
					
						<section class="rate-repeater  text-center">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<h3 class="text-primary"><?php echo $title; ?></h3>
										<?php
										if( have_rows('rate_block') ): ?>
										<div class="row">
											<div class="col-12 order-sm-last">
												<a class="btn btn-outline-primary text-uppercase" href="#" title="View all rates">View all rates</a>
											</div>
											<?php while( have_rows('rate_block') ) : the_row();
												$rate = get_sub_field('rate');
												$rate_title = get_sub_field('rate_title');
												$learn_more_text = get_sub_field('learn_more_text');
												$learn_more_link = get_sub_field('learn_more_link');
												$highlighted = get_sub_field('highlighted'); ?>
												<div class="col-lg-6 col-sm-12 rate-block<?php if ($highlighted == true) { ?> highlighted text-white<?php } ?>">
													<h4>Item Title</h4>
													<h3><?php echo $rate; ?>%</h3>
													<a class="btn btn-link text-uppercase" href="<?php echo $learn_more_link; ?>" title="Learn More"><?php echo $learn_more_text; ?></a>
												</div>
											<?php endwhile; ?>
			
										</div>
										<?php endif; ?>	
									</div>								
								</div>
							</div>
						</section>							
					<?php	
					endif;

				// End loop.
				endwhile;
				
			endif;

			// end ACF flexible content
			$blog_query = new WP_Query( 'post_type=post&posts_per_page=3' );
			if ( $blog_query->have_posts() ) {  ?>
			<section class="more-to-explore">
				<h3 class="text-primary text-center">More To Explore</h3>
				<div class="row">
				<?php while ( $blog_query->have_posts() ) { 
					$blog_query->the_post(); ?>
					<div <?php post_class('col-lg-4 col-md-12'); ?> id="post-<?php the_ID(); ?>">

						<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>

						<header class="entry-header">

							<?php
							the_title(
								sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></h3>'
							);
							?>

						</header><!-- .entry-header -->

						

						<div class="entry-content">

							<?php
							the_excerpt();
							?>

						</div><!-- .entry-content -->


					</div><!-- #post-## -->

				<?php } ?>
				</div>
			</section>
		<?php } ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
