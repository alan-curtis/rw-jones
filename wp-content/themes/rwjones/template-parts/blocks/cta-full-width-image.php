<?php $banner = get_field('banner_cta'); 
?>
<div class="banner-cta-section" style="background: url('<?= $banner['image']; ?>'), #287352;">
<div class="layer"></div>
    <div class="container">
        <div class="row content-height align-items-center justify-content-md-center text-center">
            <div class="col-lg-7 px-md-0">
            <div class="content-wrap">
            <h2>
                <?= $banner['title']; ?>
            </h2>
            <div class="copy">
                <?= $banner['copy']; ?>
            </div>
            <?php if( !empty( $banner['button'] ) ): ?>
               
                    
                    <a href="<?= $banner['button']['url']; ?>" target="<?= $banner['button']['target'];?>"class="slide btn">
                    <?= $banner['button']['title']; ?>  
                </a>
              
                <?php endif;?>
            </div>
            </div>
        </div>
    </div>
</div>