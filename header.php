<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $mapbox_key = get_option('mapbox_key');
    ?>
    
    <?php
    wp_head();
    ?>
    <script type="text/javascript">
        mapboxgl.accessToken = "<?php echo $mapbox_key; ?>";
    </script>
    
</head>
<body>

<?php

global $wp;

$current_url = home_url($wp->request);

$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['header_menu']);
$menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));

?>

    <div class="container-fluid header">
        <header class="navbar d-flex flex-wrap align-items-center justify-content-between">
            <div class="ml-auto justify-content-center">
                <a href="<?php echo home_url('/'); ?>" class="active">
                    <span>
                        <img src="<?php site_icon_url(); ?>" alt="Logo Tornus" class="img-fluid navbar-logo">
                    </span>
                </a>
            </div>
            <div class="ml-auto">
                <ul class="nav nav-pills">
                    <?php
                    foreach ($menuitems as $item)
                    {
                        ?>
                        <li class="nav-item">
                            <button class="btn m-1 rounded-pill <?php if ($current_url == $item->url) echo "btn-white"; else echo "es-blue-bg can-click"; ?>">
                                <a href="<?php echo $item->url; ?>" class="nav-link <?php if ($current_url == $item->url) { echo "disabled"; } else { echo "text-white"; } ?>"><?php echo $item->title; ?></a>
                            </button>
                        </li>                        
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </header>
    </div>