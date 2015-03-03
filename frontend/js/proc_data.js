var cardsArr;
var selectedFunctions = [];

function loadCards() {
    var xmlhttp = new XMLHttpRequest();
    //var url = "http://10.194.76.61/js/cards.txt";//cardif
    var url = "http://192.168.0.15/js/cards.txt"; //home
    //var url = "http://172.20.10.2/js/cards.txt"; //mobile
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            cardsArr = jQuery.parseJSON(xmlhttp.responseText);
            calculatePointValue();
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

$(document).ready(function () {
    $("#accordion").accordion({heightStyle: "content", collapsible: true});
    $(".btnset").buttonset();
    $(".multichecks").dropdownchecklist({icon: {}, emptyText: "選択してください", minWidth: 150, onComplete: function (selector) {
            calculatePointValue();
        }});
    var origContent2 = $("#step2").html();
    $("#slider-range-min").slider({
        range: "min",
        value: 0,
        min: 0,
        max: 50,
        slide: function (event, ui) {
            $("#amount").val(ui.value + "万円");
        },
        stop: function (event, ui) {
            if ($("#search_box").css("visibility") === "visible") {
                calculatePointValue();
            } else {
                $("#search_box").css("visibility", "visible");
                $("#search_box").css("height", "auto");
            }
            $("#accordion").accordion({active: false});
            $("#step2").html(origContent2 + '（設定された金額：' + $("#amount").val() + '）');
        }
    });
    $("#amount").val($("#slider-range-min").slider("value") + "万円");
    var origContent1 = $("#step1").html();
    $("#btnset1 input:checkbox").click(function () {
        selectedFunctions = [];
        var headerContent = " ";
        $("#btnset1 input:checkbox:checked").each(function () {
            cbLabel = $("label[for='" + $(this).attr("id") + "']").text();
            headerContent += cbLabel + " | ";
            selectedFunctions.push($(this).attr("id"));
        });
        if (headerContent !== " ") {
            headerContent = '（選択された機能：' + headerContent.slice(0, -2) + '）';
        }
        $("#step1").html(origContent1 + headerContent);
        if ($("#search_box").css("visibility") === "visible")
        {
            calculatePointValue();
        }
    });
    loadCards();
});

function renderCards() {
    var out = "";
    var i;

    if (cardsArr.length > 0) {
        out += '<table id="top_cards">\n\
        <tr><th>カード</th>\
        <th>特徴</th>\
        <th>ポイント還元率<br>キャンペーンポイント</th>\
        <th>店舗割引</th>\
        <th>年会費<br>ショッピング利率</th>\
        <th>1年もらえるポイント<br>の相当額</th>\
        </tr>';
        for (i = 0; i < cardsArr.length; i++) {
            var features = "";
            var featureIds = [];
            var selectionIdx;
            var brands = "";
            var pointsData = "";
            var discountData = "";
            var annualMembership = "";
            var j;
            var k;
            var l;
            var m;
            for (j = 0; j < cardsArr[i].features.length; j++) {
                features += '<i class = "fa fa-check"> </i> ' + cardsArr[i].features[j].text;
                featureIds.push(cardsArr[i].features[j].id);
                if (j + 1 !== cardsArr[i].features.length) {
                    features += '<br>';
                }
            }
            //check if all selected functions are available on a card
            var functionCheck = 0;
            for (selectionIdx = 0; selectionIdx < selectedFunctions.length; selectionIdx++) {
                var checkFeatures = featureIds.indexOf(selectedFunctions[selectionIdx]);
                if (checkFeatures === -1) {
                    functionCheck = -1;
                    break;
                }
            }
            //skip this card is feature selected by user is unavailable
            if (functionCheck === -1)
            {
                continue;
            }

            for (k = 0; k < cardsArr[i].supportedBrands.length; k++) {
                brands += cardsArr[i].supportedBrands[k];
                if (k + 1 !== cardsArr[i].supportedBrands.length) {
                    brands += " | ";
                }
            }

            cardsArr[i].pointsData.sort(function (a, b) {
                var x = a.points;
                var y = b.points;
                if (x < y)
                    return 1;
                if (x > y)
                    return -1;
                return 0;
            });

            cardsArr[i].discountData.sort(function (a, b) {
                var x = a.points;
                var y = b.points;
                if (x < y)
                    return 1;
                if (x > y)
                    return -1;
                return 0;
            });

            for (l = 0; l < cardsArr[i].pointsData.length; l++) {
                if (l === 0) {
                    pointsData += '<table id="shop_points">';
                }
                pointsData += '<tr><td>' + cardsArr[i].pointsData[l].store + '</td><td>'
                        + cardsArr[i].pointsData[l].points * 100 + '%</td></tr>';
                if (l + 1 === cardsArr[i].pointsData.length) {
                    pointsData += '<tr><td><span style="font-size:12px;">ポイント有効期間:</span></td><td>' + cardsArr[i].pointsExpiryPeriod + '年</td></tr></table>';
                }
            }
            for (m = 0; m < cardsArr[i].discountData.length; m++) {
                if (m === 0) {
                    discountData += '<table id="discount_points">';
                }
                discountData += '<tr><td>' + cardsArr[i].discountData[m].store + '</td><td>'
                        + cardsArr[i].discountData[m].points * 100 + '%</td></tr>';
                if (m + 1 === cardsArr[i].discountData.length) {
                    discountData += "</table>";
                }
            }
            annualMembership += '<table id="annual_membership">\
            <tr><td style="font-weight:bold;">年会費</td><td></td></tr>\
            <tr><td>１年目：</td><td>' + cardsArr[i].annualFeeFirstYear + '円</td></tr>\
            <tr><td>2年目以降：</td><td>' + cardsArr[i].annualFeeSubseqYear + '円</td></tr></table>';
            out += '<tr>\
        <td id = "top_card_image"> <img src = "' + cardsArr[i].cardImg + '" alt = "" > </td>\
        <td>' + features + '</td>\
        <td>' + pointsData + '</td>\
        <td>' + discountData + '</td>\
        <td>' + annualMembership + '</td>\
        <td style="text-align:center;color:#339966;">ポイント<br><span style="font-size:1.25em;font-weight:bold;">' + addCommas(cardsArr[i].totalPointVal) + '円分</span></td>\
        </tr>\
        <tr class = "alt" >\
        <td> <div class = "campaign_header">' + cardsArr[i].campaignText + '</div></td >\
        <td>' + brands + '</td>\
        <td><span style="font-weight:bold;font-size:12px;">キャンペーンポイント： </span>' + addCommas(cardsArr[i].campaignPoints) + '</td>\
        <td></td>\
        <td>利率： ' + cardsArr[i].interestShopping + '</td>\
        <td><a class="details_btn" href="' + cardsArr[i].affiliateUrl + '" target="_blank">詳細を見る <i class = "fa fa-angle-double-right"></i></a></td>\
        </tr>';
        }
        out += '</table>';
    }
    else {
        out += '<p>no cards</p>';
    }
    $("#section").html(out);
}

function calculatePointValue() {
    var monthlySpend = $("#amount").val().replace("万円", "") * 10000;
    var groceryStores = $("#s1").val();
    var shops = $("#s2").val();
    var entertainTravel = $("#s3").val();
    var carLife = $("#s4").val();
    var mergedArr = [];
    mergedArr = mergedArr.concat(groceryStores, shops, entertainTravel, carLife);
    mergedArr = jQuery.grep(mergedArr, function (n) {
        return (n);
    });
    var numberOfShops = mergedArr.length;
    var spendPerStore;
    var remainingSpend;
    //if more than 10 shops selected, divide spend by # of shops, else 10% per store
    if (numberOfShops > 9) {
        spendPerStore = monthlySpend / numberOfShops;
        remainingSpend = 0;
    } else {
        spendPerStore = monthlySpend * 0.1;
        remainingSpend = monthlySpend - (spendPerStore * numberOfShops);
    }
    var i;
    //debug
    console.log("spendPerStore: " + spendPerStore);
    console.log("remainingSpend: " + remainingSpend);
    console.log("numberOfShops: " + numberOfShops);
    console.log("mergedArr: " + mergedArr);
    //end debug

    for (i = 0; i < cardsArr.length; i++) {
        var pointValue = 0;
        var shopPointValue = 0;
        var discountValue = 0;
        var campaignPoints = parseInt(cardsArr[i].campaignPoints);
        if (isNaN(campaignPoints)) {
            campaignPoints = 0;
        }
        var j;
        var k;
        //calculate total store points based on user selection and adding standard spend
        for (j = 0; j < cardsArr[i].pointsData.length; j++) {
            var store = cardsArr[i].pointsData[j].store;
            if (store === "標準ポイント") {
                shopPointValue += Math.round(remainingSpend * cardsArr[i].pointsData[j].points);
            }
            else {
                var indStore = mergedArr.indexOf(store);
                if (indStore !== -1) {
                    shopPointValue += Math.round(spendPerStore * cardsArr[i].pointsData[j].points);
                }
            }
        }
//calculate total discount value based on user selection        
        for (k = 0; k < cardsArr[k].discountData.length; k++) {
            var indStore = mergedArr.indexOf(cardsArr[i].discountData[k].store);
            if (indStore !== -1) {
                discountValue += Math.round(spendPerStore * cardsArr[i].discountData[k].points * cardsArr[i].discountData[k].multiple);
            }
        }
        pointValue = shopPointValue * 12 + discountValue * 12 + campaignPoints;
        cardsArr[i].totalPointVal = pointValue;
    }

    cardsArr.sort(function (a, b) {
        var x = a.totalPointVal;
        var y = b.totalPointVal;
        if (x < y)
            return 1;
        if (x > y)
            return -1;
        return 0;
    });
    renderCards();
}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}