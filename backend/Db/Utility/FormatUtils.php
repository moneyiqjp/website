<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 12/6/2015
 * Time: 5:57 PM
 */

namespace Db\Utility;


class FormatUtils
{
    private static $decimalSeparator =".";
    private static $percentageDigits = 2;

    static function Percentage($decimal) {
        return number_format($decimal*100,FormatUtils::$percentageDigits) . "%";
    }
}