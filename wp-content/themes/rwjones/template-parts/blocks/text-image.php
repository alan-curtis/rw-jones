<div class="text-image-section">
  <?php 
  $title = get_field('title');
  $image = $image = get_field('image'); 
  $url = $image['url'];
  $alt = $image['alt'];
  ?>
    <div class="container">
        <div class="img-text-wrap">

       
  <?php  if( !empty($title) ): ?>

        <div class="title">
        <h2><?= $title;?></h2>
        </div>
        <?php endif; ?>

        <?php    if( !empty( $image )): ?>
            <div class="img">
            <img src="<?= $url; ?>" alt="<?= $alt ; ?>" />
            </div>
           
            <?php endif; ?>
        </div>
        </div>
</div>