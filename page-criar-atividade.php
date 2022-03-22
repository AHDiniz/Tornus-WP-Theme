<?php

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

$args = array();

if ($search_query['activity-name'] != null)
{
    $args['post_title'] = $search_query['activity-name'];

    if ($search_query['activity-address'] != null && $search_query['activity-description'] && $search_query['activity-images'])
    {
        $content = '<div class="container mt-3 mb-3">';
        $content .= '<div class="row"><div class="col"><h1 class="text-center es-pink">' . $args['post-title'] . '</h1></div></div>';
        $content .= '</div>';

        $content .= '<div class="container mt-3 mb-5"><div class="row"><div class="col">';
        $content .= '<div class="row"><div class="col"><p>' . $search_query['activity-address'] . '</p></div></div>';
        $content .= '<div class="row"><div class="col"><p>' . $search_query['activity-description'] . '</p></div></div>';
        $content .= '</div></div></div>';

        $args['post_content'] = $content;
    }

    switch ($search_query['activity-type'])
    {
        case 'point':
            $args['post_type'] = 'tour_point';
            break;
        case 'group':
            $args['post_type'] = 'group_activity';
            break;
        case 'experience':
            $args['post_type'] = 'tour_experience';
            break;
        case 'event':
            $args['post_type'] = 'event';
            break;
        default:
            break;
    }

    $args['post_status'] = 'publish';

    wp_insert_post($args);
}

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h1 class="es-pink text-center">Criar Atividade</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo home_url('criar-atividade')?>" method="get">
                        <label for="activity-name">Nome da Atividade</label>
                        <input type="text" class="form-control" placeholder="Nome da Atividade" name="activity-name">
                        <label for="activity-address">Endereço da Atividade</label>
                        <input type="text" class="form-control" placeholder="Endereço da Atividade" name="activity-address">
                        <label for="activity-description">Descrição da Atividade</label>
                        <input type="text" class="form-control" placeholder="Descrição da Atividade" name="activity-description">
                        <label for="activity-images">Images da Atividade</label>
                        <input type="image" name="activity-images" class="form-control" accept=".jpg,.jpeg,.png" multiple>
                        <div class="row">
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Ponto Turístico</label>
                                <input type="radio" name="activity-type" value="point" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Experiência Turística</label>
                                <input type="radio" name="activity-type" value="experience" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Atividade em Grupo</label>
                                <input type="radio" name="activity-type" value="group" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Evento</label>
                                <input type="radio" name="activity-type" value="event" class="form-check-input">
                            </div>
                        </div>
                        <button type="submit" class="btn es-pink-bg text-white can-click rounded-pill">Criar Atividade</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

?>