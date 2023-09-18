<div class="person-wrapper">
    <div class="container">
        <div class="row">
            <div class="person-title">
                <h2><?= get_field('title');?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            $featured_posts = get_field('person_post_object');
            if (!empty($featured_posts)) {
            foreach( $featured_posts as $featured_post ): 
                    $custom_field = get_field( 'field_name', $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    $permalink = get_permalink( $featured_post->ID );
                    $name = get_field('last_name', $featured_post->ID );
                    $department = get_field('caption',$featured_post->ID );
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post->ID ), 'full' );
                    $image_id = get_post_thumbnail_id($featured_post->ID);
                    $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
                    ?>
                    <div class="col-md-3 col-wrapper">
                        <div class="person-section">
                            <div class="img-wrap">
                            <a href="<?php echo esc_url( $permalink ); ?>">
                                <img src="<?php echo $image[0]; ?>" alt="<?php $alt_text; ?>">
                             </a>
                            </div>
                            <div class="info">
                                <div class="person-name"><a href="<?php echo esc_url( $permalink ); ?>"><?= $title; ?></a></div>
                                <p class="person-department">
                                    <?php echo $department; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
            
            endforeach;
             }
            ?>
        </div>
    </div>
</div>