<?php 
if ( $query->have_posts() )
{
	?>
<div class="container insight-search-results-container">



	<?php
	while ($query->have_posts())
	{
       $query->the_post();
       $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'small', true )[0];
       $alt_text = get_post_meta($query->ID, '_wp_attachment_image_alt', true);
       $title = get_the_title( $query->ID );
       $link = get_permalink($query->ID );
       $caption = wp_trim_words(get_the_content(), 15, '...');
       $terms = get_the_terms( $query->ID, 'category');
    ?>
    <div class="insight-article d-flex">
        <div class="content-wrapper">
            <div class="category">
                    <?php 
                    foreach ( $terms as $term ) {
                        echo '<span class="insight-category">' . $term->name . '</span>';
                    }
                    ?>
            </div>
            <h3><a href="<?= $link;?>"><?= $title;?></a></h3>
            <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
        </div>
        <?php  if( !empty($thumbnail_src) ): ?>
        <a href="<?= $link;?>" class="image-wrapper">
            
            <img src="<?= $thumbnail_src; ?>" alt="<?=$alt_text?>">
        </a>
        <?php endif; ?>
    </div>

    <?php
    }
    ?> 
</div>

    <?php
}?>