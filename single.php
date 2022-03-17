<?php

include_once get_stylesheet_directory() . '/templates/blockcontent.php';

get_header();

if (have_posts())
{
    while (have_posts())
    {
        the_post();

        $blocks = parse_blocks(get_the_content());

        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <?php

        foreach ($blocks as $block)
        {
            switch ($block['blockName'])
            {
                case 'core/paragraph':
                    TornusParagraph($block);
                    break;
                
                case 'core/gallery':
                    TornusGallery($block);
                    break;
                
                case 'tornus/map-block':
                    TornusMapBlock($block);
                    break;
                
                case 'tornus/duration':
                    TornusDuration($block);
                    break;
                
                default:
                    echo $block['innerHTML'];
                    break;
            }
        }
    }
}

get_footer();

?>