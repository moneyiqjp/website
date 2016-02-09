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


class JMilage implements JSONInterface
{
    private $MileageId;
    private $Store;
    private $Trip;
    private $RequiredMiles;
    private $ValueInYen;
    private $Display;
    private $UpdateTime;
    private $UpdateUser;

    /**
     * @return mixed
     */
    public function getMileageId()
    {
        return $this->MileageId;
    }
    /**
     * @return mixed
     */
    public function getStore()
    {
        return $this->Store;
    }
    /**
     * @return mixed
     */
    public function getTrip()
    {
        return $this->Trip;
    }
    /**
     * @return mixed
     */
    public function getRequiredMiles()
    {
        return $this->RequiredMiles;
    }
    /**
     * @return mixed
     */
    public function getValueInYen()
    {
        return $this->ValueInYen;
    }
    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->Display;
    }
    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->UpdateTime;
    }
    /**
     * @return mixed
     */
    public function getUpdateUser()
    {
        return $this->UpdateUser;
    }


    public static function CREATE_FROM_DB(\Milage $item) {
        $mine = new JMilage();
        $mine->MileageId = $item->getMilageId();
        $mine->Store = JStore::CREATE_FROM_DB($item->getStore());
        $mine->Trip = JTrip::CREATE_FROM_DB($item->getTrip());
        $mine->RequiredMiles = $item->getRequiredMiles();
        $mine->ValueInYen = $item->getValueInYen()
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
        $mine = new JMilage();
        if(ArrayUtils::KEY_EXISTS($data,'MileageId')) $mine->MileageId = $data['MileageId'];
        if(ArrayUtils::KEY_EXISTS($data,'Store')) $mine->Store = JStore::CREATE_FROM_ARRAY($data['Store']);
        if(ArrayUtils::KEY_EXISTS($data,'Trip')) $mine->Trip = JTrip::CREATE_FROM_ARRAY($data['Trip']);
        if(ArrayUtils::KEY_EXISTS($data,'RequiredMiles')) $mine->RequiredMiles = $data['RequiredMiles'];
        if(ArrayUtils::KEY_EXISTS($data,'ValueInYen')) $mine->ValueInYen = $data['ValueInYen'];
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

        if(FieldUtils::ID_IS_DEFINED($this->MileageId)) {
            $item = \MilageQuery::create()->findByMilageId($this->MileageId);
            if(!is_null($item)) return $item;
        }
        return new \Milage();
    }

    public function toDB()
    {
        return $this->updateDB($this->tryLoadFromDB());
    }

    public function updateDB(\Milage &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->MileageId)) $item->setMilageId($this->MileageId);

        if(!is_null($this->Store) && FieldUtils::ID_IS_DEFINED( $this->Store->StoreId)) {
            $item->setStoreId($this->Store->StoreId);
        }
        if(!is_null($this->Trip) && FieldUtils::ID_IS_DEFINED( $this->Trip->TripId)) {
            $item->setTripId($this->Trip->TripId);
        }
        if(FieldUtils::NUMBER_IS_DEFINED($this->RequiredMiles)) $item->setRequiredMiles($this->RequiredMiles);
        if(FieldUtils::NUMBER_IS_DEFINED($this->ValueInYen)) $item->setValueInYen($this->ValueInYen);
        if(FieldUtils::STRING_IS_DEFINED($this->Display)) $item->setDisplay($this->Display);


        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }
}