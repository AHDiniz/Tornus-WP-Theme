<?php

get_header();

global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach ($query_args as $key => $string)
{
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
}

$posts = query_posts($search_query);

?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
    <?php
    
    for ($i = 0; $i < count($posts); $i++)
    {
        $post = $posts[$i];

        $img = get_the_post_thumbnail_url($post);
        $title = get_the_title($post);
        $excerpt = get_the_excerpt($post);
        $link = get_permalink($post);

        ?>
        <div class="col-sm-12 col-md-6 card search-page-card mt-2">
            <img src="<?php echo $img; ?>" class="card-img-top search-card-img">
            <div class="card-body">
                <a href="<?php echo $link; ?>"><h5><?php echo $title; ?></h5></a>
                <p><?php echo $excerpt; ?></p>
            </div>
        </div>
        <?php

    }
    
    ?>
    </div>
</div>

<?php

get_footer();

?>