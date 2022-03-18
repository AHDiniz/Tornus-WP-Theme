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

$post = null;

if ($search_query['post_id'] != null)
{
    $post = get_post((int)$search_query['post_id']);
}

if ($search_query['route_name'] != null)
{
    $posts = query_posts(array(
        'name' => $search_query['route_name'],
        'post_type' => 'tour_route'
    ));

    if (count($posts != 0))
    {
        $post = $posts[0];
    }
    else
    {
        $post_id = wp_insert_post(array(
            'post_title' => $search_query['route_name'],
            'post_type' => 'tour_route'
        ));
        $post = get_post($post_id);
    }
}

$routes = query_posts(array(
    'post_type' => 'tour_route',
    'numberposts' => 42
));

if ($post == null)
{
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="es-pink text-center">Editar Roteiro de Viagens</h1>
        </div>
    </div>
    <div class="row">
        <?php
        
        foreach ($routes as $route)
        {
            $title = get_the_title($route);
            $id = get_the_ID($route);

            ?>
            
            <div class="col-sm-12 col-md-6">
                <a href="<?php echo home_url('/editar-roteiro');?>?post_id=<?php echo $id; ?>"><?php echo $title; ?></a>
            </div>
            
            <?php
        }
        
        ?>
    </div>
</div>

<?php
}
else
{
    $name = $search_query['route-name'];
    $begin = $search_query['route-begin'];
    $end = $search_query['end'];
    $begin_date = $search_query['route-begin-date'];
    $end_date = $search_query['route-end-date'];
    $add_events = $search_query['check-event'];
    $add_points = $search_query['check-point'];
    $add_groups = $search_query['check-group'];
    $add_experience = $search_query['check-experience'];

    $routes = query_posts(array(
        'post_type' => 'tour_route',
        'name' => $name
    ));

    $args = array();
    $args['post_type'] = array();
    $args['numberposts'] = 42;

    if ($add_events == 'true')
        array_push($args['post_type'], 'event');
    
    if ($add_points == 'true')
        array_push($args['post_type'], 'tour_point');
    
    if ($add_groups == 'true')
        array_push($args['post_type'], 'group_activity');
    
    if ($add_experience == 'true')
        array_push($args['post_type'], 'tour_experience');

    $activities = query_posts($args);
?>

<div class="container mt-5">
    <div class="row">
        <?php
        
        foreach ($activities as $activity)
        {
            ?>
            
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">
                            <?php the_title($activity); ?>
                        </h3>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php home_url('/editar-roteiro');?>?route_id=<?php echo get_the_ID($post); ?>&activity_id=<?php echo get_the_ID($activity); ?>" class="btn es-pink text-white can-click rounded-pill">Adicionar no Roteiro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
        }
        
        ?>
    </div>
</div>

<?php
}


get_footer();

?>