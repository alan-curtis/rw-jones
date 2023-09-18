<div class="cta-img-text-section">
    <div class="container-xl">
    
  <?php 

// Check rows existexists.
if( have_rows('image_cta_repeater') ): ?>


<?php
    // Loop through rows.
    while( have_rows('image_cta_repeater') ) : the_row();
        $link = get_sub_field('link');
        $text = get_sub_field('text');
        $img = get_sub_field('image');
        $alignment = get_sub_field('image_alignment');
if ( $alignment == 'Right') {
	$i = 1;
    $j = 2;
    ?>

<div class="row align-items-center">
<div class="col-12 col-lg-5 text order-2 order-lg-<?= $i; ?> px-4 px-md-2">
                <?= $text; ?>
                <a class="btn slide" href="<?= $link['url']; ?>" target= "<?= $link['target']?>"><?= $link['title'] ?></a>
            </div>
            <div class="col-12 offset-lg-1 col-lg-6 image order-1 order-lg-<?= $j; ?>">
                <img src="<?=  $img['url']; ?>" alt="<?= $img['alt']; ?>">
            
                </div>
</div>
<?php
}?>
<?php
if ( $alignment == 'Left') {
	$i = 2;
    $j = 1; ?>

<div class="row align-items-center">
<div class="col-12 col-lg-5 text order-2 order-lg-<?= $i; ?> px-4 px-md-2 offset-lg-1">
                <?= $text; ?>
                <a class="btn slide" href="<?= $link['url']; ?>" target= "<?= $link['target']?>"><?= $link['title'] ?></a>
            </div>
            <div class="col-12  col-lg-6 image order-1 order-lg-<?= $j; ?>">
                <img src="<?=  $img['url']; ?>" alt="<?= $img['alt']; ?>">
            
                </div>
</div>
<?php }?>

<?php
        // End loop.
    endwhile;
?>

<?php
// No value.
else :
    // Do something...
endif;?>

   </div>
 </div> 
