<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/11/2015
 * Time: 7:35 AM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;

class JGeneralRestriction  implements JSONInterface {
    public $GeneralRestrictionId;
    public $Persona;
    public $RestrictionType;
    public $Comparator;
    public $Value;
    public $Priority;
    public $UpdateTime;
    public $UpdateUser;


    public function JGeneralRestriction() {
        return $this;
    }

    public function toString(){
        return "(" . $this->GeneralRestrictionId . ", " . $this->Persona->PersonaId . ", " .$this->RestrictionType->RestrictionTypeId . ", " .$this->Comparator . ", " .$this->Value . ", " .
                $this->Priority . ", " . $this->UpdateTime . ", " . $this->UpdateUser . ")";
    }

    public function GenerateKey() {
        if(!$this->isValid() && !is_null($this->Persona)) {
            return $this->Persona->PersonaId . "_";
        }
        return $this->Persona->PersonaId . "_" . $this->RestrictionType->RestrictionTypeId;
    }

    private static function SPLIT_ID($id) {
        $ids = explode("_",$id);
        if(!is_array($ids) || count($ids) <> 2) throw new \Exception("invalid id returned, require #_# got " . $id);
        if(strlen($ids[0])<=0) throw new \Exception("No persona id specified (" . $id . ")");
        if(strlen($ids[1])<=0) throw new \Exception("No RestrictionType id specified (" . $id . ")");

        return $ids;
    }

    public static function LOAD_FROM_ID($id) {
        $ids = JGeneralRestriction::SPLIT_ID($id);
        foreach( (new \PersonaRestrictionQuery())->findByPrimaryKeys($ids[0],$ids[1]) as $restriction)
        {
            return $restriction;
        }

        throw new \Exception ("No existing Restriction found for Persona " . $ids[0] . ", RestrictionType " . $ids[1]);
    }

    public static function CREATE_FROM_DB(\PersonaRestriction $item)
    {
        $mine = new JGeneralRestriction();
        if(!FieldUtils::ID_IS_DEFINED($item->getPersonaId())) throw new \Exception("JGeneralRestriction: No PersonaId defined");
        $mine->Persona = JPersona::CREATE_FROM_DB($item->getPersona());
        $mine->Priority = $item->getPriorityId();
        if(!FieldUtils::ID_IS_DEFINED($item->getRestrictionTypeId())) throw new \Exception("JGeneralRestriction: No PersonaId defined");
        $mine->RestrictionType = JRestrictionType::CREATE_FROM_DB($item->getRestrictionType());
        $mine->Comparator = $item->getComparator();


        $mine->GeneralRestrictionId = $mine->GenerateKey();
        if(!is_null($item->getValue())) $mine->Value = $item->getValue();

        if(!is_null($item->getUpdateTime())) $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        if(FieldUtils::STRING_IS_DEFINED($item->getUpdateUser())) $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JGeneralRestriction();

        if(!ArrayUtils::KEY_EXISTS($data,'Persona') && !ArrayUtils::KEY_EXISTS($data,'PersonaId')) throw new \Exception("Failed to find mandatory field Persona");
        if(ArrayUtils::KEY_EXISTS($data,'PersonaId')){
            $mine->Persona = JPersona::CREATE_FROM_DB( (new \PersonaQuery())->findPk($data["PersonaId"]));
        } else {
            $mine->Persona = JPersona::CREATE_FROM_ARRAY($data['Persona']);
        }
        if(!ArrayUtils::KEY_EXISTS($data,'RestrictionType') && !ArrayUtils::KEY_EXISTS($data,'RestrictionTypeId') ) throw new \Exception("Failed to find mandatory field RestrictionType");
        if(ArrayUtils::KEY_EXISTS($data,'RestrictionType')) {
            $mine->RestrictionType = JRestrictionType::CREATE_FROM_ARRAY($data["RestrictionType"]);
        } else {
            $mine->RestrictionType = JRestrictionType::CREATE_FROM_DB( (new \RestrictionTypeQuery())->findPk($data["RestrictionTypeId"]) );
        }

        if(ArrayUtils::KEY_EXISTS($data,'Comparator')) $mine->Comparator = $data['Comparator'];
        if(ArrayUtils::KEY_EXISTS($data,'Priority')) $mine->Priority = $data['Priority'];
        if(ArrayUtils::KEY_EXISTS($data,'Value')) $mine->Value = $data['Value'];

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function saveToDb() {
        $pr = $this->toDB();


        return $pr->save() > 0;
    }

    public function isValid() {
        return !is_null($this->Persona) && FieldUtils::ID_IS_DEFINED($this->Persona->PersonaId) &&
            !is_null($this->RestrictionType) && FieldUtils::ID_IS_DEFINED($this->RestrictionType->RestrictionTypeId);
    }

    public function tryLoadFromDB() {
        if(!$this->isValid()) return new \PersonaRestriction();
        $this->GeneralRestrictionId = $this->GenerateKey();

        foreach( (new \PersonaRestrictionQuery())->filterByPersonaId($this->Persona->PersonaId)
                     ->filterByRestrictionTypeId($this->RestrictionType->RestrictionTypeId)->find() as $restriction)
        {
            return $restriction;
        }

        return new \PersonaRestriction();
    }

    public function toDB() {
        $pr = $this->tryLoadFromDB();
        $item = $this->updateDB($pr);
        return $item;
    }

    public function updateDB(\PersonaRestriction &$item) {
        if(!is_null($this->Persona)) {
            if (FieldUtils::ID_IS_DEFINED($this->Persona->PersonaId)) $item->setPersonaId($this->Persona->PersonaId);
        }

        if(!is_null($this->RestrictionType)) {
            if(FieldUtils::ID_IS_DEFINED($this->RestrictionType->RestrictionTypeId)) {
                $item->setRestrictionTypeId($this->RestrictionType->RestrictionTypeId);
            }
        }

        if(FieldUtils::STRING_IS_DEFINED($this->Comparator)) $item->setComparator($this->Comparator);
        if(FieldUtils::STRING_IS_DEFINED($this->Value)) $item->setValue($this->Value);

        if(FieldUtils::NUMBER_IS_DEFINED($this->Priority)) $item->setPriorityId($this->Priority);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function getRestriction() {
        return JRestriction::CREATE_PERSONA($this);
    }




}