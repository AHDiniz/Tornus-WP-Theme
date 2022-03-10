<?php

function TornusMainPageGallery($galleryBlock)
{

    $carousel_id = "carousel-" . random_int(0, 999999);

    echo "<div class=\"jumbotron\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-12 es-light-blue-bg\">";
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
    echo "</div>";
    echo "</div>";
}

function TornusParagraph($paragraphBlock)
{
    ?>
    <div class="container mt-3 mb-2">
        <div class="row">
            <div class="col-12">
            <?php

            echo $paragraphBlock['innerHTML'];

            ?>
            </div>
        </div>
    </div>
    <?php
}

?>