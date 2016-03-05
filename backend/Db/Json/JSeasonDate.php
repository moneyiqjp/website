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


class JSeasonDate implements JSONInterface, JSONDisplay
{
    public $SeasonDateId;
    public $Season;
    public $Zone;
    public $From;
    public $To;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JSeason("
            . $this->SeasonDateId . "|"
            . $this->Season->Name . "|"
            . $this->Zone->Name . "|"
            . $this->From . "|"
            . $this->To . "|"
            . $this->UpdateTime  . "|"
        . ") ";
    }

    public static function CREATE_FROM_DB(\SeasonDate $item) {
        $mine = new JSeasonDate();
        $mine->SeasonDateId = $item->getSeasonDateId();
        $mine->Season = JSeason::CREATE_FROM_DB($item->getSeason());
        $mine->Zone     = JZone::CREATE_FROM_DB($item->getZone());
        $mine->From         = FieldUtils::DateTimeToDateString($item->getFromDate());
        $mine->To           = FieldUtils::DateTimeToDateString($item->getToDate());
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }


    public static function VALIDATE(JSeasonDate $mine) {
        if(is_null($mine->Zone) || !FieldUtils::ID_IS_DEFINED($mine->Zone->ZoneId))
            throw new JSONException("Did not receive 'Zone', which is required" . $mine);
        if(is_null($mine->Season) || !FieldUtils::ID_IS_DEFINED($mine->Season->SeasonId))
            throw new JSONException("Did not receive 'Season', which is required" . $mine);
        if(is_null($mine->From) || strlen($mine->From)<=0)
            throw new JSONException("Did not receive 'From' field, which is required" . $mine);
        if(is_null($mine->To) || strlen($mine->To)<=0)
            throw new JSONException("Did not receive 'To' field, which is required" . $mine);
        return $mine;
    }

    public function isValid(JSeasonDate $mine) {
        return !(is_null($mine->From) || strlen($mine->From)<=0)
                && !(is_null($mine->To) || strlen($mine->To)<=0);
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JSeasonDate();
        if(ArrayUtils::KEY_EXISTS($data,'SeasonDateId')) {
            $mine->SeasonDateId = $data['SeasonDateId'];
            $item = $mine->tryLoadFromDB();
            if(!is_null($item)) {
                $mine = JSeasonDate::CREATE_FROM_DB($item);
            }
        }

        if(ArrayUtils::KEY_EXISTS($data,'Season')) {
            $mine->Season = JSeason::CREATE_FROM_ARRAY($data['Season']);
        }

        if(ArrayUtils::KEY_EXISTS($data,'Zone')) {
                $mine->Zone = JZone::CREATE_FROM_ARRAY($data['Zone']);
        }

        if(ArrayUtils::KEY_EXISTS($data,'From')) {
            $mine->From = FieldUtils::DateTimeToDateString(new \DateTime($data['From']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'To')) {
            $mine->To = FieldUtils::DateTimeToDateString(new \DateTime($data['To']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JSeasonDate::VALIDATE($mine);
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

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->SeasonDateId)) {
            $item = \SeasonDateQuery::create()->findOneBySeasonDateId($this->SeasonDateId);
            return $item;
        }
        return null;
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();
        if(is_null($item)) $item = new \SeasonDate();
        return $this->updateDB($item);
    }

    public function updateDB(\SeasonDate &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->SeasonDateId)) $item->setSeasonDateId($this->SeasonDateId);

        if(!is_null($this->Season) && FieldUtils::ID_IS_DEFINED($this->Season->SeasonId)) {
            $item->setSeasonId($this->Season->SeasonId);
        }

        if(!is_null($this->Zone) && FieldUtils::ID_IS_DEFINED($this->Zone->ZoneId)) {
            $item->setZoneId($this->Zone->ZoneId);
        }

        if(!is_null($this->From)) { $item->setFromDate($this->From); } else { throw new JSONException("No From defined" . $this); }
        if(!is_null($this->To)) $item->setToDate($this->To);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getDisplay() {
        return $this->parseForDisplay("%SEASONFROM% %SEASONTO%");
    }

    public function parseForDisplay($display) {
        $display = FieldUtils::replaceIfAvailable($display, "%SEASONFROM%", $this->From);
        $display = FieldUtils::replaceIfAvailable($display, "%SEASONTO%", $this->To);

        return $display;
    }
}