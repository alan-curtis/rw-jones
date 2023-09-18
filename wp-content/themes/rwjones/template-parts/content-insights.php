<div class="insights-title-section">
	<div class="page-banner-clipper clipper-svg">
			<div class="title-container">
			<?= the_title(); ?>
			<?php if( !empty( $subtitle ) ): ?>
			<div class="subtitle">
				<?= $subtitle; ?>
			</div>
			<?php endif; ?>
			</div>
			<svg width="1440" height="90" viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V90H1440V0C1440 49.7056 1117.65 90 720 89.9999C322.355 89.9999 0.000531296 49.7056 7.86869e-06 0H0Z" fill="#D9D9D9"/>
            </svg>
		</div>
	</div>

    <?php
$featured_post = get_field('featured_post_object');
if( $featured_post ): ?>
<div class="featured-news-section">
    <div class="container">
    <?php 
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        $custom_field = get_field( 'field_name', $featured_post->ID );
        $category = get_the_category($featured_post->ID);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post->ID ), 'full' );
        $image_id = get_post_thumbnail_id($featured_post->ID);
        $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
        ?>

            <div class="row">
                <div class="col-12 d-md-flex px-0 px-md-2">
                <div class="img">
                <a href="<?php echo esc_url( $permalink ); ?>">
                <img src="<?=$image[0]; ?>" alt="<?= $alt_text; ?>">
                </a>
                </div>
                <div class="content align-self-end">
                <div class="category">
                <a href="/category/<?=$category[0]->slug; ?>"><?=$category[0]->name; ?></a>
            </div>
                <div class="title">
                <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            </div>
            <div class="date">
                <?php echo get_the_date('F j, Y', $featured_post->ID); ?>
            </div>
                </div>
                </div>
 

                
            </div>
    </div>
    <hr class="hr">
</div>
<?php endif; ?>

<?php 
 $search_shortcode = get_field('insight_search_shortcode'); 
 $results_shortcode = get_field('insight_results_shortcode');?>
 <div class="container">
 <div class="insights-search-container">
    <div class="col-12">
        <?php echo do_shortcode($search_shortcode); ?>
    </div>

</div>

<div class="insights-results-container">
    <div class="col-12">
        <?php echo do_shortcode($results_shortcode); ?>
    </div>

</div>
 </div>
