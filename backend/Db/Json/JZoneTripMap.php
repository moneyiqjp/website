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


class JZoneTripMap  extends JObjectRoot  implements JSONInterface
{
    public $ZoneTripMapId;
    public $Zone;
    public $Trip;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JZone("
            . $this->Zone->ZoneId . "|"
            . $this->Trip->TripId . "|"
            . $this->UpdateTime
        . ") ";
    }

    public static function GETZONETripIDS($id) {
        return FieldUtils::SPLIT_ID($id);
    }

    public static function CREATE_FROM_DB(\ZoneTripMap $item) {
        $mine = new JZoneTripMap();
        $mine->Zone     =  JZone::CREATE_FROM_DB($item->getZone());
        $mine->Trip  = JTrip::CREATE_FROM_DB($item->getTrip());
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->ZoneTripMapId = FieldUtils::GENERATE_KEY("Zone",$item->getZoneId(),$item->getTripId());
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }


    public static function VALIDATE(JZoneTripMap $mine) {
        if(is_null($mine->Zone) || !FieldUtils::ID_IS_DEFINED($mine->Zone->ZoneId))
            throw new JSONException("Did not receive 'Zone' field, which is required" . $mine);

        if(is_null($mine->Trip) || !FieldUtils::ID_IS_DEFINED($mine->Trip->TripId))
            throw new JSONException("Did not receive 'Trip' field, which is required" . $mine);

        return $mine;
    }

    public function isValid(JZoneTripMap $mine) {
        return !(is_null($mine->Zone) || !FieldUtils::ID_IS_DEFINED($mine->Zone->ZoneId)) &&
                !(is_null($mine->Trip) || !FieldUtils::ID_IS_DEFINED($mine->Trip->TripId));
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JZoneTripMap();

        if(!ArrayUtils::KEY_EXISTS($data,'Zone')) throw new JSONException("Require Zone to be specified");
        if(!ArrayUtils::KEY_EXISTS($data['Zone'],'ZoneId')) throw new JSONException("Require Zone->ZoneId to be specified");
        $mine->Zone = JZone::CREATE_FROM_ARRAY($data['Zone']);

        if(!ArrayUtils::KEY_EXISTS($data,'Trip')) throw new JSONException("Require Trip to be specified");
        if(!ArrayUtils::KEY_EXISTS($data['Trip'],'TripId')) throw new JSONException("Require Trip->TripId to be specified");
        $mine->Trip = JTrip::CREATE_FROM_ARRAY($data['Trip']);

        $mine->ZoneTripMapId = FieldUtils::GENERATE_KEY("Zone",$data['Zone']['ZoneId'], $data['Trip']['TripId']);

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JZoneTripMap::VALIDATE($mine);
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
        return $this->updateDB(new \ZoneTripMap());
    }

    public function updateDB(\ZoneTripMap &$item)
    {
        if(!is_null($this->Zone) && FieldUtils::ID_IS_DEFINED($this->Zone->ZoneId))
            $item->setZoneId($this->Zone->ZoneId);

        if(!is_null($this->Trip) && FieldUtils::ID_IS_DEFINED($this->Trip->TripId))
            $item->setTripId($this->Trip->TripId);

        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getLabel() {
        return FieldUtils::getLabel($this->Zone) . "/" . FieldUtils::getLabel($this->Trip) ;
    }

    public function getValue() {
        return $this->ZoneTripMapId;
    }
}