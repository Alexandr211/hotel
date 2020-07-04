<?php


namespace app\models;


use DateTime;

class Other
{
    /**
     * getDaysBetween2Dates
     *
     * Return the difference of days between $date1 and $date2 ($date1 - $date2)
     * if $absolute parameter is false, the return value is negative if $date2 is after than $date1
     *
     * @param DateTime $date1
     * @param DateTime $date2
     * @param Boolean $absolute
     *            = true
     * @return integer
     */
    public function getDaysBetween2Dates(DateTime $date1, DateTime $date2, $absolute = true)
    {
        $interval = $date2->diff($date1);
        // if we have to take in account the relative position (!$absolute) and the relative position is negative,
        // we return negatif value otherwise, we return the absolute value
        return (!$absolute and $interval->invert) ? - $interval->days : $interval->days;
    }
}