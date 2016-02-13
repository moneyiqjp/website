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


class JFlightCost implements JSONInterface
{
    public $FlightCostId;
    public $RetrievalDate;
    public $PointSystem;
    public $MileageType;
    public $Trip;
    public $FareType;
    public $DepartDate;
    public $DepartFlightNo;
    public $ReturnDate;
    public $ReturnFlightNo;
    public $Reference;
    public $Price;


    public static function CREATE_FROM_DB(\FlightCost $item) {
        $mine = new JFlightCost();
        $mine->FlightCostId = $item->getFlightCostId();
        $mine->RetrievalDate =  $item->getRetrievalDate()->format(\DateTime::ISO8601);
        $mine->Trip = JTrip::CREATE_FROM_DB($item->getTrip());
        $mine->MileageType = JMileageType::CREATE_FROM_DB($item->getMileageType());
        $mine->PointSystem = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
        $mine->FareType = $item->getFareType();
        $mine->DepartDate = $item->getDepartDate();
        $mine->DepartFlightNo = $item->getDepartFlightNo();
        $mine->ReturnDate = $item->getReturnDate();
        $mine->ReturnFlightNo = $item->getReturnFlightNo();
        $mine->Reference = $item->getReference();
        $mine->Price = $item->getPrice();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JFlightCost();
        if(ArrayUtils::KEY_EXISTS($data,'FlightCostId')) {
            $mine->FlightCostId = $data['FlightCostId'];
            $item = $mine->tryLoadFromDB();
            if(!is_null($item)) $mine = JFlightCost::CREATE_FROM_DB($item);
        }
        if(ArrayUtils::KEY_EXISTS($data,'Trip')) $mine->Trip = JTrip::CREATE_FROM_ARRAY($data['Trip']);
        if(ArrayUtils::KEY_EXISTS($data,'PointSystem')) {
            $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'MileageType')) {
            $mine->MileageType = JMileageType::CREATE_FROM_ARRAY($data['MileageType']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'FareType')) $mine->FareType = $data['FareType'];
        if(ArrayUtils::KEY_EXISTS($data,'DepartFlightNo')) $mine->DepartFlightNo = $data['DepartFlightNo'];
        if(ArrayUtils::KEY_EXISTS($data,'ReturnFlightNo')) $mine->ReturnFlightNo = $data['ReturnFlightNo'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];
        if(ArrayUtils::KEY_EXISTS($data,'Price')) $mine->Price = $data['Price'];

        if(ArrayUtils::KEY_EXISTS($data,'RetrievalDate')) $mine->RetrievalDate = new \DateTime($data['RetrievalDate']);
        if(ArrayUtils::KEY_EXISTS($data,'DepartDate')) $mine->DepartDate = new \DateTime($data['DepartDate']);
        if(ArrayUtils::KEY_EXISTS($data,'ReturnDate')) $mine->ReturnDate = new \DateTime($data['ReturnDate']);



        return $mine;
    }

    public function saveToDb()
    {
        return $this->toDB()->save() > 0;
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->FlightCostId)) {
            $item = \FlightCostQuery::create()->findByFlightCostId($this->FlightCostId);
            if(!is_null($item)) return $item;
        }
        return new \FlightCost();
    }

    public function toDB()
    {
        $item = $this->tryLoadFromDB();
        return $this->updateDB($item);
    }

    public function updateDB(\FlightCost &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->FlightCostId)) $item->setFlightCostId($this->FlightCostId);

        if(!is_null($this->Trip) && FieldUtils::ID_IS_DEFINED( $this->Trip->TripId)) {
            $item->setTripId($this->Trip->TripId);
        }
        if(!is_null($this->PointSystem) && FieldUtils::ID_IS_DEFINED( $this->PointSystem->PointSystemId)) {
            $item->setPointSystemId($this->PointSystem->PointSystemId);
        }
        if(!is_null($this->MileageType) && FieldUtils::ID_IS_DEFINED( $this->MileageType->MileageTypeId)) {
            $item->setMileageTypeId($this->MileageType->MileageTypeId);
        }

        if(FieldUtils::STRING_IS_DEFINED($this->FareType)) $item->setFareType($this->FareType);
        if(FieldUtils::STRING_IS_DEFINED($this->DepartFlightNo)) $item->setDepartFlightNo($this->DepartFlightNo);
        if(FieldUtils::STRING_IS_DEFINED($this->ReturnFlightNo)) $item->setReturnFlightNo($this->ReturnFlightNo);
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Price)) $item->setPrice($this->Price);

        if(!is_null($this->RetrievalDate)) $item->setRetrievalDate($this->ReturnDate);
        if(!is_null($this->DepartDate)) $item->setDepartDate($this->DepartDate);
        if(!is_null($this->ReturnDate)) $item->setReturnDate($this->ReturnDate);

        return $item;
    }

}