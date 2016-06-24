<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/20/2016
 * Time: 11:38 AM
 */

namespace Db\Json;


class JObjectRoot implements JObjectifiable
{
    public function getLabel() {
        return "";
    }

    public function getValue() {
        return "";
    }

    public function toJObject() {
        return JObject::CREATE($this->getLabel(), $this->getValue());
    }
}