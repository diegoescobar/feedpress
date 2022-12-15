<?php get_header(); ?>

    <section class="hero is-info is-medium is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title"><?php bloginfo('description');?></h1>
            </div>
        </div>
    </section>


    <div class="container">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                
            <?php
                if ( have_posts() ) :

                    if ( !is_home() && !is_front_page() ) :
                        ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                    endif;

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                    if (is_single()){
                        the_posts_navigation();
                    }
                    the_numeric_posts_nav();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
              
            </div>
        </section>
        <!-- END ARTICLE FEED -->
    
<?php get_footer(); ?>