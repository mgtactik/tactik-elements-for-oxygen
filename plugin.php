<?php

/*
Plugin Name: Tactik Elements for Oxygen
Author: Marc-Gabriel
Author URI: https://tactikmedia.com
Description: Faciliter l'obtention des champs ACF dans Oxygen grâce à un élément prévu à cet effet.
Version: 1.1
*/

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/mgtactik/tactik-elements-for-oxygen/',
	__FILE__,
	'tactik-elements-for-oxygen'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('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');

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
