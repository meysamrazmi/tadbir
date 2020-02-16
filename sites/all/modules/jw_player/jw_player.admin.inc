<?php

/**
 * @file
 *   Provides admin settings form(s)
 */

/**
 * General settings form
 */
function jw_player_settings_form($form) {
  drupal_set_title(t('JW Player general settings'));
  $url = 'https://account.jwplayer.com/#/account';
  $form['jw_player_account_token'] = array(
    '#type' => 'textfield',
    '#title' => t('Cloud-Hosted Account Token'),
    '#description' => t('Set the account token for a Cloud-Hosted Player, or leave empty if using a Self-Hosted Player. You can retrieve your token from <a href="@url">your account settings page at jwplayer.com</a>.', array(
      '@url' => $url,
    )),
    '#default_value' => variable_get('jw_player_account_token', NULL),
  );

  $form['jw_player_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Self-Hosted Player License Key'),
    '#description' => t('If you have a premium account enter your key here. You can retrieve your license key from <a href="@url">your account settings page at jwplayer.com</a>.', array(
      '@url' => $url,
    )),
    '#default_value' => variable_get('jw_player_key', NULL),
  );

  return system_settings_form($form);
}
