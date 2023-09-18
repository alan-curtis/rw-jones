<?php
$cta_group = get_field('cta_card_group');
$repeaters = $cta_group['cta_card_img_repeater'];
$is_home = is_front_page();
$repeater_img = $cta_group['image_select'];
?>


    <?php
    if ($repeaters) :
    ?>
    <?php if ($is_home): ?>
        <div class="card-section">
            <div class="home">
                <div class="container">
                    <div class="col-12 title">
                        <h2> <?= $cta_group['title']; ?></h2>
                    </div>
                    <div class="row ">
                        <?php
                        foreach ($repeaters as $repeater) {
                            ?>

                            <div class="col-lg-3 col-12 px-md-2 align-items-stretch d-flex">
                                <div class="card-wrap">
                                    <?php if ($repeater_img == 'Image'): ?>
                                        <div class="card-wrap__bg-img" style="background: url('<?= $repeater['image']['url']; ?>');"></div>
                                    <?php endif; ?>
                                    <div class="row card-wrap__inner">
                                        <div class="col-12 align-self-start">
                                            <div class="cta-title">
                                                <?= $repeater['title']; ?>
                                            </div>

                                            <div class="copy">
                                                <?= $repeater['copy']; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 align-self-end icon">
                                            <?php if (isset($repeater['link']['url']) && acf_not_empty($repeater['link']['url'])) { ?>
                                                <a href="<?= $repeater['link']['url']; ?>" class="">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <div class="layer-1"></div>
                <div class="layer-2"></div>
            </div>
        </div>

    <?php elseif ($repeater_img == 'No Image'): ?>
        <div class="card-section">
    <div class="container">
        <div class="col-12 title">
            <h2> <?= $cta_group['title']; ?></h2>
        </div>
        <div class="row">
            <?php foreach ($repeaters as $repeater) {
                ?>

                <div class="col-lg-3 col-12 px-md-2 align-items-stretch d-flex no-img">
                    <div class="card-wrap">
                        <div class="row card-wrap__inner">
                            <div class="col-12 align-self-start">
                                <div class="cta-title">
                                    <?= $repeater['title']; ?>
                                </div>

                                <div class="copy">
                                    <?= $repeater['copy']; ?>
                                </div>
                            </div>
                            <div class="col-12 align-self-end icon">
                                <a href="<?= $repeater['link']['url']; ?>" class="">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
    </div>
<?php elseif ($repeater_img == 'Image'): ?>
    <div class="card-section">
        <div class="container">
            <div class="col-12 title">

                <h2> <?= $cta_group['title']; ?></h2>
            </div>
            <div class="row">
                <?php foreach ($repeaters as $repeater) {
                    ?>
                            <div class="col-lg-3 col-12 px-md-2 align-items-stretch d-flex">
                                <div class="card-wrap">
                                    <?php if ($repeater_img == 'Image'): ?>
                                        <div class="card-wrap__bg-img" style="background: url('<?= $repeater['image']['url']; ?>');"></div>
                                    <?php endif; ?>
                                    <div class="row card-wrap__inner">
                                        <div class="col-12 align-self-start">
                                            <div class="cta-title">
                                                <?= $repeater['title']; ?>
                                            </div>

                                            <div class="copy">
                                                <?= $repeater['copy']; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 align-self-end icon">
                                            <?php if (isset($repeater['link']['url']) && acf_not_empty($repeater['link']['url'])) { ?>
                                                <a href="<?= $repeater['link']['url']; ?>" class="">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<?php ?>
