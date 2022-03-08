<?php

include_once get_stylesheet_directory() . '/templates/blockcontent.php';

get_header();

if (have_posts())
{
    while(have_posts())
    {
        the_post();

        global $post;

        $blocks = parse_blocks($post->post_content);

        foreach ($blocks as $block)
        {
            switch ($block['blockName'])
            {
                case 'core/gallery':
                    TornusGalleryContent($block);
                    break;
                    
                default:
                    // echo render_block($block);
                    break;
            }
        }
    }
}

TornusMainPageGallery();

get_footer();
?>