<?php

/*
Plugin Name: Tactik Elements for Oxygen
Author: Marc-Gabriel
Author URI: https://tactikmedia.com
Description: Faciliter l'obtention des champs ACF dans Oxygen grâce à un élément prévu à cet effet.
Version: 1.1
*/

add_action('plugins_loaded', 'my_oxygen_elements_init');

function my_oxygen_elements_init()
{

    if (!class_exists('OxygenElement')) {
        return;
    }

    foreach ( glob(plugin_dir_path(__FILE__) . "elements/*.php" ) as $filename)
    {
        include $filename;
    }

}
