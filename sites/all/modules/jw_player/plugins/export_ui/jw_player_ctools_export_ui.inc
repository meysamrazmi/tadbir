<?php
/**
 * @file
 * Defines the CTools Export UI plugin for JW Player presets.
 */
$plugin = array(
  'schema' => 'jwplayer_preset',
  'access' => 'administer JW Player presets',
  'menu' => array(
    'menu item' => 'jw_player',
    'menu title' => 'JW Player presets',
    'menu prefix' => 'admin/config/media',
    'menu description' => 'Administer JW Player presets.',
  ),

  'title singular' => t('preset'),
  'title plural' => t('presets'),
  'title singular proper' => t('JW Player preset'),
  'title plural proper' => t('JW Player presets'),

  'form' => array(
    'settings' => 'jw_player_ctools_export_ui_form',
    'validate' => 'jw_player_ctools_export_ui_form_validate',
  ),
);

/**
 * Implements hook_ctools_export_ui_form().
 */
function jw_player_ctools_export_ui_form(&$form, &$form_state) {
  $preset = $form_state['item'];
  $settings = $preset->settings;

   // This is a hack. CTools adds a hierarchy for export_key in form of
   // $form['info][$export_key] (see line 1007 of
   // ctools/plugins/export_ui/ctools_export_ui.class.php).
   // The FAPI machine name object doesn't seem to work well with fields present
   // in different levels of hierarchy, hence we move the fields over to the same
   // level in the hierarchy.
  unset($form['info']);

  $form['preset_name'] = array(
    '#type' => 'textfield',
    '#size' => 20,
    '#maxlength' => 255,
    '#title' => t('Preset name'),
    '#description' => t('Enter name for the preset.'),
    '#default_value' =>  $preset->preset_name,
    '#required' => TRUE,
    '#weight' => 0,
  );

  $form['info']['machine_name'] = array(
    '#title' => t('Machine name'),
    '#type' => 'machine_name',
    '#default_value' => $preset->machine_name,
    '#machine_name' => array(
      'exists' => 'jw_player_preset_load',
      'source' => array('preset_name'),
    ),
    '#weight' => 1,
    '#description' => t('Enter the machine name for the preset. It must be unique and contain only alphanumeric characters and underscores.'),
  );

  $form['description'] = array(
    '#type' => 'textarea',
    '#size' => 10,
    '#title' => t('Description'),
    '#description' => t('Summary for the preset.'),
    '#default_value' => $preset->description,
    '#weight' => 2,
  );

  $form['settings'] = array(
    '#type' => 'fieldset',
    '#title' => 'Settings',
    '#tree' => TRUE,
    '#weight' => 5,
  );

  $form['settings']['primary'] = array(
    '#type' => 'radios',
    '#title' => t('Embed mode'),
    '#description' => t('Select your primary embed mode. Choosing HTML5 primary means that modern browsers that also support flash will use the HTML5 player first where possible. While this is desirable, the Flash based player supports more features and is generally more reliable.'),
    '#options' => array(
      'html5' => t('HTML5 primary, Flash failover'),
      'flash' => t('Flash primary, HTML5 failover'),
    ),
    '#default_value' => isset($settings['mode']) ? $settings['mode'] : 'html5',
  );

  $form['settings']['responsive'] = array(
    '#type' => 'checkbox',
    '#title' => 'Use a Responsive Design',
    '#description' => 'Enable Responsive Design using a percentage based width and an aspect ratio.',
    '#default_value' => $settings['responsive'],
    '#weight' => 4.99,
  );

  $form['settings']['width'] = array(
    '#type' => 'textfield',
    '#size' => 10,
    '#title' => t('Width'),
    '#description' => t('Enter the width for this player.'),
    '#field_suffix' => ' ' . t('pixels or percentage'),
    '#default_value' => $settings['width'],
    '#required' => TRUE,
    '#weight' => 5,
  );

  $form['settings']['height'] = array(
    '#type' => 'textfield',
    '#size' => 10,
    '#title' => t('Height'),
    '#description' => t('Enter the height for this player.'),
    '#field_suffix' => ' ' . t('pixels'),
    '#default_value' => $settings['height'],
    '#required' => TRUE,
    '#weight' => 6,
    '#states' => array(
      'visible' => array(
        ':input[name="settings[responsive]"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['settings']['aspectratio'] = array(
    '#type' => 'textfield',
    '#size' => 10,
    '#title' => t('Aspect ratio'),
    '#description' => t('Enter the aspect ratio for this player.'),
    '#default_value' => isset($settings['aspectratio']) ? $settings['aspectratio'] : '16:9',
    '#required' => TRUE,
    '#weight' => 6,
    '#states' => array(
      'visible' => array(
        ':input[name="settings[responsive]"]' => array('checked' => TRUE),
      ),
    ),
  );

  $form['settings']['controls'] = array(
    '#title' => t('Controls'),
    '#type' => 'checkbox',
    '#description' => t('Whether to display the video controls (controlbar, icons and dock).'),
    '#default_value' => !empty($settings['controls']) ? $settings['controls']: TRUE,
    '#weight' => 7,
  );

  // Playlist settings
  // @todo Playlist support was removed during refactoring and is supported
  // differently using the HTML5 version of JW Player. Support needs to be
  // brought back.

  // $form['settings']['playlist.position'] = array(
  //   '#title' => t('Playlist Position'),
  //   '#type' => 'select',
  //   '#description' => t('The positon of the playlist'),
  //   '#default_value' => !empty($settings['playlist.position']) ? $settings['playlist.position']: 'right',
  //   '#options' => array(
  //     'none' => t('None'),
  //     'bottom' => t('Bottom'),
  //     'top' => t('Top'),
  //     'right' => t('Right'),
  //     'left' => t('Left'),
  //     'over' => t('Over')
  //   ),
  //   '#weight' => 8,
  // );
  //
  //  $form['settings']['playlist.size'] = array(
  //   '#title' => t('Playlist Width'),
  //   '#type' => 'textfield',
  //   '#description' => t('The playlist width in pixels.'),
  //   '#default_value' => !empty($settings['playlist.size']) ? $settings['playlist.size']: '180',
  //   '#field_suffix' => ' ' . t('pixels'),
  //   '#size' => 10,
  //   '#weight' => 9,
  // );

  // Skins.
  
  $skin_options = array(
      'bekle' => 'Bekle*',
      'modieus' => 'Modieus*',
      'glow' => 'Glow*',
      'five' => 'Five*',
      'beelden' => 'Stormtrooper*',
      'vapor' => 'Vapor*',
      'roundster' => 'Roundster*'
      );
  foreach (jw_player_skins() as $skin) {
    $skin_options[$skin->name] = drupal_ucfirst($skin->name);
  }

  $form['settings']['skin'] = array(
    '#title' => t('Skin'),
    '#description' => t('Select a skin, some skins (*) require a premium licence'),
    '#type' => 'select',
    '#default_value' => !empty($settings['skin']) ? $settings['skin']: FALSE,
    '#empty_option' => t('None (default skin)'),
    '#options' => $skin_options,
  );
  
  $form['settings']['stretching'] = array(
    '#title' => t('Stretching'),
    '#description' => t('How to resize the poster and video to fit the display.'),
    '#type' => 'select',
    '#default_value' => !empty($settings['skin']) ? $settings['skin']: 'uniform',
    '#options' => array(
      'none' => t('None (keep original dimensions)'),
      'exactfit' => t(' Exact Fit (stretch disproportionally)'),
      'uniform' => t('Uniform (stretch proportionally; black borders)'),
      'fill' => t('Fill (stretch proportionally; parts cut off)'),
      ),
  );

  // Add preset plugin settings.
  foreach (jw_player_preset_plugins() as $plugin => $info) {
    $form['settings']['plugins']['#weight'] = 8;

    // Fieldset per plugin.
    $form['settings']['plugins'][$plugin] = array(
      '#type' => 'fieldset',
      '#title' => check_plain($info['name']),
      '#description' => check_plain($info['description']),
      '#tree' => TRUE,
      '#weight' => 10,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );

    // Enable/disable plugin setting.
    $form['settings']['plugins'][$plugin]['enable'] = array(
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#description' => check_plain($info['description']),
      '#default_value' => isset($settings['plugins'][$plugin]['enable']) ? $settings['plugins'][$plugin]['enable'] : FALSE,
    );

    // Add each config option specified in the plugin. Config options should be
    // in FAPI structure.
    if (is_array($info['config options']) and !empty($info['config options'])) {
      foreach ($info['config options'] as $option => $element) {
        // Note: Each config option must be a complete FAPI element, except for
        // the #title which is optional. If the #title is not provided, we use
        // the name of the config option as the title.
        if (!isset($element['#title'])) {
          $element['#title'] = drupal_ucfirst($option);
        }
        // Alter the default value if a setting has been saved previously.
        $element['#default_value'] = !empty($settings['plugins'][$plugin][$option]) ? $settings['plugins'][$plugin][$option] : $element['#default_value'];
        // Make the whole element visible only if the plugin is checked (enabled).
        $element['#states'] = array(
          'visible' => array(
               'input[name="settings[plugins][' . $plugin . '][enable]"]' => array('checked' => TRUE),
              ),
        );
        // Add the element to the FAPI structure.
        $form['settings']['plugins'][$plugin][$option] = $element;
      }
    }
  }

  $form['settings']['autostart'] = array(
    '#title' => t('Autostart'),
    '#type' => 'checkbox',
    '#description' => t('Automatically start playing the video on page load. Can be true or false (default). Autostart does not work on mobile devices like iOS and Android.'),
    '#default_value' => !empty($settings['autostart']) ? $settings['autostart']: FALSE,
    '#weight' => 4,
  );

}

/**
 * Valdiator for jw_player_ctools_export_ui_form().
 */
function jw_player_ctools_export_ui_form_validate($form, &$form_state) {
  $vals = $form_state['values'];
  if (!is_numeric($vals['settings']['width'])) {
    form_set_error('width', 'Only numeric values allowed for width' );
  }
  if (!is_numeric($vals['settings']['height'])) {
    form_set_error('width', 'Only numeric values allowed for height' );
  }
}