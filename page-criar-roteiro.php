<?php

get_header();

$posts = query_posts(array(
    'post_type' => array('tour_route')
));

global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach ($query_args as $key => $string)
{
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
}

if ($search_query['new_post'] && $search_query['new_post'] == 'create')
{
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h1 class="es-blue text-center">Criar Roteiro de Viagem</h1>
            <p class="text-center">Aqui você pode criar um roteiro de viagens pesquisando por atividades que lhe interessam e adicionando-as no roteiro.</p>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <form action="" method="get">
                <input type="text" name="route-name" id="route-name" placeholder="Nome da Rota">
            </form>
        </div>
    </div>
</div>

<?php
}
else
{
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h1 class="es-blue text-center">Seus Roteiros de Viagem</h1>
            <p class="text-center">Aqui você pode criar ou editar um roteiro de viagens pesquisando por atividades que lhe interessam e adicionando-as no roteiro.</p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <?php
        foreach ($posts as $post)
        {
            $title = get_the_title($post);
            $id = get_the_ID($post);

            ?>
            <div class="col-sm-12 col-md-6">
                <a href="<?php echo home_url('/criar-roteiro'); ?>?post_id=<?php echo $id; ?>"><?php echo $title; ?></a>
            </div>
            <?php
        }
        ?>
        <div class="col-sm-12 col-md-6">
            <form action="<?php echo home_url('/criar-roteiro'); ?>" method="get" class="justify-content-center">
                <input type="radio" value="create" name="new_post" checked hidden>
                <button type="submit" class="btn es-pink-bg text-white can-click rounded-pill">Criar Novo Roteiro</button>
            </form>
        </div>
    </div>
</div>

<?php
}

get_footer();

?>