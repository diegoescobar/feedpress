<!-- START ARTICLE -->
<div class="card article">
    <div class="card-content">
        <div class="media">
            <div class="media-content has-text-centered">
                <p class="title article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            </div>
        </div>
        <div class="content article-body">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<!-- END ARTICLE -->