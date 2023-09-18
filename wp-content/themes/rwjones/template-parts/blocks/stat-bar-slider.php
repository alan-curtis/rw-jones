<div class="our_success_block">
    <div class="container main-container">
        <h1>
            <?php
            $title_field = get_field('title');
            if ($title_field) {
                echo $title_field;
            }
            ?>

        </h1>

        <div class="row">

            <div class="col-md-7 our_success_items">
                <div class="success_list">
                    <?php

                    // Check rows existexists.
                    if (have_rows('cta_card_img_repeater')): ?>


                        <?php
                        // Loop through rows.
                        while (have_rows('cta_card_img_repeater')):
                            the_row();
                            $link = get_sub_field('link');
                            $title = get_sub_field('title');
                            $img = get_sub_field('image');
                            $copy = get_sub_field('copy');

                            ?>
                            <div class="list-items">
                                <div class="img-sec">
                                    <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
                                </div>
                                <div class="data">
                                <h2 class="numeric-sec" data-end-value="<?= $title; ?>">
                                <span>0</span>
                                    </h2>
                                    <div class="desc">
                                        <?= $copy; ?>
                                    </div>
                                </div>


                            </div>
                            <?php
                            // End loop.
                        endwhile;
                        ?>
                          <?php
                        // No value.
                    else:
                        // Do something..
                    endif; ?>
                    </div>
                </div>


              

            <div class="col-md-4 offset-md-1 success_testimonials_block">
                <div class="success_testimonials">
                    <?php

                    // Check rows existexists.
                    if (have_rows('testimonial_slider')): ?>


                        <?php
                        // Loop through rows.
                        while (have_rows('testimonial_slider')):
                            the_row();
                            $slider_outer_img = get_sub_field('slider_outer_img');
                            $slider_text = get_sub_field('slider_text');
                            $slider_inner_img = get_sub_field('slider_inner_img');
                            $silder_img_top_text = get_sub_field('silder_img_top_text');
                            $slider_img_bottom_text = get_sub_field('slider_img_bottom_text');


                            ?>
                            <div class="testimonial_slide">
                                <div class="img-sec">
                                <img src="<?= $slider_outer_img['url']; ?>" alt="<?= $slider_outer_img['alt']; ?>">
                                </div>
                                <div class="carousel-desc"><?= $slider_text; ?></div>
                                <div class="wrapper">
                                    <div class="carousel-img">
                                    <img src="<?= $slider_inner_img['url']; ?>" alt="<?= $slider_inner_img['alt']; ?>">
                                    </div>
                                    <div class="testimonial-text">
                                        <strong><?= $silder_img_top_text; ?></strong>
                                        <p><?= $slider_img_bottom_text; ?></p>
                                    </div>

                                </div>
                            </div>

                            <?php
                        endwhile;
                        ?>
                        <?php
                    else:
                    endif; ?>
                </div>
                <div class="slider-controls">
                    <div class="play-pause-button">
                    <i class="fa-solid fa-circle-play"></i>
                        <span class="button-text">Play</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>











