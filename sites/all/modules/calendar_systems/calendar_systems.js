(function($, Drupal) {
    /**
     * This script adds jquery calendars date picker to related html elements
     */
    Drupal.behaviors.CalendarSystems = {
        attach: function (context, settings) {
            $('input[calendar_systems_date_popup=true]', context).each(function() {
                $(this).calendarsPicker({
                    calendar: $.calendars.instance($(this).attr('calendar_systems_system_name'), $(this).attr('calendar_systems_language')),
                    dateFormat: $(this).attr('calendar_systems_date_format'),
                    alignment: $(this).attr('calendar_systems_alignment'),
                    onShow: function (picker, calendar, inst) {
                        if (picker) {
                            picker_parts =$(this).val().split(' ');
                        }
                    },
                    onSelect: function (dates) {
                        if (dates) {
                            if (picker_parts[1]) {
                                dates = dates + ' '  + picker_parts[1];
                            } else if ('' != $(this).attr('calendar_systems_time')) {
                                dates = dates + ' ' + $(this).attr('calendar_systems_time');
                            }
                            if ('' != $(this).attr('calendar_systems_time_format')) {
                                if (picker_parts[2]) {
                                    dates = dates + ' ' + picker_parts[2];
                                }
                                $(this).val(dates);
                            }
                        }
                    }
                });
            });
        }
    }
})(jQuery, Drupal);