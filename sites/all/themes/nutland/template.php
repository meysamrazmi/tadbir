<?php

/**
 * @file
 * Bootstrap sub-theme.
 *
 * Place your custom PHP code in this file.
 */
/**
 * Implements hook_theme_registry_alter().
 */
function nutland_theme_registry_alter(&$theme_registry) {
  $theme_registry['status_messages']['function'] = 'theme_pines_notify';
}
