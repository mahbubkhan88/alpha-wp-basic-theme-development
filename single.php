<?php
    $alpha_layout_class = "col-md-8";
    $alpha_text_class = "";
    if(!is_active_sidebar("sidebar-1")){
        $alpha_layout_class = "col-md-10 offset-md-1";
        $alpha_text_class = "text-center";
    }
?>

<?php get_header(); ?>
<body <?php body_class(array("first_class", "second_class", "third_class")); ?>>
<?php get_template_part( "hero" ); ?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alpha_layout_class; ?>">
                <div class="posts">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <div class="post" <?php post_class(array("first_post_class", "second_post_class", "third_post_class")); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_text_class; ?> ">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="<?php echo $alpha_text_class; ?>">
                                            <em><?php the_author(); ?></em><br/>
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                                $thumbnail_url = get_the_post_thumbnail_url(null,"large");
                                                printf( '<a class="popup" href="%s" data-featherlight="image">',$thumbnail_url);
                                                the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
                                                echo '</a>';
                                            }

                                            the_content();

                                            wp_link_pages();

                                            next_post_link();
                                            echo "<br/>";
                                            previous_post_link();

                                            ?>
                                        </p>
                                    </div>

                                    <div class="author-section">
                                        <div class="row">
                                            <div class="col-md-2 author-image">
                                                <?php
                                                    echo get_avatar(get_the_author_meta("id"));
                                                ?>
                                            </div>      
                                            <div class="col-md-10">
                                                <h4>
                                                    <?php echo get_the_author_meta("display_name"); ?>
                                                    <p><?php echo get_the_author_meta('description'); ?></p>
                                                </h4>
                                            </div>      
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="row">
                                            <div class="row">
                                                <div class="row">
                                                    <?php if ( comments_open() ): ?>
                                                        <div class="col-md-10 offset-md-1">
                                                            <?php
                                                            comments_template();
                                                            ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
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
            </div>

            <?php
                if(is_active_sidebar("sidebar-1")) :
            ?>

            <div class="col-md-4">
                <?php
                if ( is_active_sidebar( "sidebar-1" ) ) {
                    dynamic_sidebar( "sidebar-1" );
                }
                ?>
            </div>

        <?php endif; ?>
        </div>

    </div>

<?php get_footer(); ?>