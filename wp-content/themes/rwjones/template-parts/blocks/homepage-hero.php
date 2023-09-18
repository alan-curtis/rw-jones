<?php $image = get_field('bg_img'); ?>

<div class="">
<div class="homepage-hero-section">
    <div class="homepage-hero homepage-hero-section-clipper clipper-svg" style="background: url('<?= $image; ?>'), #287352;">
        <div class="layer"></div>
        <svg width="1440" height="90" viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V90H1440V0C1440 49.7056 1117.65 90 720 89.9999C322.355 89.9999 0.000531296 49.7056 7.86869e-06 0H0Z" fill="#D9D9D9"/>
    </svg>
    </div>
    <div class="homepage-hero__content">
        <div class="container">
            <?php
            $minibar = get_field('minibar');
            if (!empty($minibar['text'])) {
                ?>
                <div class="homepage-hero__minibar">
                    <div class="homepage-hero__minibar-inner">
                        <i>
                            <?= $minibar['icon']; ?>
                        </i>
                        <div class="text">
                            <?= $minibar['text']; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <div class="row align-items-center">
                <div class="col-12 col-lg-5 px-4 px-md-2">
                    <h2><?= get_field('title'); ?></h2>
                    <div class="text">
                        <?= get_field('text'); ?>
                    </div>
                </div>
                <div class="col-3"></div>
                <div class="col-12 col-lg-4 px-4 px-md-2">
                    <div class="homepage-hero__form">
                        <?= get_field('form_shortcode'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
