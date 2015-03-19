<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:02 PM
 */

namespace Db\Core;


class SimpleCardFeatureType {
    public $feature;
    public $category;


    function SimpleCardFeatureType()
    {
        return $this;
    }

    public static function fromCardFeatureTypeObject(\CardFeatureType $ft)
    {
        $mine = new SimpleCardFeatureType();
        $mine->feature = $ft->getName();
        $mine->category = $ft->getCategory();
        return $mine;
    }
}