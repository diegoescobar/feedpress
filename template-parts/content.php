<!-- START ARTICLE -->
<div class="card article">
    <div class="card-content">
        <div class="media">
            <div class="media-content has-text-centered">
                <p class="title article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                <div class="tags has-addons level-item">
                    <span class="tag is-rounded is-info"><?php the_author_link(); ?></span>
                    <span class="tag is-rounded"><?php the_date(); ?></span>
                </div>
            </div>
        </div>
        <div class="content <?php if (has_post_format('gallery')){ echo "article-gallery"; } else { echo "article-body"; } ?>">
            <?php if (!is_single()) { the_excerpt(); } else { the_content(); } ?>
        </div>
    </div>
</div>
<!-- END ARTICLE -->