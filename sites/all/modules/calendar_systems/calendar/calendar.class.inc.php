<?php
/**
 * @todo
 *   Esfahbod multi calendar should be used as of base of this package.
 */

class cmfcCalendar {
	public static function factory($name,$options) {
		if ($name=='v1') {
			require_once(dirname(__FILE__).'/v1/calendarV1.class.inc.php');
			return cmfcCalendarV1::factory($options);
		}
	}
}