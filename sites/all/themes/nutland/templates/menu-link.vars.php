<?php

/**
 * @file
 * Stub file for "menu_link" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "menu_link" theme hook.
 *
 * See theme function for list of available variables.
 *
 * @param array $variables
 *   An associative array of variables, passed by reference.
 *
 * @see bootstrap_menu_link()
 * @see theme_menu_link()
 *
 * @ingroup theme_preprocess
 */
function nutland_preprocess_menu_link(array &$variables) {
  $element = &$variables['element'];
  if($element['#original_link']['mlid'] == 873){
    $block = block_load('block', '8');
    $output = _block_get_renderable_array(_block_render_blocks(array($block)));
    $element['#below'] = array($output);
    $element['#original_link']['has_children'] = 1;
  }
}
