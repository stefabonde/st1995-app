<?php
/**
 * Created by PhpStorm.
 * User: lpezzali
 * Date: 2019-02-05
 * Time: 23:47
 */

namespace AppBundle\Utils\Services;


class UtilsService {

    static $ignore = [0, 6]; // saturday and sunday

    static $staticHolidays = ['01-01', '06-01', '25-04', '01-05', '02-06', '15-08', '01-11', '08-12', '24-12', '25-12', '26-12', '31-12'];

    public function getWorkingDays($year, $month) {
        $count = 0;
        $counter = mktime(0, 0, 0, $month, 1, $year);
        $holidays = $this->getHolidays($year);
        while (date("n", $counter) == $month) {
            if (in_array(date("w", $counter), self::$ignore) == false &&
                !in_array(date("d-m", $counter), $holidays)) {
                $count++;
            }
            $counter = strtotime("+1 day", $counter);
        }

        return $count;
    }

    public function getHolidays($year) {
        $holidays = self::$staticHolidays;
        $easter = $this->getEasterDate($year);
        $easter = (new \DateTime())->setTimestamp($easter);
        $holidays[] = $easter->format('d-m');
        $easter->add(new \DateInterval('P1D'));
        $holidays[] = $easter->format('d-m');

        return $holidays;
    }

    public function getEasterDate($year) {
        return easter_date($year);
    }

}