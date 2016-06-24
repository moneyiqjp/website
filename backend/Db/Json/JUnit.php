<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/21
 * Time: 16:05
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;



class JUnit  implements JSONInterface
{
    public $UnitId;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;

    public function JUnit()
    {
    }

    public static function CREATE_FROM_DB(\Unit $item)
    {
        $mine = new JUnit();
        $mine->UnitId = $item->getUnitId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
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
        $mine = new JUnit();
        if(ArrayUtils::KEY_EXISTS($data,'UnitId')) {
            $mine->UnitId = $data['UnitId'];
            $item=(new \UnitQuery())->findPk($mine->UnitId);
            if(!is_null($item)) $mine = JUnit::CREATE_FROM_DB($item);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];

        if (ArrayUtils::KEY_EXISTS($data, 'UpdateTime'    )) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDB() {
        return $this->toDB()->save();
    }

    public function toDB() {
        $usage = new \Unit();
        if(FieldUtils::ID_IS_DEFINED($this->UnitId)) {
            $usage=(new \UnitQuery())->findPk($this->UnitId);
            if(is_null($usage)) $usage = new \Unit();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\Unit &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->UnitId)) $item->setUnitId($this->UnitId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function toJObject()
    {
        return JObject::CREATE($this->Name, $this->UnitId);
    }

    public static function fromJObject(JObject $reward)
    {
        $rewq = \UnitQuery::create();

        if (!is_null($reward->value)) {
            foreach ($rewq->findPk($reward->value) as $re) {
                return JUnit::CREATE_FROM_DB($re);
            }
        }

        foreach ($rewq->findByName($reward->label) as $re) {
            return JUnit::CREATE_FROM_DB($re);
        }

        throw new \Exception("No Unit found for JObject");
    }
}
