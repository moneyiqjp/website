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


class JMileageType implements JSONInterface
{
    public $MileageTypeId;
    public $Season;
    public $Class;
    public $RoundTrip;
    public $TicketType;
    public $TripLength;
    public $Display;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\MileageType $item) {
        $mine = new JMileageType();
        $mine->MileageTypeId = $item->getMileageTypeId();
        $mine->RoundTrip = $item->getRoundTrip();
        $mine->Season = JSeason::CREATE_FROM_DB($item->getSeason());
        $mine->Class = $item->getClass();
        $mine->TicketType = $item->getTicketType();
        $mine->TripLength = $item->getTripLength();
        $mine->Display = $item->getDisplay();

        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JMileageType();
        if(ArrayUtils::KEY_EXISTS($data,'MileageTypeId')) {
            $mine->MileageTypeId = $data['MileageTypeId'];
            $item = $mine->tryLoadFromDB();
            if(!is_null($item)) $mine = JMileageType::CREATE_FROM_DB($item);
        }
        if(ArrayUtils::KEY_EXISTS($data,'Season')) $mine->Season = JSeason::CREATE_FROM_ARRAY($data['Season']);
        if(ArrayUtils::KEY_EXISTS($data,'RoundTrip')) $mine->RoundTrip = $data['RoundTrip'];
        if(ArrayUtils::KEY_EXISTS($data,'Class')) $mine->Class =$data['Class'];
        if(ArrayUtils::KEY_EXISTS($data,'TicketType')) $mine->TicketType = $data['TicketType'];
        if(ArrayUtils::KEY_EXISTS($data,'TripLength')) $mine->TripLength = $data['TripLength'];
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];

        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'Distance')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDb()
    {
        return $this->toDB()->save() > 0;
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->MileageTypeId)) {
            $item = \MileageTypeQuery::create()->findByMileageTypeId($this->MileageTypeId);
            if(!is_null($item)) return $item;
        }
        return new \MileageType();
    }

    public function toDB()
    {
        $item = $this->tryLoadFromDB();
        return $this->updateDB($item);
    }

    public function updateDB(\MileageType &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->MileageTypeId)) $item->setMileageTypeId($this->MileageTypeId);

        if(!is_null($this->Season) && FieldUtils::ID_IS_DEFINED( $this->Season->SeasonId)) {
            $item->setSeasonId($this->Season->SeasonId);
        }
        $item->SetRoundTrip($this->RoundTrip);
        if(FieldUtils::STRING_IS_DEFINED($this->Class)) $item->setClass($this->Class);
        if(FieldUtils::STRING_IS_DEFINED($this->TicketType)) $item->setTicketType($this->TicketType);
        if(FieldUtils::STRING_IS_DEFINED($this->TripLength)) $item->setTripLength($this->TripLength);
        if(FieldUtils::STRING_IS_DEFINED($this->Display)) $item->setDisplay($this->Display);


        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

}