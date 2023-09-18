<?php
$featured_posts = get_field('related_news_post_object');
$title = get_field('title');
$link = get_field('link');
if( $featured_posts ): ?>
<div class="related-news-section">
    <div class="container">
    <div class="d-flex align-items-center title">

        <div class="me-auto ">
            <h2><?= $title; ?></h2>
        </div>
        <div class="p2 read-all">
        <a href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
        </div>

</div>
    <div class="row justify-content-center">

    <?php foreach( $featured_posts as $featured_post ): 
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        $custom_field = get_field( 'field_name', $featured_post->ID );
        $category = get_the_category($featured_post->ID);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post->ID ), 'full' );
        $image_id = get_post_thumbnail_id($featured_post->ID);
        $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
        ?>
        <div class="col-lg-4">
            <div class="row row-space">
                <div class="order-2 order-md-1 col-md-12 col-4">
                <div class="img">
                <a href="<?php echo esc_url( $permalink ); ?>">
                <img src="<?=$image[0]; ?>" alt="<?= $alt_text; ?>">
                </a>
                </div>
                </div>
                <div class="order-1 order-md-2 col-md-12 col-8">
                <div class="category">
                <a href="/category/<?=$category[0]->slug; ?>"><?=$category[0]->name; ?></a>
            </div>
            <div class="title">
                <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            </div>
                </div>
                
            </div>


            
        </div>
    <?php endforeach; ?>

    </div>
    </div>
</div>
<?php endif; ?>