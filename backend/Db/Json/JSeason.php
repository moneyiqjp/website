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


class JSeason implements JSONInterface
{
    public $SeasonId;
    public $PointSystem;
    public $Name;
    public $Type;
    public $From;
    public $To;
    public $UpdateTime;
    public $UpdateUser;

    public static function CREATE_FROM_DB(\Season $item) {
        $mine = new JSeason();
        $mine->SeasonId     = $item->getSeasonId();
        $mine->PointSystem  = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
        $mine->Name         = $item->getName();
        $mine->Type         = $item->getType();
        $mine->From         = $item->getFrom();
        $mine->To           = $item->getTo();
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
        $mine = new JSeason();
        if(ArrayUtils::KEY_EXISTS($data,'SeasonId')) {
                $mine->SeasonId = $data['SeasonId'];
                $item = $mine->tryLoadFromDB();
                if(!is_null($item)) $mine = JSeason::CREATE_FROM_DB($item);
        }
        if(ArrayUtils::KEY_EXISTS($data,'PointSystem')) {
                $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'Type')) $mine->Type = JCity::CREATE_FROM_ARRAY($data['Type']);
        if(ArrayUtils::KEY_EXISTS($data,'From')) $mine->From = new \DateTime($data['From']);
        if(ArrayUtils::KEY_EXISTS($data,'To')) $mine->To = new \DateTime($data['To']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDb()
    {
        return $this->toDB()->save() > 0;
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->SeasonId)) {
            $item = \SeasonQuery::create()->findPk($this->SeasonId);
            if(!is_null($item)) return $item;
        }
        return new \Season();
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();

        return $this->updateDB($item);
    }

    public function updateDB(\Season &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->SeasonId)) $item->setSeasonId($this->SeasonId);

        if(!is_null($this->PointSystem) && FieldUtils::ID_IS_DEFINED($this->PointSystem->PointSystemId)) {
            $item->setPointSystemId($this->PointSystem->PointSystemId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Type)) $item->setType($this->Type);
        if(!is_null($this->From)) $item->setFrom($this->From);
        if(!is_null($this->To)) $item->setFrom($this->To);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }
}