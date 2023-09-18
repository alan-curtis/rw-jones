<div class="person-page-section">
    <div class="container">
    <?php 
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
    $group = get_field('program_options');
    $alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
    $bio = get_field('short_bio');
    $email =  get_field('email');
    $phone = get_field('phone');
    $caption = wp_trim_words(get_field('caption'), 15, '...');
    ?>


        <div class="row person-info-wrapper">
      
            <div class="col-lg-4">
            <?php if(!empty($image ) ):?>
                    <img src="<?php echo $image['0'];?>" alt="<?=$alt_text;?>">
                    <?php else: ?>
                    <img src="/wp-content/uploads/2022/09/silhouette.png" alt="" >
                        <?php endif; ?>
            </div>
            <div class="col-lg-8">
            <div class="user-person-info">
                <p>ABOUT</p>
                    <div class="user-caption">
                        <?= $caption;  ?>
                    </div>
                    <div class="user-email">
                        <a href="mailto:<?=$email;?>"> <?= $email;?></a>
                    </div>
                    <div class="user-phone">
                        <a href="tel:<?=$phone?>"><?= $phone;?></a>
                    </div>
                    <hr>
                    <div class="user-bio">
                        <p>BIO</p>
                        <?= $bio;?>
                    </div>

                </div>
            </div>
        </div>
        
    
    
    </div>

</div>