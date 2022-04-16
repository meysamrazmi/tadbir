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

function nutland_ds_pre_render_alter(&$layout_render_array, $context, $vars) {
  if ($context['entity']->type == 'subset') {
    foreach ($layout_render_array['footer'] as &$field) {
      if (!empty($field['#field_name']) && $field['#field_name'] == 'field_company') {

        $index = 0;
        foreach ($field as $key => &$item) {
          if (is_numeric($key) && !empty($context['entity']->field_company_links['und'][$index]['url'])) {
            $item['#path'] = [
              'path' => $context['entity']->field_company_links['und'][$index]['url'],
            ];
            $index++;
          }
        }

      }
    }
  }
}
