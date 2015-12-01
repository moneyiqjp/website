<?php
namespace Db\CRUD;


/* PaymentType */
use Db\Core\PersonaMapping;
use Db\Core\CreditCard;
use Db\Core\SimpleStore;
use Db\Core\SimpleCardFeatureType;
use Db\Utility\FieldUtils;

function GetAllPersonas() {
    return PersonaMapping::CREATE()->Persona;
}
function GetAllScenes() {
    return PersonaMapping::CREATESCENEMAPPING()->Scene;
}

function GetAllCards() {
    $result = array();
    $q = new  \CreditCardQuery();
    foreach($q->orderByCreditCardId()->find() as $ccs)
    {
        if($ccs->getIsactive())
            array_push($result, CreditCard::fromCreditCardObject($ccs));
    }
    return $result;
}
function GetAllStores() {
    $result = array();
    foreach( (new \StoreQuery())->orderByStoreCategoryId()->find() as $store)
    {
        array_push($result, SimpleStore::fromStoreObject($store));
    }

    return $result;
}

function GetAllFeatures() {
    $result = array();
    foreach( (new \CardFeatureTypeQuery())->orderByCategory()->find() as $ft)
    {
        if(strtolower($ft->getCategory())!="network") {
            array_push($result, SimpleCardFeatureType::fromCardFeatureTypeObject($ft));
        }
    }

    return $result;
}

function AddEmailToMailingList($email) {
    if(is_null($email) || !FieldUtils::STRING_IS_DEFINED($email)) throw new \Exception("No email specified");

    $mailObjects = (new \MailinglistQuery())->findByEmail($email);
    if(isset($mailObjects)&&count($mailObjects)>0)
        return array(
            "status" => "OK",
            "message" => "Email address " . $email . " already exists (" . count($mailObjects) . ")"
        );

    $mail = new \Mailinglist();
    $mail->setEmail($email);
    $mail->setUpdateTime(new \DateTime());
    if($mail->save()<=0) throw new \Exception("Failed to save email (" . $email . ")");

    //return \Db\Utility\MailChimp::subscribe("benfries@gmail.com");


    return array(
        "status" => "OK",
        "message" => "Added email $email to mailinglist"
    );
}

?>