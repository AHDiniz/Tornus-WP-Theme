<?php

function TornusGalleryContent($galleryBlock)
{
    $carousel_id = "carousel-" . random_int(0, 999999);

    echo "<div class=\"jumbotron\">";
    echo "<div class=\"carousel slide\" data-bs-ride=\"carousel\" id=\"{$carousel_id}\">";
    echo "<div class=\"carousel-inner\">";

    $count = 0;

    foreach ($galleryBlock['innerBlocks'] as $innerBlock)
    {
        if ($count == 0)
        {
            echo "<div class=\"carousel-item main-page-carousel-item active\" >";
            $count++;
        }
        else
        {
            echo "<div class=\"carousel-item main-page-carousel-item\" >";
        }

        $img = strip_tags($innerBlock['innerHTML'], '<img>');
        $img = str_replace('class="', 'class="d-block w-100 carousel-item-image ', $img);
        echo $img;
        
        echo "</div>";
    }

    echo "</div>";
    echo "<button class=\"carousel-control-prev\" data-bs-target=\"#{$carousel_id}\" type=\"button\" data-bs-slide=\"prev\">
        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Previous</span>
    </button>
    <button class=\"carousel-control-next\" data-bs-target=\"#{$carousel_id}\" type=\"button\" data-bs-slide=\"next\">
        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Next</span>
    </button>";
    echo "</div>";
    echo "</div>";
}

function TornusMainPageGallery()
{
    $recent_posts = wp_get_recent_posts(
        array(
            'numberposts' => 5,
            'post_type' => 'event',
            'post_status' => 'publish'
        )
    );

    $carousel_id = "carousel-" . random_int(0, 999999);

    ?>
    
    <div class="jumbotron container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="carousel slide" data-bs-slide="carousel" id="<?php echo $carousel_id; ?>">
                    <div class="carousel-inner">
    <?php
    
    $count = 0;

    foreach ($recent_posts as $post)
    {
        $img = get_the_post_thumbnail($post);
        $img = str_replace('class="', 'class="d-block w-100 carousel-item-image ', $img);

        if ($count == 0)
        {
        ?>
        <div class="carousel-item main-page-carousel-item active">
        <?php
            ++$count;
        }
        else
        {
        ?>
        <div class="carousel-item main-page-carousel-item">
        <?php
        }
        ?>
            <?php echo $img; ?>
            <div class="carousel-caption d-none d-md-block">
                <a href="<?php echo get_permalink($post); ?>">
                    <h5><?php echo get_the_title($post); ?></h5>
                </a>
                <p><?php echo get_the_excerpt($post); ?></p>
            </div>
        </div>
        <?php
    }
    
    ?>
                    </div>
                    <button class="carousel-control-prev" data-bs-target="#<?php echo $carousel_id; ?>" type="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#<?php echo $carousel_id; ?>" type="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 es-light-blue-bg">
                <h2 class="es-pink text-center">Aproveite com</h2>
                <h1 class="text-center">TORNUS</h1>
                <h2 class="es-pink text-center">No Espírito Santo</h2>
                <p class="text-center">Aqui você fica sabendo de todos os eventos e atividades ocorrendo nas cidades de seu interesse no Espírito Santo que estão ocorrendo <strong>HOJE</strong> ou em outro período do ano. Você não vai querer ficar de fora né?</p>
                <button class="btn es-pink-bg can-click m-1 rounded-pill text-center d-flex justify-content-center">
                    <a href="#" class="nav-link text-white">SAIBA MAIS</a>
                </button>
            </div>
        </div>
    </div>
    
    <?php
}

?>