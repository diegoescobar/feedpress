<!-- START ARTICLE -->
<div class="card article">
    <div class="card-content">
        <div class="media">
            <div class="media-content has-text-centered">
                <?php the_post_thumbnail(); ?>
                <p class="title article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                <div class="tags has-addons level-item">
                    <span class="tag is-rounded is-info"><?php the_author_link(); ?></span>
                    <span class="tag is-rounded"><?php the_date(); ?></span>
                </div>
            </div>
        </div>
        <div class="content article-body">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>
<!-- END ARTICLE -->