<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2/7/2016
 * Time: 6:37 PM
 */

namespace Db\Json;
use Base\CityQuery;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JCity implements JSONInterface
{
    public $CityId;
    public $Name;
    public $Region;
    public $Display;
    public $UpdateTime;
    public $UpdateUser;

    public static function CREATE_FROM_DB(\City $item) {
        $mine = new JCity();
        $mine->CityId = $item->getCityId();
        $mine->Name = $item->getName();
        $mine->Region = $item->getRegion();
        $mine->Display = $item->getDisplay();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JCity();
        if(ArrayUtils::KEY_EXISTS($data,'CityId')) {
            $mine->CityId = $data['CityId'];
            $mine = JCity::CREATE_FROM_DB($mine->tryLoadFromDB());
        }
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'Region')) $mine->Region = $data['Region'];
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime'))$mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser'))$mine->UpdateUser = $data['UpdateUser'];
        return $mine;
    }

    public function saveToDb()
    {
        return $this->toDB()->save() > 0;
    }

    private function tryLoad($id) {
        $item = CityQuery::create()->findOneByCityId($id);
        return $item;
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->CityId)) {
            $item = CityQuery::create()->findOneByCityId($this->CityId);
            if(!is_null($item)) return $item;
        }

        return new \City();
    }

    public function toDB()
    {
        $item = $this->tryLoadFromDB();
        return $this->updateDB($item);
    }

    public function updateDB(\City &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->CityId)) $item->setCityId($this->CityId);

        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Region)) $item->setRegion($this->Region);
        if(FieldUtils::STRING_IS_DEFINED($this->Display)) $item->setDisplay($this->Display);

        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}