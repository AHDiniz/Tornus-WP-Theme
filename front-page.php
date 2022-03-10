<?php

include_once get_stylesheet_directory() . '/templates/blockcontent.php';

get_header();

$posts = query_posts(
    array(
        'numberposts' => 5,
        'post_type' => array('tour_point', 'tour_experience', 'event', 'group_activity'),
        'status' => 'publish',
        'orderby' => 'date'
    )
);

?>

<div class="jumbotron container-fluid es-light-blue-bg">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="carousel slide" data-bs-slide="carousel" id="front-page-carousel">
                <div class="carousel-inner">
<?php

$first = true;

for ($i = 0; $i < count($posts); $i++)
{
    $post = $posts[$i];

    if ($first)
    {
        $first = false
        ?>
        <div class="carousel-item main-page-carousel-item active">
        <?php
    }
    else
    {
        ?>
        <div class="carousel-item main-page-carousel-item">
        <?php
    }

    $img = get_the_post_thumbnail($post);
    $img = strip_tags($img, '<img>');
    $img = str_replace('class="', 'class="d-block w-100 carousel-item-img ', $img);

    $title = get_the_title($post);

    $url = get_permalink($post);

    $excerpt = get_the_excerpt($post);

    echo $img;

    ?>
    <div class="carousel-caption d-none d-md-block">
        <a href="<?php echo $url; ?>"><h5><?php echo $title; ?></h5></a>
        <p><?php echo $excerpt; ?></p>
    </div></div>
    <?php

}

?>
                </div>
                <button class="carousel-control-prev" data-bs-target="#front-page-carousel" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" data-bs-target="#front-page-carousel" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mt-5">
            <h1 class="es-pink text-center">Aproveite com</h1>
            <h1 class="text-center">TORNUS</h1>
            <h1 class="es-pink text-center">no Espírito Santo</h1>
            <p class="text-center">Aqui você fica sabendo de todos os eventos e atividades ocorrendo nas cidades de seu interesse do estado do Espirito Santo que estão ocorrendo <strong>HOJE</strong> ou em outro período do ano.</p>
            <p class="text-center"> Você não vai querer ficar de fora né?</p>
            <div class="d-flex justify-content-center">
                <button class="btn es-pink-bg can-click m-1 rounded-pill">
                    <a href="#" class="nav-link text-white">Saiba Mais</a>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid m-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <p>Já conhece o <strong>Mapa da Tornus</strong>? Aqui você encontra diversos pontos incriveis para conhecer na sua viagem, basta selecionar no mapa o que procura ou então pesquisar na barra de busca. Aproveite!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="google-map"></div>
        </div>
    </div>
</div>

<?php

get_footer();
?>