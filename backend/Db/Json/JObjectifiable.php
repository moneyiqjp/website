<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/20/2016
 * Time: 9:21 AM
 */


namespace Db\Json;


interface JObjectifiable {

    public function getLabel();

    public function getValue();

    public function toJObject();
}