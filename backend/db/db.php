<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:02 PM
 */

namespace DB;

require 'CreditCard.php';

use CreditCard\CreditCard;

class DB
{
    function db()
    {

    }

    function GetAllCards()
    {
        //TODO Actually Retrieve cards from DB
        $result = array((new CreditCard())->dummy());
        for($i=0;$i<10;$i++)
        {
            array_push($result,(new CreditCard())->dummy());
        }
        return $result;
    }

}