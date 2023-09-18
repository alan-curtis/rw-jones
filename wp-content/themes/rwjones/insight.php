<?php
/*
Template Name: Insight Template */
get_header();
?>
<?php
$title_field = get_field('title');
$description_field = get_field('description');
$menu_field = get_field('menu');
if (!empty($description_field)) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ($title_field) : ?>
                    <div class="sidebar-title">
                        <h2>
                            <?php print $title_field; ?>
                        </h2>
                    </div>
                <?php endif; ?>
                <?php if ($description_field) : ?>
                    <div class="description">
                        <p>
                            <?php print $description_field; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($menu_field): ?>
                <div class="col-md-3 col-sm-12 menu">
                    <div class="accordion-section">
                        <div class="sidebar-menu">
                            <div class="title"> What we do</div>
                            <?php print  $menu_field ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
    <div class="container">
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        the_content(); // Display the post content
    endwhile;
    the_posts_navigation();
else :
    get_template_part('template-parts/content', 'none');
endif;
?>

<?php
get_footer();
?>