=== DESCRIPTION  ===

  Support for various calendar systems like Iranian, Gregorian, Hijri, Hebew, Thai, etc.

  - Supports Iranian/Persian , Arabic/Hijri/Islamic, Thai, Gregorian Calendar systems
  - Integration with Drupal's node "authored on" and "admin authored" fields
  - Supports Single language websites
  - Views Support including views built-in date filters
  - Compatible with all Drupal standard forms out of the box
  - Supports Multi language websites via locale module. Each language can have a different calendar system
  - Integration with jquery world calendars date picker
  - Supports all date module's widgets
  - Scheduler module support (If set to use standard text field)
  - API for third party usage

=== INSTALLATION ===

  - Install and enable the module as usual: http://drupal.org/node/70151

  - Apply the patch that comes with the module on "/includes/common.inc" file
    You can find the patch in module's folder at patch/core_format_date_alter.patch
	If you don't know how to apply a patch, follow the instruction here : http://drupal.org/patch/apply

  - Goto "admin/config/regionals/calendar-systems" and configure your profiles.
  - Optionally you can download and install JQuery Calendar API (http://drupal.org/project/jquery_calendar) module to add date popup support
    Will be automatically activated for popup date fields
	
	Very Important : **** CLEAR DRUPAL CACHE **** Or it won't work. How ? https://www.drupal.org/documentation/clearing-rebuilding-cache	
  
=== API ===

calendar_systems_get_calendar_instance

  You can use calendar_systems_get_calendar_instance($calendar_system = NULL, $language = NULL) to get and instance
  of a calendar system.
  For example to get an instance of iranian calendar system : 
  $calendar = calendar_systems_get_calendar_instance('iranian');
  $calendar->date('Y-m-d',time());

Available methods :
  $calendar->timestampToStr($format, $timestamp=null);
  $calendar->strToTimestamp($string);
  $calendar->timestampToInfoArray($timestamp=null);
  $calendar->infoArrayToTimestamp($arr);
  $calendar->date($format, $maket=null);
  $calendar->fromGregorian($g_y, $g_m, $g_d);
  $calendar->toGregorian($j_y, $j_m, $j_d);
  $calendar->smartGet($type,$value="now");
  $calendar->makeTime($hour="",$minute="",$second="",$jmonth="",$jday="",$jyear="");
  $calendar->isDateValid($month,$day,$year);
  $calendar->dateDiff($first,$second);

Converting from one calendar system to another :
  $iranian_calendar = calendar_systems_get_calendar_instance('iranian');
  $val = $iranian_calendar->strToTimestamp('1380-05-10');
  $arabic_calendar->date('Y-m-d',$val);

calendar_systems_get_calendar_system_name
  calendar_systems_get_calendar_system_name()
  Result : 'default'
  
  calendar_systems_get_calendar_system_name(NULL, 'fa')
  Result : 'iranian'


=== Extend : Plugin System and adding new calendar system ===

Calendar systems module has a pluggable architecture which means that each calendar system is a plug-in
new calendar system can easily be added.
Plug-ins are located at calendar\v1\calendarSystems, they will be automatically detected and included by
Calendar systems module once put on this location.
Copy and rename one of the calendar system in this folder and start implementing you new calendar :)

=== Support ===

  Found a bug? report it here http://drupal.org/node/add/project-issue/calendar_systems

AUTHORS AND MAINTAINERS
=======================

  Sina Salek - http://sina.salek.ws
  Sepehr Lajevardi - D7 co-maintainer
