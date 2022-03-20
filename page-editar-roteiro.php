<?php

require_once get_stylesheet_directory() . '/include/post_relations.php';

get_header();

$current_url = $_SERVER['REQUEST_URI'];
$query_args = explode("&", $current_url);
$query_args[0] = explode("?", $query_args[0])[1];
$search_query = array();

foreach ($query_args as $key => $string)
{
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
}

$post = null;

if ($search_query['operation'] != null)
{
    if ($search_query['operation'] == 'add')
    {
        $route_id = intval($search_query['route-id']);
        $activity_id = intval($search_query['activity-id']);
        TornusAddActivityToRoute($route_id, $activity_id);
    }
    else if ($search_query['operation'] == 'remove')
    {
        $route_id = intval($search_query['route-id']);
        $activity_id = intval($search_query['activity-id']);
        TornusDeleteActivityToRoute($route_id, $activity_id);
    }
}

if ($search_query['post-id'] != null)
{
    $post = get_post((int)$search_query['post-id']);
}
else if ($search_query['route-id'] != null)
{
    $post = get_post((int)$search_query['route-id']);
}
else if ($search_query['route-name'] != null)
{
    $posts = query_posts(array(
        'name' => $search_query['route-name'],
        'post_type' => 'tour_route'
    ));

    if (count($posts) != 0)
    {
        $post = $posts[0];
    }
    else
    {
        $post_id = wp_insert_post(array(
            'post_title' => $search_query['route-name'],
            'post_type' => 'tour_route',
            'status' => 'publish'
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
            $id = $route->ID;

            ?>
            
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <a href="<?php echo home_url('/editar-roteiro/');?>?post-id=<?php echo $id; ?>" class="btn es-pink-bg text-white can-click rounded-pill"><?php echo $title; ?></a>
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
    
    if ($add_events == 'check')
        array_push($args['post_type'], 'event');
        
    if ($add_points == 'check')
        array_push($args['post_type'], 'tour_point');
        
    if ($add_groups == 'check')
        array_push($args['post_type'], 'group_activity');
        
    if ($add_experience == 'check')
        array_push($args['post_type'], 'tour_experience');
        
    $activities = query_posts($args);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="es-pink text-center">Editar <?php echo get_the_title($post); ?></h1>
        </div>
    </div>
    <div class="row mt-2">
        <?php
        
        $route_id = $post->ID;
        $route_activities = TornusGetActivitiesInRoute($route_id);

        ?>
        <h2 class="es-blue text-center mt-4 mb-4">Remover Atividades</h2>
        <?php

        foreach ($route_activities as $activity)
        {
            ?>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">
                            <?php echo get_the_title($activity); ?>
                        </h3>
                        <p><?php echo get_the_excerpt($activity); ?></p>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php home_url('/editar-roteiro/');?>?operation=delete&route-id=<?php echo $post->ID; ?>&activity-id=<?php echo $activity->ID; ?>" class="btn es-blue-bg text-white can-click rounded-pill">Remover do Roteiro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        
        ?>
    </div>
    <div class="row mt-2 mb-5">
        <?php

        ?>
        <h2 class="es-blue text-center mt-4 mb-4">Adicionar Atividades</h2>
        <?php
        
        foreach ($activities as $activity)
        {
            if (in_array($activity, $route_activities))
                continue;

            ?>
            
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">
                            <?php echo get_the_title($activity); ?>
                        </h3>
                        <p><?php echo get_the_excerpt($activity); ?></p>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php home_url('/editar-roteiro/');?>?operation=add&route-id=<?php echo $post->ID; ?>&activity-id=<?php echo $activity->ID; ?>" class="btn es-pink-bg text-white can-click rounded-pill">Adicionar no Roteiro</a>
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