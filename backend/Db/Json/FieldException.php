<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/2/2016
 * Time: 9:09 PM
 */

namespace Db\Json;


class FieldException extends \Exception
{
    private $field;
    final public function getField() {
        return $this->field;
    }

    public static function CREATE($field_, $message, $code = 0, $previous=null) {
        $fe = new FieldException($message,$code, $previous);
        $fe->field = $field_;
        return $fe;
    }

    
    public function __toString() {
        return   "$this->field: [{$this->code}]: {$this->message}\n";
    }

}