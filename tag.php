<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("hero"); ?>
<div class="posts text-center">

    <h1> Related Tags: 
        <?php single_tag_title(); ?>
    </h1>

    <?php
    while ( have_posts() ) {
        the_post();

        ?>
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
        <?php

        }
    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                the_posts_pagination( array(
                    "screen_reader_text" => ' ',
                    "prev_text"          => "New Posts",
                    "next_text"          => "Old Posts"
                ) );
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>