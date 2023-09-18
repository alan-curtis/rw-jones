<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RWJones
 */

get_header();
?>
<?php
$post_id = get_the_ID();
$featured_image_url = get_the_post_thumbnail_url($post_id);
$terms = get_the_terms($post->ID, 'category');
$author_id = $post->post_author;
foreach ((get_the_category()) as $category) {
    $postcat = $category->cat_ID;
    $catname = $category->cat_name;
}
?>
    <div class="section-top">
        <div class="blog-post-banner-clipper clipper-svg">
            <div class="blog-post-banner d-lg-flex">
                <div class="blog-post-banner__banner flex-1">
                    <img src="<?php echo $featured_image_url; ?>">
                </div>
                <div class="blog-post-banner__content flex-1">
                    <div class="description-part">
                        <div class="sub-title"><a href="#"><?= $catname; ?> </a></div>
                        <div class="heading"><h2>  <?php echo get_the_title(); ?></h2></div>
                        <div class="para"> <?= get_the_author_meta('display_name', $author_id); ?> / <?= get_the_date(); ?></div>
                    </div>
                    <div class="blog-post-banner__content--title">

                    </div>
                </div>
            </div>
            <svg width="1440" height="90" viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V90H1440V0C1440 49.7056 1117.65 90 720 89.9999C322.355 89.9999 0.000531296 49.7056 7.86869e-06 0H0Z" fill="#D9D9D9"/>
            </svg>
        </div>
    </div>

    <div class="section-content container">
        <div class="post-content">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </div>
        </div>
        <div class="related-news-section">
            <div class="container">
                <div class="d-flex align-items-center title">
                    <div class="me-auto ">
                        <h2>Related Articles</h2>
                    </div>
                    <div class="p2 read-all">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'topic');
                        if (!empty($categories)) { ?>
                           <a href="/insights/?_sft_topic=<?= $categories[0]->slug; ?>">Read All</a>
                       <?php }
                        ?>
                    </div>
                </div>
                <div class="row ">
                <?php
                $args = array(
                'category__in' => wp_get_post_categories($post->ID),
                'posts_per_page' => 4,
                'post__not_in' => array($post->ID)
                
            );
                $posts = get_posts($args);
                foreach ($posts as $post) : ?>
                     
                    <!-- Start of featured posts loop -->
                    <div class="col-lg-4">
                         <div class="row row-space">
                            <div class="order-2 order-md-1 col-md-12 col-4">
                                <div class="img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="order-1 order-md-2 col-md-12 col-8">
                                <div class="category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) { 
                                            echo $categories[0]->name; 
                                   }
                                    ?>
                                </div>
                                <div class="title">
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <!-- End of featured posts loop -->
              
               <?php endforeach; ?>
               </div>
            </div>
        </div>


<?php
get_sidebar();
get_footer();