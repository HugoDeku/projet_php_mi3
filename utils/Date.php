<?php


abstract class Date
{
    public static function getStringMonthYear(int $month, int $year) : string{
        return ($year . "-" . $month);
    }

    public static function getMonthYearFromString(string $yearmonth) : array{
        $arrayResExplode = explode("-", $yearmonth);
        return array("year"=>$arrayResExplode[0], "month"=>$arrayResExplode[1]);
    }
}