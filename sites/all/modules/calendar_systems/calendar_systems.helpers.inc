<?php
/**
 * @param $time
 * @param null $tz
 * @return array
 */
function _calendar_systems_get_granularity_from_time($time, $tz = NULL) {
  $granularity = array();
  $allgranularity = array('year', 'month', 'day', 'hour', 'minute', 'second', 'timezone');
  $temp = date_parse($time);
  // Special case for 'now'.
  if ($time == 'now') {
    $granularity = array('year', 'month', 'day', 'hour', 'minute', 'second');
  }
  else {
    // This PHP date_parse() method currently doesn't have resolution down to
    // seconds, so if there is some time, all will be set.
    foreach ($allgranularity as $g) {
      if ((isset($temp[$g]) && is_numeric($temp[$g])) || ($g == 'timezone' && (isset($temp['zone_type']) && $temp['zone_type'] > 0))) {
        $granularity[] = $g;
      }
    }
  }
  if ($tz) {
    $granularity[]='timezone';
  }

  return $granularity;
}




/**
 * @param $format
 * @return array
 */
function _calendar_systems_get_granularity_from_format($format) {
  return date_format_order($format);
}


/**
 * @param $format
 * @return array
 */
function _calendar_systems_get_granularity_part($part, $granularity) {
  $result = array();
  foreach ($granularity as $value) {
    switch ($part) {
      case 'date':
        if (in_array($value, array('year', 'month', 'day'))) {
          $result[] = $value;
        }
        break;
      case 'time':
        if (in_array($value, array('hour', 'minute', 'second', 'timezone'))) {
          $result[] = $value;
        }
        break;
      default:
    }
  }
  return $result;
}


/**
 * @param $format
 * @return array
 */
function _calendar_systems_get_format_part($part, $format) {
  $granularity = _calendar_systems_get_granularity_from_format($format);
  $granularity = _calendar_systems_get_granularity_part($part, $granularity);
  return date_limit_format($format, $granularity);
}

/**
 * Internal helper to check whether the required patch is applied or not.
 *
 * @return
 *   Boolean value.
 */
function _calendar_systems_is_patch_applied($cache = TRUE) {
  static $result;
  if ($cache) {
    $cache_object = cache_get('calendar_systems_is_patch_applied');
    if (is_object($cache_object)) {
      $result = $cache_object->data;
    }
  }
  if (is_null($result)) {
    $content = file_get_contents(DRUPAL_ROOT . '/includes/common.inc');
    // Check against patch fingerprint:
    $very_old_patch_applied = (strpos($content, 'foreach (module_implements(\'format_date\') AS $module) {') !== FALSE) ?
      TRUE : FALSE;
    $old_patch_applied = (strpos($content, 'foreach (module_implements(\'format_date_calendar_systems\') AS $module) {') !== FALSE) ?
      TRUE : FALSE;
    $applied = (strpos($content, 'drupal_alter(\'format_date\'') !== FALSE) ?
      TRUE : FALSE;
    if ($applied) {
	  $result = TRUE;
    } elseif ($old_patch_applied || $very_old_patch_applied) {
      $result = 'outdated';
    } else {
      $result = FALSE;
    }
    cache_set('calendar_systems_is_patch_applied', $result, 'cache',  REQUEST_TIME  + (60*60));
  }
  return $result;
}


/**
 * @param $date
 * @param $format
 * @return bool|mixed
 */
function _calendar_systems_fix_display($date, $format, $calendar_system_name) {
  $calendar = calendar_systems_get_calendar_instance($calendar_system_name);
  $date = new DateObject($date);
  $timestamp = $date->format("U");
  if (!$timestamp) {
    return FALSE;
  }
  else {
    $content = $calendar->smartGet($format, $timestamp);
    return $content;
  }
}

/**
 * Helper function
 *
 * @return
 *   A List of valid date format characters
 */
function _calendar_systems_get_date_format() {
  $chars=array(
    'L' => 'year',
    'o' => 'year',
    'Y' => 'year',
    'y' => 'year',
    'F' => 'month',
    'm' => 'month',
    'M' => 'month',
    'n' => 'month',
    't' => 'month',
    'd' => 'day',
    'D' => 'day',
    'j' => 'day',
    'l' => 'day',
    'N' => 'day',
    'S' => 'day',
    'w' => 'day',
    'z' => 'day',
    'a' => 'hour',
    'A' => 'hour',
    'B' => 'hour',
    'g' => 'hour',
    'G' => 'hour',
    'h' => 'hour',
    'H' => 'hour',
    'i' => 'minute',
    's' => 'second',
    'u' => 'second',
    'e' => 'hour',
    'O' => 'hour',
    'P' => 'hour',
    'T' => 'hour',
    'Z' => 'second',
    'I' => 'day',
    'c' => '',
    'r' => '',
    'U' => '',
  );

  return $chars;
}


/**
 * Helper function
 * @param $format
 * @param $granularity
 * @return string
 */
function _calendar_systems_fix_whitespace($format, $granularity) {
  $new_format = '';
  $list = _calendar_systems_get_date_format();

  //remove whitespaces from end
  $i = strlen($format) - 1;
  for (; $i >= 0; $i--) {
    $c = $format[$i];
    if (isset($list[$c])) {
      break;
    }
  }
  $format = substr($format, 0, $i + 1);

  //remove whitespaces from begining
  $i = 0;
  for (; $i < strlen($format); $i++) {
    $c = $format[$i];
    if (isset($list[$c])) {
      break;
    }
  }

  $new_format = substr($format, $i, strlen($format) - $i);

  return $new_format;
}


/**
 * Helper function
 * @param $format
 * @param $granularity
 * @return string
 */
function _calendar_systems_get_format($format, $granularity) {
  $new_format = '';

  switch ($format) {
    case 'small':
    case 'short':
      $new_format = variable_get('date_format_short', 'm/d/Y - H:i');
      break;
    case 'large':
      $new_format = variable_get('date_format_long', 'l, F j, Y - H:i');
      break;
    case 'medium':
      $new_format = variable_get('date_format_medium', 'D, m/d/Y - H:i');
      break;
    default:
      $new_format = $format;
      break;
  }
  if ($granularity) {
    $new_format = _calendar_systems_fix_by_granularity($new_format, $granularity);
    $new_format = _calendar_systems_fix_whitespace($new_format, $granularity);
  }
  return $new_format;
}

/**
 * Helper function
 * @param $format
 * @param $granularity
 * @return string
 */
function _calendar_systems_fix_by_granularity($format, $granularity) {
  $new_format = '';
  $list = _calendar_systems_get_date_format();
  for ($i=0; $i < strlen($format); $i++) {
    $c = $format[$i];
    if (isset($list[$c])) {
      if (isset($granularity[$list[$c]])) {
        $new_format .= $c;
      }
    }
    else{
      $new_format .= $c;
    }
  }

  return $new_format;
}

/**
 * @param $date
 * @param null $format
 * @return array|bool|int|mixed|null|string
 *
 * Internal helper method to convert and validate date
 */
function _calendar_systems_date_convert($date, $format = NULL, $calendar_system = NULL, $options = array()) {
  if (is_null($calendar_system)){
    $calendar_system = calendar_systems_get_calendar_system_name();
  }
  if ($calendar_system == 'default') {
    return $date;
  }
  // Get proper calendar instance:
  $calendar = calendar_systems_get_calendar_instance($calendar_system);
  $result = FALSE;
  if (is_array($date)) {
    $r = $calendar->isDateValid(isset($date['month'])?$date['month']:NULL, isset($date['day'])?$date['day']:NULL, isset($date['year'])?$date['year']:NULL);
    if ($r !== 0 && $r !== FALSE) {
      list($date['year'], $date['month'], $date['day']) = $calendar->toGregorian($date['year'], $date['month'], $date['day']);
      $result = $date;
    }
  } else {
    $date_parts = array();
    if (isset($options['iso_fixed_size_position']) && $options['iso_fixed_size_position']) {
      $format_parser = '(?<year>[0-9]{4})(?<month>[0-9]{2})?(?<day>[0-9]{2})?(?<hour>[0-9]{2})?(?<minute>[0-9]{2})?(?<second>[0-9]{2})?';
      if (preg_match_all("%$format_parser%", $date, $matches)) {
        $date_parts['year'] = @$matches['year'][0];
        $date_parts['month'] = @$matches['month'][0];
        $date_parts['day'] = @$matches['day'][0];
        $date_parts['hour'] = @$matches['hour'][0];
        $date_parts['minute'] = @$matches['minute'][0];
        $date_parts['second'] = @$matches['second'][0];
      }
    } elseif (!is_null($format)) {
      $format = preg_quote($format);
      $format_parser = preg_replace('%([a-zA-Z])%', '(?<$1>[0-9]+)', $format); //dDjFmMnYy
      if (preg_match_all("%$format_parser%", $date, $matches)) {
        $date_parts['year'] = @$matches['Y'][0];
        $date_parts['month'] = @$matches['m'][0];
        $date_parts['day'] = @$matches['d'][0];
        $date_parts['hour'] = @$matches['H'][0];
        $date_parts['minute'] = @$matches['i'][0];
        $date_parts['second'] = @$matches['s'][0];
      }
    } else {
      // Extract date and time:
      $_date = preg_replace('/([0-9]+\-[0-9]+\-[0-9]+) (.*)/si', '$1', $date);
      $time = preg_replace('/([0-9]+\-[0-9]+\-[0-9]+) (.*)/si', '$2', $date);

      if (preg_match('/^([0-9]{2,4})[-\/\\\]([0-9]{1,2})[-\/\\\]([0-9]{1,2})( +([0-9]{1,2})[:]([0-9]{1,2})[:]([0-9]{1,2}))?/', $_date, $regs)) {
        $date_parts['year'] = $regs[1];
        $date_parts['month'] = $regs[2];
        $date_parts['day'] = $regs[3];
        $format = "Y-m-d $time";
      }
    }

    // Convert to timestamp:
    if ($date_parts) {
      if (@empty($date_parts['month'])) {
        $date_parts['month'] = 1;
      }
      if (@empty($date_parts['day'])) {
        $date_parts['day'] = 1;
      }
      $r = $calendar->isDateValid($date_parts['month'], $date_parts['day'], $date_parts['year']);
      if ($r !== 0 && $r !== FALSE) {
        $result = $calendar->strToTimestamp("{$date_parts['year']}-{$date_parts['month']}-{$date_parts['day']} 10:10:10");
        $result = date($format, $result);
      }
    }
  }

  return $result;
}



/**
 * Internal helper to load calendar system's required dependencies.
 */
function _calendar_systems_load_dependencies() {
  // This static variable will not need to be reset during
  // the page request, so we're not using drupal_static() here.
  static $loaded = FALSE;

  if (!$loaded) {
    if (!module_exists('cml')) {
      module_load_include('class.inc.php', 'calendar_systems', 'calendar/lib/exception');
      module_load_include('class.inc.php', 'calendar_systems', 'calendar/lib/classesCore');
    }
    if (!class_exists('cmfcCalendar')) {
      module_load_include('class.inc.php', 'calendar_systems', 'calendar/calendar');
    }
    $loaded = TRUE;
  }
}

/**
 * Internal helper which defines all available calendars manually.
 *
 * @return
 *   An array defined calendars.
 *
 * @todo
 *   Define a pluggable API, so other modules can hook the hell in.
 */
function _calendar_systems_plugins() {
  static $result;
  if (!$result) {
    $result = array(
      'default' => array(
        'title' => t('Default'),
        'installed' => TRUE,
        'installed version' => 2,
      )
    );
    $calendar_systems = calendar_systems_get_calendar_instance();
    $plugins = $calendar_systems->getPlugins();

    foreach ($plugins as $plugin_name => $plugin_info) {
      $result[$plugin_name] = $plugin_info;
      $result[$plugin_name]['title'] = t(ucfirst($plugin_name));
      $result[$plugin_name]['installed'] = TRUE;
      $result[$plugin_name]['installed version'] = 2;
    }
  }
  return $result;
}

/**
 * Internal helper to get all active languages.
 *
 * @return
 *   An array of active languages.
 */
function _calendar_systems_langauges() {
  // Default:
  $languages['default'] = array(
    'name' => 'Default'
  );

  // Check if there's any additional locale available:
  $locales = function_exists('locale_language_list') ?
    locale_language_list('name', TRUE) : NULL;

  // If found, append 'em:
  if (!is_null($locales)) {
    foreach ($locales as $name => $title) {
      $languages[$name] = array(
        'name' => $title,
      );
    }
  }

  return $languages;
}

/**
 * Internal helper to return site's current language.
 *
 * @return
 *   Current language.
 */
function _calendar_systems_languages_active() {
  global $language;
  // Better?
  return ($language && $language->language) ? $language->language : 'default';
}

/**
 * Internal static cache helper to get all available profiles.
 *
 * @return
 *   An array of available profiles.
 */
function _calendar_systems_profiles() {
  $cache = &drupal_static(__FUNCTION__);

  if (!isset($cache)) {
    $cache = array();
    $profiles = db_query('SELECT language, calendar_system, settings FROM {calendar_systems}');
    // Build an array of profiles keyed by the identifiers:
    foreach ($profiles as $profile) {
      $profile->settings = unserialize($profile->settings);
      $cache[$profile->language] = $profile;
    }
  }

  return $cache;
}


/**
 * Internal static cache helper to get all available profiles for using as form select element options.
 *
 * @return
 *   An array of available profiles.
 */
function _calendar_systems_profiles_simple($default_options = FALSE) {
  $cache = &drupal_static(__FUNCTION__);

  if (!isset($cache)) {
    $calendar_systems = _calendar_systems_plugins();
    $cache = array();
    if ($default_options !== FALSE) {
      $cache = $default_options;
    }
    // Build available calendar systems array:
    foreach ($calendar_systems as $id => $calendar_system) {
      $cache[$id] = $calendar_system['title'];
    }
  }

  return $cache;
}

/**
 * Helper to determine the active calendar system
 */
function calendar_systems_get_calendar_system_name($language = NULL) {
  // Load all available profiles:
  $profiles = _calendar_systems_profiles();
  // Get site's current language:
  if (is_null($language)) {
    $language = _calendar_systems_languages_active();
  }

  if (isset($profiles[$language])) {
    $calendar_system = $profiles[$language]->calendar_system;
  }
  elseif (isset($profiles['default'])) {
    $calendar_system = $profiles['default']->calendar_system;
  }

  if (empty($calendar_system))  {
    $calendar_system = 'default';
  }

  return $calendar_system;
}

/**
 * Gets an instance of the calendar object for
 * the selected calendar system acording to the settings
 * or the passed arguments
 *
 * @return
 *   Calendar object or default on fail.
 *
 */
function calendar_systems_get_calendar_instance($calendar_system = NULL, $language = NULL) {
  // Load module dependencies:
  _calendar_systems_load_dependencies();
  if (is_null($calendar_system)) {
    $calendar_system = calendar_systems_get_calendar_system_name($language);
  }
  if ($calendar_system == 'default') $calendar_system = 'gregorian';

  $calendar = cmfcCalendar::factory('v1', array(
    'name' => $calendar_system,
  ));

  return $calendar;
}

/**
 * @param $format
 */
function calendar_system_convert_date_format_from_php_to_js($php_format) {
  $SYMBOLS_MATCHING = array(
    // Day
    'd' => 'dd',
    'D' => 'D',
    'j' => 'd',
    'l' => 'DD',
    'N' => '',
    'S' => '',
    'w' => '',
    'z' => 'o',
    // Week
    'W' => '',
    // Month
    'F' => 'MM',
    'm' => 'mm',
    'M' => 'M',
    'n' => 'm',
    't' => '',
    // Year
    'L' => '',
    'o' => '',
    'Y' => 'yyyy',
    'y' => 'yy',
    // Time
    'a' => '',
    'A' => '',
    'B' => '',
    'g' => '',
    'G' => '',
    'h' => '',
    'H' => '',
    'i' => '',
    's' => '',
    'u' => ''
  );
  $jqueryui_format = "";
  $escaping = false;
  for($i = 0; $i < strlen($php_format); $i++)
  {
    $char = $php_format[$i];
    if($char === '\\') // PHP date format escaping character
    {
      $i++;
      if($escaping) $jqueryui_format .= $php_format[$i];
      else $jqueryui_format .= '\'' . $php_format[$i];
      $escaping = true;
    }
    else
    {
      if($escaping) { $jqueryui_format .= "'"; $escaping = false; }
      if(isset($SYMBOLS_MATCHING[$char]))
        $jqueryui_format .= $SYMBOLS_MATCHING[$char];
      else
        $jqueryui_format .= $char;
    }
  }
  return $jqueryui_format;
}