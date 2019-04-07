<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <meta name="viewport" content="device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <h1><a href="<?php home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
            <small><?php bloginfo('description'); ?></small>
            <div class="h_right">
                <form method="get" action="<?php esc_url(home_url('/')); ?>">
                    <input type="text" name="s" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <nav class="nav main-nav">
        <div class="container">
            <?php
                $args = array(
                    'theme_location' => 'primary'
                )
            ?>

            <?php wp_nav_menu($args)?>
        </div>
    </nav>

    <div class="container content">
        <div class="main block">

        <?php if(have_posts()) :?>
            <?php while(have_posts()) : the_post(); ?>
            <article class="post">
                <h2><?php the_title(); ?></h2>
                <p class="meta">Posted at
                <?php the_time('F j, Y g:i a'); ?>
                by 
                <a href="<?php ?>"></a>
                    <?php the_author(); ?>
                </p>
                Posted In
                <?php
                    $categories = get_the_category();
                    $seperator = ", ";
                    $output = '';
                    if($categories) {
                        foreach($categories as $category) {
                            $output .= '<a href="'.
                                get_category_link($category->term_id)
                            .'">' .$category->cat_name. '</a>' . $seperator;
                        }
                    }

                    echo trim($output, $seperator);
                ?>
                <p><?php the_content(); ?></p>
                <a class="button" href="#">Read More</a>
            </article>
            <?php endwhile;?>
        <?php else :?>
              <?php echo apautop('Sorry, no posts were found'); ?>
        <?php endif; ?>
        </div>

        <div class="side">
            <div class="block">
                <h3>Sidebar head</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, vel perspiciatis esse ex assumenda ipsum optio velit, alias doloribus porro ab voluptatibus molestiae! Inventore, sapiente? Suscipit harum quia atque libero.</p>
                <a class="button" href="">More</a>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <div class="f_left">
                <p>&copy; 2016 - Advanced WP Theme</p>
            </div>
            <div class="f_right">
                <?php
                    $args = array(
                        'theme_location' => 'footer'
                    )
                ?>

                <?php wp_nav_menu($args)?>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>