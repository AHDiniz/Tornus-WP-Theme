<?php

function TornusRegisterStyles()
{
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style("bootstrap", get_template_directory_uri() . "/assets/css/bootstrap/bootstrap.min.css", array(), "5.1.3");
    wp_enqueue_style("mapbox-style", 'https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css', array(), '2.3.1');
    wp_enqueue_style("mapbox-directions-style", 'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css', array('mapbox-style'), '4.1');
    wp_enqueue_style("mapbox-geocoder-style", "https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css", array("mapbox-style"), "4.7");
    wp_enqueue_style("tornus-style", get_template_directory_uri() . "/style.css", array("bootstrap", 'mapbox-style', 'mapbox-directions-style', 'mapbox-geocoder-style'), $version);
}

function TornusRegisterScripts()
{
    $version = wp_get_theme()->get("Version");
    wp_enqueue_script("bootstrap-scripts", get_template_directory_uri() . "/assets/js/bootstrap/bootstrap.min.js", array(), "5.1.3", false);
    wp_enqueue_script("mapbox", "https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js", array(), '2.3.1', false);
    wp_enqueue_script("mapbox-directions", 'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js', array('mapbox'), '4.1', false);
    wp_enqueue_script("mapbox-geocoder", "https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js", array("mapbox"), "4.7", false);
    wp_enqueue_script("tornus-main", get_template_directory_uri() . "/assets/js/main.js", array("bootstrap-scripts", 'mapbox', 'mapbox-directions'), $version, true);
}

function TornusRegisterBlockScripts()
{
    wp_enqueue_script('mapbox-block', get_template_directory_uri() . '/assets/js/map_block.js', array(), '0.0.0', true);
    wp_enqueue_script('duration-block', get_template_directory_uri() . '/assets/js/duration_block.js', array(), '0.0.0', true);
}

function TornusRegisterMenuLocations()
{
    register_nav_menus(
        array(
            'header_menu' => __('Header Menu'),
            'header_menu_logged_in' => __('Header Menu Logged In'),
            'footer_menu_left' => __('Footer Menu Left'),
            'footer_menu_right' => __('Footer Menu Right'),
            'footer_menu_middle' => __('Footer Menu Middle')
        )
    );
}

function TornusThemeSupports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function TornusThemeSettingsHook()
{
    add_menu_page("Tornus Settings", "Tornus Settings", "manage_options", "tornus-settings", "TornusThemeSettings", null, 99);
}

function TornusThemeSettings()
{
    ?>
    <div class="wrap">
        <form action="options.php" method="post">
            <?php
            settings_fields('section');
            do_settings_sections('tornus-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function TornusThemeSettingsSections()
{
    add_settings_section('section', 'All Settings', null, 'tornus-settings');

    add_settings_field('mapbox_key', 'Mapbox API Key', 'TornusMapboxAPIKeyInput', 'tornus-settings', 'section');
    register_setting('section', 'mapbox_key');
}

function TornusMapboxAPIKeyInput()
{
    ?>
    <input type="text" name="mapbox_key" id="mapbox_key" value="<?php echo get_option('mapbox_key'); ?>" />
    <?php
}

function TornusSearchForm($form)
{
    $action = home_url('/');
    $value = get_search_query();
    return "<form action=\"{$action}\" class=\"searchform\" id=\"searchform\" method=\"get\" role=\"search\">
        <div class=\"input-group\">
            <input type=\"text\" name=\"s\" id=\"s\" value=\"{$value}\" class=\"form-control\">
            <button type=\"submit\" class=\"btn es-pink-bg can-click text-white\">Pesquisar</button>
        </div>
    </form>";
}

add_action('enqueue_block_editor_assets', 'TornusRegisterBlockScripts');
add_action('get_search_form', 'TornusSearchForm');
add_action('admin_init', 'TornusThemeSettingsSections');
add_action('admin_menu', 'TornusThemeSettingsHook');
add_action('init', 'TornusRegisterMenuLocations');
add_action('after_setup_theme', 'TornusThemeSupports');
add_action('wp_enqueue_scripts', 'TornusRegisterStyles');
add_action('wp_enqueue_scripts', 'TornusRegisterScripts');

?>