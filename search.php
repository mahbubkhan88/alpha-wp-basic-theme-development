<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("hero"); ?>
<div class="posts">
    <?php
    if( ! have_posts() ){
        ?>
            <h2 class="text-center">
                <?php _e("No Result Found"); ?>
            </h2>
        <?php
    }

    while ( have_posts() ) {
        the_post();
        get_template_part("post-formats/content", get_post_format());
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