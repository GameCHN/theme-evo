<?php
/**
 * Cutlass includes
 *
 * The $cutlass_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 */
$cutlass_includes = array(
  //'blade.php',                  // Load Laravel's Blade Templating Engine
  'utils.php',                  // Utility functions
  'init.php',                   // Initial theme setup and constants
  'config.php',                 // Configuration
  'activation.php',             // Theme activation
  'titles.php',                 // Page titles
  'wp_bootstrap_navwalker.php', // Bootstrap Nav Walker (From https://github.com/twittem/wp-bootstrap-navwalker)
  'gallery.php',                // Custom [gallery] modifications
  'comments.php',               // Custom comments modifications
  'scripts.php',                // Scripts and stylesheets
  'extras.php'                  // Custom functions
);


///if (defined('TEMPLATEPATH')) {
//    View::addLocation(__DIR__.'/Resources/views');
//    View::addNamespace('tpl', __DIR__ . '/Resources/views');
//}

foreach ($cutlass_includes as $file) {
  if (!$filepath = locate_template("Entities/$file")) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'cutlass'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);