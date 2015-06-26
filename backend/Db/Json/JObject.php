<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 8:56 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;


class JObject {
    public $label;
    public $value;


    function JObject()
    {
        return $this;
    }

    public static function CREATE($_displayText, $_value)
    {
        $me = new JObject();
        $me->label = $_displayText;
        $me->value = $_value;
        return $me;
    }

    public static function CREATE_FROM_ARRAY($data) {

        $me = new JObject();
        if(ArrayUtils::KEY_EXISTS($data,'label')) $me->label = $data['label'];
        if(ArrayUtils::KEY_EXISTS($data,'value')) $me->label = $data['value'];

        return $me;
    }
}
