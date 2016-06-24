/**
 * Created by Work on 5/30/2016.
 */
function queryIdValMap(query, fromval, toval) {
    var idValList = [];
    var tmp = $.ajax({
        url: query,
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(!tmp) { return idValList; }
    var jason = JSON.parse(tmp);
    if(jason["data"]!=undefined) {
        var JSONReply = jason["data"];
        for (var index = 0; index < JSONReply.length; ++index) {
            idValList.push({
                value: JSONReply[index][fromval],
                label: JSONReply[index][toval]
            })
        }
    }
    return idValList;
}

function getTrips() {
    var idValList = [];
    var tmp = $.ajax({
        url: '../backend/crud/trip/all',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(!tmp) { return idValList; }
    var jason = JSON.parse(tmp);
    if(jason["data"]!=undefined) {
        var JSONReply = jason["data"];
        for (var index = 0; index < JSONReply.length; ++index) {
            idValList.push({
                value: JSONReply[index]["TripId"],
                label: JSONReply[index]["CityFrom"]["Name"] + "-" + JSONReply[index]["CityTo"]["Name"]
            })
        }
    }
    return idValList;
}

function getMileageType() {
    var idValList = [];
    var tmp = $.ajax({
        url: '../backend/crud/mileage/type/all',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(!tmp) { return idValList; }
    var jason = JSON.parse(tmp);
    if(jason["data"]!=undefined) {
        var JSONReply = jason["data"];
        for (var index = 0; index < JSONReply.length; ++index) {
            idValList.push({
                value: JSONReply[index]["MileageTypeId"],
                label: JSONReply[index]["SeasonType"]["Name"] + "/" + "/" + JSONReply[index]["Class"] + "/" + JSONReply[index]["TicketType"]
            })
        }
    }
    return idValList;
}

function getRewardCategories(){
    var rewardCategories = [];
    tmp = $.ajax({
        url: '../backend/crud/reward/category/all',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(tmp) {
        jason = JSON.parse(tmp);
        if(jason["data"]!=undefined) {
            tmpStore = jason["data"];
            for (index = 0; index < tmpStore.length; ++index) {
                rewardCategories.push({
                    value: tmpStore[index]["RewardCategoryId"],
                    label: tmpStore[index]["Name"] + "-" + tmpStore[index]["SubCategory"]
                })
            }
        }
    }
    return rewardCategories;
}

function getStores(){

    var category = [];
    var stores = [];
    tmp = $.ajax({
        url: '../backend/crud/store/all',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(tmp) {
        jason = JSON.parse(tmp);
        if(jason["data"]!=undefined) {
            tmpStore = jason["data"];
            for (index = 0; index < tmpStore.length; ++index) {
                category = tmpStore[index]["StoreCategory"];
                stores.push({
                    value: tmpStore[index]["StoreId"],
                    label: category["Name"] + " - " + tmpStore[index]["StoreName"]
                });
            }
        }
    }
    return stores;
}

function getCreditCards(){
    var creditCards = [];
    tmp = $.ajax({
        url: '../backend/display/creditcards',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(tmp) {
        var $mtmp = "";
        jason = JSON.parse(tmp);
        if(jason["data"]!=undefined) {
            tmpStore = jason["data"];
            for (index = 0; index < tmpStore.length; ++index) {
                if(tmpStore[index]["issuer"]!=null) {
                    $mtmp = "(" + tmpStore[index]["issuer"]["name"] +  ")";
                }
                creditCards.push({
                    value: tmpStore[index]["credit_card_id"],
                    label: tmpStore[index]["name"] + $mtmp
                })
            }
        }
    }
    return creditCards;
}

function getInsuranceType() {
    var insuranceTypes = [];
    tmp = $.ajax({
        url: '../backend/crud/insurance/type/all',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(tmp) {
        jason = JSON.parse(tmp);
        if(jason["data"]!=undefined) {
            tmpStore = jason["data"];
            for (index = 0; index < tmpStore.length; ++index) {
                insuranceTypes.push({
                    value: tmpStore[index]["InsuranceTypeId"],
                    label: tmpStore[index]["TypeName"] + " - " + tmpStore[index]["SubtypeName"] + " - " + tmpStore[index]["Region"]
                })
            }
        }
    }
    return insuranceTypes;
}


function arrayValuesInString(toCheck, inArray)
{
    if(inArray == null || inArray.length==0)
        return false;
    for(var i=0;i<inArray.length;i++)
    {
        if(toCheck.indexOf(inArray[i]) > -1) {
            return true;
        }
    }
    return false;
}

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}

function isoTodayString(){
    var d = new Date();
    var pad = function (n){
        return n<10 ? '0'+n : n
    };
    return d.getUTCFullYear()+'-'
        + pad(d.getUTCMonth()+1)+'-'
        + pad(d.getUTCDate())
}

function isoMaxString(){
    return '9999-12-31';
}