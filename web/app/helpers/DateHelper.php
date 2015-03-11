<?php

namespace App\Helpers;

use DateTime;

/**
 * Description of DateHelper
 *
 * @author nunenuh
 */
class DateHelper {

    public static function toDate($array) {
        $a = $array;
        if (empty($a['day']) && empty($a['month']) && empty($a['year'])) {
            return null;
        } else {
            $dd = (!empty($array['day'])) ? $array['day'] : '01';
            $mm = (!empty($array['month'])) ? $array['month'] : '01';
            $yy = (!empty($array['year'])) ? $array['year'] : '2014';
            $str = $yy . "/" . $mm . "/" . $dd;
            $time = strtotime($str);
            return date('Y-m-d', $time);
        }
    }

    public static function toArray($date) {
        $date = new DateTime($date);
        $dd = $date->format('d');
        $mm = $date->format('m');
        $yy = $date->format('Y');
        $out = [
            'day' => $dd,
            'month' => $mm,
            'year' => $yy,
        ];

        return $out;
    }

}
