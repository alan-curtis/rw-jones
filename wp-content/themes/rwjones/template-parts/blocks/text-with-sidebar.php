<?php
$title_field = get_field('title');
$description_field = get_field('description');
$sidebar_menu = get_field('menu_select');
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
            <?php if ($sidebar_menu): ?>
                <div class="col-md-3 col-sm-12 menu">
                    <div class="accordion-section">
                        <div class ="sidebar-menu">
                            <?php
                            $menu_object = wp_get_nav_menu_object($sidebar_menu);
                            if ($menu_object) {
                            $menu_name = $menu_object->name;
                            $menu_slug = $menu_object->slug;
                            $string_arr = explode(' ', $menu_name);
                            if(is_array($string_arr) && count($string_arr) == 2){
                            $menu_name = '<div class="title">'.$string_arr[0].'<span>'.$string_arr[1].'</span></div>';
                            } else {
                            $menu_name = '<div class="title">'.$menu_name.'</div>';
                            }
                            ?>
                            <div class="widget-content acf-nav-menu">
                                <h2 class="widget-title">
                                    <?= $menu_name; ?>
                                </h2>
                                <?php
                                wp_nav_menu(
                                
                                    array(
                                    'menu' => $menu_slug,
                                    'menu_class' => '',
                                    )
                
                                
                                );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
