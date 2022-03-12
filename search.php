<?php

get_header();

$posts = null;

if ($_POST)
{
    $post_name = $_POST['name'];
    $post_tag = $_POST['tag'];
    $post_type = $_POST['type'];

    $posts = query_posts(array(
        'post_type' => "{$post_type}",
        'post_title' => "{$post_title}",
        'post_tag' => "{$post_tag}" 
    ));
}
else
{
    $posts = query_posts(array(
        'post_type' => array('tour_point', 'tour_experience', 'event', 'group_activity')
    ));
}

?>

<div class="container mt-5">
    <div class="row">
        <form method="post" action="search.php">
            <div class="input-group">
                <div class="col-sm-6">
                    <input type="text" name="name" id="front-place-name" class="form-control" placeholder="Local">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="tag" id="front-place-tag" class="form-control" placeholder="Tags">
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn can-click es-pink-bg text-white">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

get_footer();

?>