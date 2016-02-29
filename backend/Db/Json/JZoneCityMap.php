<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 2/7/2016
 * Time: 7:56 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JZoneCityMap implements JSONInterface
{
    public $ZoneCityMapId;
    public $Zone;
    public $City;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JZone("
            . $this->Zone->ZoneId . "|"
            . $this->City->CityId . "|"
            . $this->UpdateTime
        . ") ";
    }

    public static function GETZONECITYIDS($id) {
        return FieldUtils::SPLIT_ID($id);
    }

    public static function CREATE_FROM_DB(\ZoneCityMap $item) {
        $mine = new JZoneCityMap();
        $mine->Zone     =  JZone::CREATE_FROM_DB($item->getZone());
        $mine->City  = JCity::CREATE_FROM_DB($item->getCity());
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->ZoneCityMapId = FieldUtils::GENERATE_KEY("Zone",$item->getZoneId(),$item->getCityId());
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }


    public static function VALIDATE(JZoneCityMap $mine) {
        if(is_null($mine->Zone) || !FieldUtils::ID_IS_DEFINED($mine->Zone->ZoneId))
            throw new JSONException("Did not receive 'Zone' field, which is required" . $mine);

        if(is_null($mine->City) || !FieldUtils::ID_IS_DEFINED($mine->City->CityId))
            throw new JSONException("Did not receive 'City' field, which is required" . $mine);

        return $mine;
    }

    public function isValid(JZoneCityMap $mine) {
        return !(is_null($mine->Zone) || !FieldUtils::ID_IS_DEFINED($mine->Zone->ZoneId)) &&
                !(is_null($mine->City) || !FieldUtils::ID_IS_DEFINED($mine->City->CityId));
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JZoneCityMap();

        if(!ArrayUtils::KEY_EXISTS($data,'Zone')) throw new JSONException("Require Zone to be specified");
        if(!ArrayUtils::KEY_EXISTS($data['Zone'],'ZoneId')) throw new JSONException("Require Zone->ZoneId to be specified");
        $mine->Zone = JZone::CREATE_FROM_ARRAY($data['Zone']);

        if(!ArrayUtils::KEY_EXISTS($data,'City')) throw new JSONException("Require City to be specified");
        if(!ArrayUtils::KEY_EXISTS($data['City'],'CityId')) throw new JSONException("Require City->CityId to be specified");
        $mine->City = JCity::CREATE_FROM_ARRAY($data['City']);

        $mine->ZoneCityMapId = FieldUtils::GENERATE_KEY("Zone",$data['Zone']['ZoneId'], $data['City']['CityId']);

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JZoneCityMap::VALIDATE($mine);
    }

    public function saveToDb()
    {
        $item = $this->toDB();
        try {
            return $item->save()>0;
        } catch(\Exception $ex) {
            throw new JSONException("Failed to save to database " . $this . $ex->getMessage(), 0, $ex );
        }
    }


    public function toDB() {
        return $this->updateDB(new \ZoneCityMap());
    }

    public function updateDB(\ZoneCityMap &$item)
    {
        if(!is_null($this->Zone) && FieldUtils::ID_IS_DEFINED($this->Zone->ZoneId))
            $item->setZoneId($this->Zone->ZoneId);

        if(!is_null($this->City) && FieldUtils::ID_IS_DEFINED($this->City->CityId))
            $item->setCityId($this->City->CityId);

        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

}