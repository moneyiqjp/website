var cardsArr;
var cardsArrConstant;
var shopsArr;
var shopAllocations = [];
var selectedScenes = [];
var selectedRewards = [];
var selectedRewardsFromScenes = [];
var selectedPersona = "";
var initListDisp = 0;

function loadCards() {
    var xmlhttp = new XMLHttpRequest();
    var url = "/backend/allcards";
    //var url = hostName + "/js/allcards.json";
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            cardsArr = jQuery.parseJSON(xmlhttp.responseText);
            cardsArrConstant = cardsArr.slice(0);
            loadPersonaCards();
            calculatePointValue();
            loadPersona();
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function loadShops($) {
    var xmlhttp = new XMLHttpRequest();
    var urlStores = "/backend/allscenes";
    //var urlStores = hostName + "/js/allscenes.txt";
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var shopsData = jQuery.parseJSON(xmlhttp.responseText);
            shopsArr = shopsData.data;
            populateFilters();
            loadCards();
        }
    };
    xmlhttp.open("GET", urlStores, true);
    xmlhttp.send();
}

function populateFilters() {

    shopsArr.sort(function (a, b) {
        return b.Id - a.Id;
    });

    var i;
    for (i = 0; i < shopsArr.length; i++) {

        var sceneId = shopsArr[i].Id;
        var sceneName = shopsArr[i].Name;
        var filterClass = "filter" + sceneId;
        var selector = "." + filterClass + " div.selected-count";
        var j;

        if ($('#filter-template')[0]) {
            var $clone = $('#filter-template').html();

            $clone = $clone.replace("{{scene-class}}", filterClass)
                    .replace("{{filter-label}}", sceneName);

            $(".filter-container").prepend($clone);
        }

        var sceneShops = shopsArr[i].Stores;
        sceneShops.sort(function (a, b) {
            return b.IsMajor - a.IsMajor || a.Name.localeCompare(b.Name);
        });

        for (j = 0; j < sceneShops.length; j++) {
            var itemId = filterClass + "-" + j;
            var checked = "";
            var labelClass = "";
            var shopName = sceneShops[j].Name;
            var shopAlloc = sceneShops[j].Allocation;
            shopAllocations.push({name: shopName, allocation: shopAlloc});
            if (sceneShops[j].IsMajor === 1) {
                checked = " checked";
            }
            if (j === 0) {
                labelClass = 'class="first-filter" ';
            }
            var contents = '<input id="' + itemId + '" type="checkbox"' + checked + '><label ' + labelClass + 'for="' + itemId + '">' + shopName + '</label>';
            if ($(selector)[0]) {
                $(contents).insertBefore(selector);
            }
        }
    }

}

jQuery(document).ready(function ($) {

    // This button will increment the value
    $('.qtyplus').click(function (e) {
        // Get its current value
        var currentVal = parseInt($('.qty').text());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('.qty').text(currentVal + 2);
        } else {
            // Otherwise put a 0 there
            $('.qty').text(0);
        }

        calculatePointValue();
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function (e) {
        // Get the field name
        var currentVal = parseInt($('.qty').text());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('.qty').text(currentVal - 2);
        } else {
            // Otherwise put a 0 there
            $('.qty').text(0);
        }

        calculatePointValue();
    });

    $("input:checkbox[name='sceneGroup']").click(function () {
        selectedScenes = [];
        selectedRewardsFromScenes = [];
        $(".filter-box").css("display", "none");
        $(".filter-box-features").css("display", "block");
        $("input:checkbox[name='sceneGroup']:checked").each(function () {
            var sceneId = $(this).val();
            selectedScenes.push(sceneId);
            var filterSelector = ".filter" + sceneId;
            $(filterSelector).css("display", "block");
            // get rewards linked to the scene
            var sceneStoresIdx = shopsArr.map(function (e) {
                return e.Id;
            }).indexOf(parseInt(sceneId));
            var sceneRewards = shopsArr[sceneStoresIdx].RewardTypes;
            var rewIdx;
            for (rewIdx = 0; rewIdx < sceneRewards.length; rewIdx++) {
                selectedRewardsFromScenes.push(sceneRewards[rewIdx].Name);
            }

        });
        calculatePointValue();
    });

    $("input:checkbox[name='filterGroup']").click(function () {
        if ($("input:checkbox[id='filterOn']").is(":checked"))
        {
            $(".filter-container").css("display", "block").hide().slideDown(1000);
        }
        else
        {
            $(".filter-container").slideUp(1000);
        }
    });

    $("#js-search-cards").click(function () {
        showResultList();
    });

    $(".main h1").css('visibility', 'visible').hide().fadeIn(5000);
    loadShops($);
    //add custom select handling
    $('select').each(function () {

        // Cache the number of options
        var $this = $(this),
                numberOfOptions = $(this).children('option').length;

        // Hides the select element
        $this.addClass('s-hidden');

        // Wrap the select element in a div
        $this.wrap('<div class="select"></div>');

        // Insert a styled div to sit over the top of the hidden select element
        $this.after('<div class="styledSelect"></div>');

        // Cache the styled div
        var $styledSelect = $this.next('div.styledSelect');

        // Show the first select option in the styled div
        $styledSelect.text($this.children('option').eq(0).text());

        // Insert an unordered list after the styled div and also cache the list
        var $list = $('<ul />', {
            'class': 'options'
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        // Cache the list items
        var $listItems = $list.children('li');

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $styledSelect.click(function (e) {
            e.stopPropagation();
            $('div.styledSelect.active').each(function () {
                $(this).removeClass('active').next('ul.options').hide();
            });
            $(this).toggleClass('active').next('ul.options').toggle();
        });

        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            /* alert($this.val()); Uncomment this for demonstration! */
        });

        // Hides the unordered list when clicking outside of it
        $(document).click(function () {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });

    $(".filter-container").on("click", "input:checkbox", function () {
        calculatePointValue();
    });


    $(".sorting-conditions li").click(function () {
        renderCards();
    });

    $(".reward-conditions li").click(function () {
        calculatePointValue();
    });

    $(".email-btn").click(function () {

        var emailaddress = $(".footer input").val();


        if (!isValidEmailAddress(emailaddress))
        {
            $(".footer input").css("border", "thin solid #ff0000");
        }

        else
        {
            $(".footer input").css("border", "none");
            $("#js-registered-email").text(emailaddress);
            $("#email-message").dialog("open");
            $.ajax({
                type: "POST",
                url: "/backend/mailinglist/add",
                data: {"email": emailaddress},
                success: function (data) {
                    var statusEmail = data.status;
                    if (statusEmail !== "OK") {
                        $("#js-registered-email").text("エラー。もう一度登録してください。");
                    }
                },
                error: function (data) {
                    $("#js-registered-email").text("エラー。もう一度登録してください。");
                }
            });
        }
    });

    if ($("#email-message")[0]) {
        $("#email-message").dialog({
            dialogClass: "email-conf",
            autoOpen: false,
            resizable: false,
            closeText: "閉じる",
            modal: true,
            width: 350,
            buttons: {
                OK: function () {
                    $(this).dialog("close");
                }
            }
        });
    }

});



function getBestCard(persona) {

    var personaData = getOnePersonaData(persona);

    var monthlySpend = personaData.DefaultSpend;
    var rewardType = "";
    var rewardsArr = [];
    var rewardSubCat = null;

    //if there is defined reward make it as default, and skip collecting recommended rewards
    if (personaData.RewardCategory !== null) {
        rewardType = personaData.RewardCategory.Name;
        rewardsArr.push(rewardType);
        rewardSubCat = personaData.RewardCategory.SubCategory;
    }

    var sorting = personaData.Sorting;


    var allShopsPersona = [];
    var tempCardArr = cardsArrConstant.slice(0);
    var remainingSpend;
    var remainingSpendRate = 1;
    var selectedStoresSpend = 0;


    var allFeatureRestrictions = personaData.Restriction.FeatureRestriction;
    var nFeatureRestrictions = allFeatureRestrictions.length;

    var z;

    // get shops from scenes available for this persona
    for (z = 0; z < shopsArr.length; z++) {

        var personaIdx = shopsArr[z].Persona.map(function (e) {
            return e.Name;
        }).indexOf(persona);

        if (personaIdx > -1) {
            var j;
            var k;
            for (j = 0; j < shopsArr[z].Stores.length; j++) {
                if (shopsArr[z].Stores[j].IsMajor === 1)
                {
                    allShopsPersona.push(shopsArr[z].Stores[j].Name);
                }
            }
            //if there is no defined reward, collect recommended ones
            if (rewardType === "")
            {
                for (k = 0; k < shopsArr[z].RewardTypes.length; k++) {
                    rewardsArr.push(shopsArr[z].RewardTypes[k].Name);
                }
            }
        }
    }

    var cleanShopsArr = unique(allShopsPersona);
    var cleanRewardArr = unique(rewardsArr);
    var numberOfShops = cleanShopsArr.length;

    var mergedArrAllocations = calcAllocations(cleanShopsArr);
    var storeData = mergedArrAllocations[0];
    var totalAllocation = mergedArrAllocations[1];


    //Standard spend 20%, the rest is selected store spend distributed based on allocation
    if (numberOfShops > 0) {
        remainingSpendRate = 0.2;
        remainingSpend = Math.round(monthlySpend * remainingSpendRate);
        selectedStoresSpend = monthlySpend - remainingSpend;

    } else {
        remainingSpend = monthlySpend;
    }

    var i;

    for (i = 0; i < tempCardArr.length; i++) {

        if (nFeatureRestrictions > 0) {
            var featureCheck = 0;
            var featureIds = [];
            var idxFeat;
            var idxRest;
            for (idxFeat = 0; idxFeat < tempCardArr[i].features.length; idxFeat++) {

                featureIds.push(tempCardArr[i].features[idxFeat].category);
            }

            for (idxRest = 0; idxRest < nFeatureRestrictions; idxRest++) {
                var restCat = allFeatureRestrictions[idxRest].Category;
                var restType = allFeatureRestrictions[idxRest].Negative;
                if ((restType === 0 && featureIds.indexOf(restCat) === -1) || (restType === 1 && featureIds.indexOf(restCat) !== -1)) {
                    featureCheck = 1;
                    break;
                }
            }
        }

        if (featureCheck === 1) {
            tempCardArr.splice(i, 1);
            i--;
            continue;
        }

        var shopPointValue = 0;
        var pointToYen = tempCardArr[i].pointsToMoneyConversionRate;

        var campaignPoints = parseInt(tempCardArr[i].campaignPoints);
        if (isNaN(campaignPoints) || campaignPoints === null) {
            campaignPoints = 0;
        }
        var j;

        var stdPointsIdx = tempCardArr[i].pointsData.map(function (e) {
            return e.store;
        }).indexOf("標準ポイント");

        var stdPointRate = 0;

        if (stdPointsIdx > -1) {
            var stdPointsArr = $.grep(tempCardArr[i].pointsData, function (e) {
                return e.store === "標準ポイント";
            });
            stdPointRate = stdPointsArr[0].points;
        }

        //calculate total store points based on user selection and adding standard spend
        for (j = 0; j < storeData.length; j++) {
            var curStore = storeData[j].name;
            var ratePerStore = storeData[j].allocation / totalAllocation;
            var spendPerStore = Math.round(selectedStoresSpend * ratePerStore);
            var thisShopPointVal;

            var storeIdx = tempCardArr[i].pointsData.map(function (e) {
                return e.store;
            }).indexOf(curStore);
            if (storeIdx !== -1) {
                var storeArr = $.grep(tempCardArr[i].pointsData, function (e) {
                    return e.store === curStore;
                });
                var curStoreRate = storeArr[0].points;
                thisShopPointVal = Math.round(spendPerStore * curStoreRate * 12);
            }
            else {
                thisShopPointVal = Math.round(spendPerStore * stdPointRate * 12);
            }
            shopPointValue += thisShopPointVal;
        }

        //add remaining spend
        if (remainingSpend > 0) {
            var remainingPointVal;
            remainingPointVal = Math.round(remainingSpend * stdPointRate * 12);
            shopPointValue += remainingPointVal;
        }

        var totalPoints = Math.round(shopPointValue + campaignPoints);

        tempCardArr[i].totalPoints = totalPoints;
        tempCardArr[i].campaignPoints = campaignPoints;
        tempCardArr[i].averagePointRate = Math.round(shopPointValue / (monthlySpend * 12) * pointToYen * 100 * 100) / 100;

        //calculate reward value
        var combinedRewards = [];
        var numRewardsSelected = cleanRewardArr.length;
        var numRewardsMatched = 0;

        for (var key in  tempCardArr[i].rewards) {
            if (cleanRewardArr.indexOf(key) !== -1 || numRewardsSelected === 0) {
                var rewardVal = tempCardArr[i].rewards[key];
                var rewardIdx;
                for (rewardIdx = 0; rewardIdx < rewardVal.length; rewardIdx++) {
                    if (rewardSubCat === null || (rewardSubCat !== null && rewardVal[rewardIdx].subcategory === rewardSubCat))
                    {
                        combinedRewards.push(rewardVal[rewardIdx]);
                    }
                }
            }
        }

        numRewardsMatched = combinedRewards.length;

        var rewardsSortedByValue = [];
        var topRewardVal = 0;

        if
                (numRewardsMatched > 0)
        {
            var rewardsSortedWithMinPoints = calcRewards(combinedRewards, totalPoints);
            rewardsSortedByValue = rewardsSortedWithMinPoints[1];
            if
                    (rewardsSortedByValue.length > 0)
            {
                topRewardVal = rewardsSortedByValue[0].rewardValue;
            }

        }

        tempCardArr[i].topRewardValue = topRewardVal;
        tempCardArr[i].rewardValNet = topRewardVal - tempCardArr[i].annualFeeFirstYear;
        if (numRewardsMatched === 0) {
            tempCardArr.splice(i, 1);
            i--;
        }
    }

    switch (sorting) {
        case "points":
            tempCardArr.sort(function (a, b) {
                return b.totalPoints - a.totalPoints || b.averagePointRate - a.averagePointRate || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "rate":
            tempCardArr.sort(function (a, b) {
                return b.averagePointRate - a.averagePointRate || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "campaign-points":
            tempCardArr.sort(function (a, b) {
                return b.campaignPoints - a.campaignPoints || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "reward-net":
            tempCardArr.sort(function (a, b) {
                return b.rewardValNet - a.rewardValNet || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        default:
            tempCardArr.sort(function (a, b) {
                return b.topRewardValue - a.topRewardValue || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });

    }

    return tempCardArr[0];

}


function calculatePointValue() {
    var monthlySpend = $(".qty").text() * 10000;
    var mergedArr = getAllServices();
    var mergedArrAllocations = calcAllocations(mergedArr);
    var storeData = mergedArrAllocations[0];
    var totalAllocation = mergedArrAllocations[1];

    var numberOfShops = mergedArr.length;
    var selectedStoresSpend = 0;
    var remainingSpend;

    var remainingSpendRate = 1;

    var rewardFilterVal = $("#reward-preference option:selected").text();
    selectedRewards = [];
    var rewardSubCat = null;

    if (rewardFilterVal !== 'おすすめ') {
        selectedRewards.push(rewardFilterVal);
        if (selectedPersona !== "") {
            var personaData = getOnePersonaData(selectedPersona);
            if (personaData.RewardCategory !== null && personaData.RewardCategory.Name === rewardFilterVal) {
                rewardSubCat = personaData.RewardCategory.SubCategory;
            }
        }
    }
    else
    {
        selectedRewards = unique(selectedRewardsFromScenes);
    }


    //Standard spend 20%, the rest is selected store spend distributed based on allocation
    if (numberOfShops > 0) {
        remainingSpendRate = 0.2;
        remainingSpend = Math.round(monthlySpend * remainingSpendRate);
        selectedStoresSpend = monthlySpend - remainingSpend;

    } else {
        remainingSpend = monthlySpend;
    }
    var i;

    for (i = 0; i < cardsArr.length; i++) {

        var detailsPerStore = [];
        var shopPointValue = 0;
        var pointToYen = cardsArr[i].pointsToMoneyConversionRate;

        var campaignPoints = parseInt(cardsArr[i].campaignPoints);
        if (isNaN(campaignPoints) || campaignPoints === null) {
            campaignPoints = 0;
        }
        var j;

        var stdPointsIdx = cardsArr[i].pointsData.map(function (e) {
            return e.store;
        }).indexOf("標準ポイント");

        var stdPointRate = 0;

        if (stdPointsIdx !== -1) {
            var stdPointsArr = $.grep(cardsArr[i].pointsData, function (e) {
                return e.store === "標準ポイント";
            });
            stdPointRate = stdPointsArr[0].points;
        }

        //calculate total store points based on user selection and adding standard spend

        for (j = 0; j < storeData.length; j++) {
            var curStore = storeData[j].name;
            var ratePerStore = storeData[j].allocation / totalAllocation;
            var spendPerStore = Math.round(selectedStoresSpend * ratePerStore);
            var thisShopPointVal;
            var storeIdx = cardsArr[i].pointsData.map(function (e) {
                return e.store;
            }).indexOf(curStore);
            if (storeIdx !== -1) {
                var storeArr = $.grep(cardsArr[i].pointsData, function (e) {
                    return e.store === curStore;
                });
                var curStoreRate = storeArr[0].points;
                thisShopPointVal = Math.round(spendPerStore * curStoreRate * 12);
            }
            else {
                curStoreRate = stdPointRate;
                thisShopPointVal = Math.round(spendPerStore * curStoreRate * 12);
            }
            var detailsObj = {name: curStore, rate: curStoreRate, spend: spendPerStore, points: thisShopPointVal};
            detailsPerStore.push(detailsObj);
            shopPointValue += thisShopPointVal;
        }

        //sort by points before adding remaining spend
        if (detailsPerStore.length > 0) {
            detailsPerStore.sort(function (a, b) {
                return b.points - a.points || b.name.localeCompare(a.name);
            });
        }


        //add remaining spend
        if (remainingSpend > 0) {
            var remainingPointVal;
            remainingPointVal = Math.round(remainingSpend * stdPointRate * 12);
            var detailsRemainingObj = {name: "その他", rate: stdPointRate, spend: remainingSpend, points: remainingPointVal};
            detailsPerStore.push(detailsRemainingObj);
            shopPointValue += remainingPointVal;
        }

        var totalPoints = Math.round(shopPointValue + campaignPoints);

        cardsArr[i].campaignPoints = campaignPoints;
        cardsArr[i].totalPoints = totalPoints;
        cardsArr[i].averagePointRate = Math.round(shopPointValue / (monthlySpend * 12) * pointToYen * 100 * 100) / 100;
        cardsArr[i].detailsMatrix = detailsPerStore;

        //calculate reward value
        var combinedRewards = [];
        var numRewardsSelected = selectedRewards.length;
        var numRewardsMatched = 0;

        for (var key in  cardsArr[i].rewards) {
            if (selectedRewards.indexOf(key) !== -1 || numRewardsSelected === 0) {
                var rewardVal = cardsArr[i].rewards[key];
                var rewardIdx;
                for (rewardIdx = 0; rewardIdx < rewardVal.length; rewardIdx++) {
                    if (rewardSubCat === null || (rewardSubCat !== null && rewardVal[rewardIdx].subcategory === rewardSubCat))
                    {
                        combinedRewards.push(rewardVal[rewardIdx]);
                    }
                }
            }
        }

        numRewardsMatched = combinedRewards.length;

        var rewardsSortedByValue = [];
        var topRewardVal = 0;
        var topRewardTitle = "";
        var topRewardDesc = "このカードに特典はありません。";
        var emptyList = [];

        if
                (numRewardsMatched > 0)
        {
            var rewardsSortedWithMinPoints = calcRewards(combinedRewards, totalPoints);
            rewardsSortedByValue = rewardsSortedWithMinPoints[1];
            if
                    (rewardsSortedByValue.length > 0)
            {
                topRewardVal = rewardsSortedByValue[0].rewardValue;
                topRewardTitle = rewardsSortedByValue[0].title;
                topRewardDesc = rewardsSortedByValue[0].description;
            }
            else
            {
                var minPoints = rewardsSortedWithMinPoints[0];
                topRewardDesc = addCommas(minPoints) + "ポイント以上で交換可能になります。";
            }
            cardsArr[i].sortedRewards = uniqueByKey(rewardsSortedByValue, "category");
        }

        else
        {
            cardsArr[i].sortedRewards = emptyList;
        }

        cardsArr[i].topRewardValue = topRewardVal;
        cardsArr[i].topRewardTitle = topRewardTitle;
        cardsArr[i].topRewardDesc = topRewardDesc;
        cardsArr[i].numRewardsMatched = numRewardsMatched;
        cardsArr[i].rewardValNet = topRewardVal - cardsArr[i].annualFeeFirstYear;
    }

    renderCards();
}

function renderCards() {
    $(".card-list-container").html("");
    var i;
    var cardRank = 0;
    var selectedFunctions = [];

    var sortKey = $("#sorting option:selected").text();

    //sort cards array depending on the selection

    switch (sortKey) {
        case "ポイント":
            cardsArr.sort(function (a, b) {
                return b.totalPoints - a.totalPoints || b.averagePointRate - a.averagePointRate || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "還元金額":
            cardsArr.sort(function (a, b) {
                return b.topRewardValue - a.topRewardValue || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "キャンペーンP":
            cardsArr.sort(function (a, b) {
                return b.campaignPoints - a.campaignPoints || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        case "還元金額(年会費別)":
            cardsArr.sort(function (a, b) {
                return b.rewardValNet - a.rewardValNet || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
            break;
        default:
            cardsArr.sort(function (a, b) {
                return b.averagePointRate - a.averagePointRate || b.totalPoints - a.totalPoints || b.cardName.localeCompare(a.cardName);
            });
    }

    $("div.features input:checkbox:checked").each(function () {
        var featureId = $(this).attr("id");
        selectedFunctions.push(featureId);
    });


    var negativeFeatures = [];
    if (selectedPersona !== "" && initListDisp === 1) {
        var personaData = getOnePersonaData(selectedPersona);
        var allFeatureRestrictions = personaData.Restriction.FeatureRestriction;
        for (var y = 0; y < allFeatureRestrictions.length; y++) {
            if (allFeatureRestrictions[y].Negative === 1) {
                negativeFeatures.push(allFeatureRestrictions[y].Category);
            }
        }
        initListDisp = 0;
    }

    for (i = 0; i < cardsArr.length; i++) {

        var featureIds = [];
        var selectionIdx;
        var j;

        //check if all selected functions and rewards are available on a card, or negative features are not
        var functionCheck = 0;

        for (j = 0; j < cardsArr[i].features.length; j++) {
            var cardFeat = cardsArr[i].features[j].category;
            if (negativeFeatures.indexOf(cardFeat) !== -1) {
                functionCheck = -1;
                break;
            } else
            {
                featureIds.push(cardFeat);
            }

        }

        //filter out by rewards
        var numRewardsMatched = cardsArr[i].numRewardsMatched;
        var numRewardsSelected = selectedRewards.length;

        if (functionCheck === 0) {

            if (numRewardsSelected > 0 && numRewardsMatched === 0) {
                functionCheck = -1;
            }
            else {
                for (selectionIdx = 0; selectionIdx < selectedFunctions.length; selectionIdx++) {
                    var checkFeatures = featureIds.indexOf(selectedFunctions[selectionIdx]);
                    if (checkFeatures === -1) {
                        functionCheck = -1;
                        break;
                    }
                }
            }
        }
        //skip this card is feature/reward selected by user is unavailable
        if (functionCheck === -1)
        {
            continue;
        }


        cardRank++;



        var curRewardVal = "";
        if (cardsArr[i].topRewardValue > 0) {
            curRewardVal = addCommas(cardsArr[i].topRewardValue) + "円相当";
        }
        //var curRewardTitle = cardsArr[i].topRewardTitle;
        var curRewardDesc = cardsArr[i].topRewardDesc;

        var cardName = cardsArr[i].cardName;
        var cardId = cardsArr[i].cardId;
        var imgUrl = cardsArr[i].cardImg;
        var avgRate = cardsArr[i].averagePointRate;
        var totalPoints = addCommas(cardsArr[i].totalPoints);
        var annualMembership = addCommas(cardsArr[i].annualFeeSubseqYear);
        var campaignPoints = addCommas(cardsArr[i].campaignPoints);
        var affiliateUrl = cardsArr[i].affiliateUrl;

        var $clone = $('#card-template').html();
        if (cardRank === 1) {
            //add changing of background color
            $clone = $clone.replace("{{additional-class}}", " card-pane-highlighted");
        }
        else {
            $clone = $clone.replace("{{additional-class}}", "");
        }

        $clone = $clone.replace("{{card-rank}}", cardRank)
                .replace("{{card-name}}", cardName)
                .replace("{{details-id}}", cardId)
                .replace("{{card-rank-number}}", cardRank)
                .replace("{{image-url}}", imgUrl)
                .replace("{{average-rate}}", avgRate)
                .replace("{{annual-fee}}", annualMembership)
                .replace("{{annual-points}}", totalPoints)
                .replace("{{campaign-points}}", campaignPoints)
                .replace("{{reward-value}}", curRewardVal)
                .replace("{{reward-text}}", curRewardDesc)
                .replace("{{affiliate-url}}", affiliateUrl)
                .replace("{{link-id}}", cardName);

        $(".card-list-container").append($clone);

    }

    if (cardRank === 0) {
        //add message here
        $(".card-list-container").html('<div class="error-message error-no-cards">条件に一致するカードは見つかりませんでした。</div>').hide().fadeIn(1500);
    }

    $("#cards-shown").text(cardRank);

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

function getAllServices() {

    var mergedArr = [];

    $("div.filter-box input:checked + label").each(function () {

        if ($(this).parent().parent().closest("div").css("display") === "block") {
            var service = $(this).text();
            mergedArr.push(service);
        }
    });


    return unique(mergedArr);
}

function calcRewards(rewardsArr, availPoints) {
    var idxRew;
    var sortedArr = [];
    var minRequiredPointsArr = [];


    for (idxRew = 0; idxRew < rewardsArr.length; idxRew++) {
        var minP;
        var maxP;
        var increment;
        var yenPoint;
        var finiteFlag = rewardsArr[idxRew].isFinite;
        var reqP = 0;
        if (isNaN(rewardsArr[idxRew].minPoints) || rewardsArr[idxRew].minPoints === null) {
            minP = 0;
        } else {
            minP = rewardsArr[idxRew].minPoints;
        }
        if (isNaN(rewardsArr[idxRew].maxPoints) || rewardsArr[idxRew].maxPoints === null) {
            maxP = 999999999;
        } else {
            maxP = rewardsArr[idxRew].maxPoints;
        }
        if (isNaN(rewardsArr[idxRew].pricePerUnit) || rewardsArr[idxRew].pricePerUnit === null) {
            increment = 1;
        } else {
            increment = rewardsArr[idxRew].pricePerUnit;
        }
        if (isNaN(rewardsArr[idxRew].yenPerPoint) || rewardsArr[idxRew].yenPerPoint === null) {
            yenPoint = 1;
        } else {
            yenPoint = rewardsArr[idxRew].yenPerPoint;
        }

        var minForReward = Math.round(Math.max(minP, reqP));
        var maxPointsForReward = Math.min(maxP, availPoints);
        minRequiredPointsArr.push(minForReward);

        if (availPoints >= minForReward)
        {
            var rewValue = 0;
            if (finiteFlag === 1) {
                rewValue = minForReward;
            } else {
                rewValue = maxPointsForReward - (maxPointsForReward % increment);
            }

            var rewValueYen = Math.round(rewValue * yenPoint);
            rewardsArr[idxRew].rewardValue = rewValueYen;
            sortedArr.push(rewardsArr[idxRew]);
        }

    }

    //get minimum required points for a reward
    minRequiredPointsArr.sort(function (a, b) {
        return a - b;
    });
    var minRequiredPoints = minRequiredPointsArr[0];

    //sort array by rewardVal
    sortedArr.sort(function (a, b) {
        var x = a.rewardValue;
        var y = b.rewardValue;
        if (x < y)
            return 1;
        if (x > y)
            return -1;
        return 0;
    });

    var retArr = [minRequiredPoints, sortedArr];
    return retArr;
}

function calcAllocations(selectedShops) {
    var idxShop;
    var shopsWithAllocations = [];
    var sumAllocations = 0;

    for (idxShop = 0; idxShop < selectedShops.length; idxShop++) {
        var shopAllocObj = $.grep(shopAllocations, function (e) {
            return e.name === selectedShops[idxShop];
        });
        var shopAlloc = shopAllocObj[0].allocation * 100;
        shopsWithAllocations.push({name: selectedShops[idxShop], allocation: shopAlloc});
        sumAllocations += shopAlloc;
    }

    var retArr = [shopsWithAllocations, sumAllocations];
    return retArr;
}

function unique(arr) {
    var result = [];
    $.each(arr, function (i, e) {
        if ($.inArray(e, result) === -1)
            result.push(e);
    });
    return result;
}

function uniqueByKey(arr, unqKey) {
    var result = [];

    $.each(arr, function (i, item) {
        var idx = eval("result.map(function (e) {return e." + unqKey + ";}).indexOf(item." + unqKey + ")");

        if (idx === -1)
        {
            result.push(item);
        }
    });
    return result;
}

function toggleFilter(e) {
    var classes = $(e).parent().parent().closest('div').attr('class').split(' ');
    var selector = "div." + classes[1] + " input + label";
    $(e).html("");
    if ($(selector).css("display") === "none") {
        $(selector).css("display", "block");
        $(e).html('<i class="fa fa-angle-up fa-2x"></i>');
    }
    else {
        $(selector).css("display", "none");
        $(e).html('<i class="fa fa-angle-down fa-2x"></i>');
    }
}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
;

function preloader() {
    if (document.images) {

        var img1 = new Image();
        var img2 = new Image();
        var img3 = new Image();
        var img4 = new Image();
        var img5 = new Image();
        var img6 = new Image();
        var img7 = new Image();
        var img8 = new Image();
        var img9 = new Image();
        var img10 = new Image();
        var img11 = new Image();
        var img12 = new Image();
        var img13 = new Image();
        var img14 = new Image();
        var img15 = new Image();
        var img16 = new Image();
        var img17 = new Image();
        var img18 = new Image();
        var img19 = new Image();
        var img20 = new Image();
        var img21 = new Image();
        var img22 = new Image();
        var img23 = new Image();
        var img24 = new Image();
        var img25 = new Image();
        var img26 = new Image();
        var img27 = new Image();


        img1.src = "/img/icon_1dark.jpg";
        img2.src = "/img/icon_2dark.jpg";
        img3.src = "/img/icon_3dark.jpg";
        img4.src = "/img/icon_4dark.jpg";
        img5.src = "/img/icon_5dark.jpg";
        img6.src = "/img/icon_6dark.jpg";
        img7.src = "/img/icon_7dark.jpg";
        img8.src = "/img/icon_8dark.jpg";
        img9.src = "/img/icon_9dark.jpg";
        img10.src = "/img/icons-small/icon_1dark.jpg";
        img11.src = "/img/icons-small/icon_2dark.jpg";
        img12.src = "/img/icons-small/icon_3dark.jpg";
        img13.src = "/img/icons-small/icon_4dark.jpg";
        img14.src = "/img/icons-small/icon_5dark.jpg";
        img15.src = "/img/icons-small/icon_6dark.jpg";
        img16.src = "/img/icons-small/icon_7dark.jpg";
        img17.src = "/img/icons-small/icon_8dark.jpg";
        img18.src = "/img/icons-small/icon_9dark.jpg";
        img19.src = "/img/icons-small/icon_1light.jpg";
        img20.src = "/img/icons-small/icon_2light.jpg";
        img21.src = "/img/icons-small/icon_3light.jpg";
        img22.src = "/img/icons-small/icon_4light.jpg";
        img23.src = "/img/icons-small/icon_5light.jpg";
        img24.src = "/img/icons-small/icon_6light.jpg";
        img25.src = "/img/icons-small/icon_7light.jpg";
        img26.src = "/img/icons-small/icon_8light.jpg";
        img27.src = "/img/icons-small/icon_9light.jpg";
    }
}

function loadPersona() {
    var urlPersona = getUrlParameter("persona"), urlPersonaDyn = "";
    urlPersonaDyn = decodeURI(window.location.pathname.split('/')[1]);

    var pageTitle = document.title;

    if (pageTitle === "クレジットカード | MoneyIQ" && urlPersona !== undefined)
    {
        getPersonaList(urlPersona);
    }
    else if (pageTitle === "クレジットカード | MoneyIQ" && urlPersonaDyn !== "")
    {
        getPersonaList(urlPersonaDyn);
    }

}

function loadPersonaCards() {

    //load for front page and blog articles
    var personaList = getAllPersonas();

    var i;
    for (i = 0; i < personaList.length; i++) {
        var personaIdentifier = personaList[i].Identifier;
        var cardPaneClass = "." + personaIdentifier;
        var personaName = personaList[i].Name;
        if ($(cardPaneClass)[0]) {

            var personaCard = getBestCard(personaName);
            var cardName = personaCard.cardName;
            var cardImg = personaCard.cardImg;
            var rate = personaCard.averagePointRate + "%";
            var points = addCommas(personaCard.totalPoints) + "P";
            var rewards = addCommas(personaCard.topRewardValue) + "円相当";
            var affUrl = personaCard.affiliateUrl;
            var listLink = "http://www.moneyiq.jp/" + personaName;
            var pitch = "";
            for (var j in personaCard.pitch) {
                if (j === personaIdentifier) {
                    pitch = personaCard.pitch[j];
                    break;
                }
            }

            $(cardPaneClass + " .card-image-placeholder").css("background", "url(" + cardImg + ") center no-repeat");
            $(cardPaneClass + " .card-image-placeholder").css("background-size", "245px 154px");
            $(cardPaneClass + " .js-card-name").html(cardName);
            if (pitch !== "") {
                $(cardPaneClass + " .js-card-msg").html(pitch);
            }
            $(cardPaneClass + " .js-rate").html(rate);
            $(cardPaneClass + " .js-points").html(points);
            $(cardPaneClass + " .js-rewards").html(rewards);
            $(cardPaneClass + " .js-affiliate-link").attr("href", affUrl);
            $(cardPaneClass + " .js-list-link").attr("href", listLink);
        }
    }
}

function getPersonaList(personaJP) {


    var personaData = getOnePersonaData(personaJP);

    if (personaData !== null) {

        selectedPersona = personaJP;
        //Remove currently selected scenes
        $("input:checkbox[name='sceneGroup']").removeAttr("checked");

        //Set controls' values to defaults from persona data 
        $(".qty").text(personaData.DefaultSpend / 10000);

        if (personaData.RewardCategory !== null) {
            $("#reward-preference option:selected").prop('selected', false);
            var rewardType = personaData.RewardCategory.Name;
            $("#reward-preference option").filter(function () {
                return this.text === rewardType;
            }).prop('selected', true);
            $("div.reward-conditions .styledSelect").text(rewardType);
        }

        var sorting = personaData.Sorting;

        $("#sorting").val(sorting);
        var sortText = $("#sorting option[value=" + sorting + "]").text();
        $("div.sorting-conditions .styledSelect").text(sortText);

        //set positive features on
        var allFeatureRestrictions = personaData.Restriction.FeatureRestriction;

        for (var y = 0; y < allFeatureRestrictions.length; y++) {
            if (allFeatureRestrictions[y].Negative === 0) {
                var featureId = allFeatureRestrictions[y].Category;
                var featureSel = "#" + featureId;
                $(featureSel).prop('checked', true);
            }
        }

        var z;
        // get shops from scenes available for this persona
        for (z = 0; z < shopsArr.length; z++) {

            var personaIdx = shopsArr[z].Persona.map(function (e) {
                return e.Name;
            }).indexOf(personaJP);

            if (personaIdx > -1) {
                var sceneId = shopsArr[z].Id;
                initListDisp = 1;
                //check the scene and fire it's click event
                $("input:checkbox[name='sceneGroup'][value=" + sceneId + "]").trigger("click");
            }
        }

        showResultList();
    }
}

function getOnePersonaData(personaName) {
    var i;
    var personaData = null;
    // get shops from scenes available for this persona

    for (i = 0; i < shopsArr.length; i++) {
        var j;
        for (j = 0; j < shopsArr[i].Persona.length; j++) {
            if (shopsArr[i].Persona[j].Name === personaName)
            {
                personaData = shopsArr[i].Persona[j];
                i = shopsArr.length + 1;
                break;
            }
        }


    }

    return personaData;
}

function getAllPersonas() {
    var i;
    var allPersonas = [];
    // get shops from scenes available for this persona
    for (i = 0; i < shopsArr.length; i++) {

        var j;
        for (j = 0; j < shopsArr[i].Persona.length; j++) {
            allPersonas.push(shopsArr[i].Persona[j]);
        }

    }

    return uniqueByKey(allPersonas, "Identifier");
}

function showResultList() {
    if
            (selectedScenes.length === 0)
    {
        $(".error-scenes").css('visibility', 'visible').hide().fadeIn(1500);
    }

    else
    {
        var viewportWidth = $(window).width();
        if (viewportWidth < 1000) {
            $(".scene-button").css("width", "28%");
            $(".scene-button").css("margin", "2%");
            $(".scene-button").css("font-size", "0.5em");
        }
        else {
            $(".scene-button").css("width", "10%");
            $(".scene-button").css("margin", "0.5%");
            $(".scene-button-ecom").css("margin-left", "0");
            $(".scene-button-travel").css("margin-right", "0");
            $(".scene-button").css("font-size", "0em");
            $(".scene-button").mouseenter(function () {
                $(this).css("font-size", "0.7em");
            }).mouseleave(function () {
                $(this).css("font-size", "0em");
            });
        }

        //$(".scene-button").text("");       
        $(".scene-button").css("font-weight", "normal");

        $("div.scene-pane input[type=checkbox]").each(function () {
            var curClass = "scene-button-" + this.id;
            var newClass = curClass + "-small";
            $("label[for='" + this.id + "']").addClass(newClass).removeClass(curClass);
        });

        $(".error-scenes").css("visibility", "hidden");
        $("#js-search-cards").css("display", "none");
        $(".persona-pane").css("display", "none");
        $(".results-container").css("display", "block");
        ga('set', 'page', '/search-result');
        ga('send', 'pageview');
        scrollToElement($(".scene-pane"));
    }

}

function scrollToElement(ele) {
    $(window).scrollTop(ele.offset().top).scrollLeft(ele.offset().left);
}

function showCardDetails(cardId, cardRank) {

    var detailsId = "cardDetails" + cardId;
    var detailsSelector = "#" + detailsId;

    $(".details-tabs").tabs("destroy");

    var tab1id = "points_" + cardId;
    var tab2id = "rewards_" + cardId;
    var tab3id = "features_" + cardId;
    var tab4id = "fees_" + cardId;
    var tab5id = "other_" + cardId;

    var cardObj = $.grep(cardsArr, function (e) {
        return e.cardId === parseInt(cardId);
    });

    var imgUrl = cardObj[0].cardImg;
    var cardName = cardObj[0].cardName;
    var affiliateUrl = cardObj[0].affiliateUrl;

    //collect data for 1st tab (points)
    var ttlPoints = cardObj[0].totalPoints;
    var topReward = cardObj[0].topRewardValue;
    var ttlRate = cardObj[0].averagePointRate;
    var monthlySpend = 0;
    var campaignPoints = cardObj[0].campaignPoints;

    var l;
    var pointDetails = "";
    for (l = 0; l < cardObj[0].detailsMatrix.length; l++) {
        var storeName = cardObj[0].detailsMatrix[l].name;
        var storeRate = cardObj[0].detailsMatrix[l].rate;
        var storeSpend = cardObj[0].detailsMatrix[l].spend;
        var storePoints = cardObj[0].detailsMatrix[l].points;
        monthlySpend += storeSpend;
        pointDetails += '<div class="details-column">' + storeName + '</div>';
        pointDetails += '<div class="details-column">' + storeRate * 100 + '%</div>';
        pointDetails += '<div class="details-column">' + addCommas(storeSpend) + '円</div>';
        pointDetails += '<div class="details-column">' + addCommas(storePoints) + 'P</div><div class="clearfix"></div>';
    }

    pointDetails += '<div class="details-column">キャンペーンP</div>';
    pointDetails += '<div class="details-column">-</div>';
    pointDetails += '<div class="details-column">-</div>';
    pointDetails += '<div class="details-column">' + addCommas(campaignPoints) + 'P</div><div class="clearfix"></div>';

    pointDetails += '<div class="details-column bold">合計</div>';
    pointDetails += '<div class="details-column bold">' + ttlRate + '%</div>';
    pointDetails += '<div class="details-column bold">' + addCommas(monthlySpend) + '円</div>';
    pointDetails += '<div class="details-column bold">' + addCommas(ttlPoints) + 'P</div>';

    //collect data for 2nd tab (rewards)
    var m;
    var rewardDetails = "";

    for (m = 0; m < cardObj[0].sortedRewards.length; m++) {
        var rewardCategory = cardObj[0].sortedRewards[m].category;
        var rewardCompany = cardObj[0].sortedRewards[m].pointSystemName;
        var rewardName = cardObj[0].sortedRewards[m].title;
        var rewardValue = cardObj[0].sortedRewards[m].rewardValue;
        rewardDetails += '<div class="details-column">' + rewardCategory + '</div>';
        rewardDetails += '<div class="details-column">' + rewardCompany + '</div>';
        rewardDetails += '<div class="details-column">' + rewardName + '</div>';
        rewardDetails += '<div class="details-column center-align">' + addCommas(rewardValue) + '円</div><div class="clearfix"></div>';
    }

    //collect data for 3rd tab (features)
    var featureDetails = "";

    var n;
    var brands = "";
    for (n = 0; n < cardObj[0].supportedBrands.length; n++) {
        brands += '<div class="details-row">' + cardObj[0].supportedBrands[n] + '</div>';
    }

    var o;
    var eMoney = "";
    var additionalCards = "";
    var mileage = "";

    for (o = 0; o < cardObj[0].features.length; o++) {
        var featureCat = cardObj[0].features[o].category;
        var featureName = cardObj[0].features[o].feature;
        switch (featureCat) {
            case "e-payment":
            case "suica":
            case "pasmo":
                eMoney += '<div class="details-row">' + featureName + '</div>';
                break;
            case "ETC":
            case "utility":
            case "prestige":
            case "platinum":
                additionalCards += '<div class="details-row">' + featureName + '</div>';
                break;
            case "ANA":
            case "JAL":
            case "lounge":
                mileage += '<div class="details-row">' + featureName + '</div>';
        }
    }

    featureDetails += '<div class="details-column">' + brands + '</div>';
    featureDetails += '<div class="details-column">' + eMoney + '</div>';
    featureDetails += '<div class="details-column">' + mileage + '</div>';
    featureDetails += '<div class="details-column">' + additionalCards + '</div><div class="clearfix"></div>';

    //collect data for 4th tab (fees)
    var feeDetails = "";
    var feeFirstYear = cardObj[0].annualFeeFirstYear;
    var feeSubseqYear = cardObj[0].annualFeeSubseqYear;

    feeDetails += '<div class="details-column">' + addCommas(feeFirstYear) + '円</div>';
    feeDetails += '<div class="details-column">' + addCommas(feeSubseqYear) + '円</div>';
    feeDetails += '<div class="details-column">' + "" + '</div>';
    feeDetails += '<div class="details-column">' + "" + '</div><div class="clearfix"></div>';

    //collect data for 5th tab (conditions)
    var condDetails = "";
    var lowerLimit = "-";
    var upperLimit = "-";
    var closureDate = "";
    var paymentDate = "";
    var revolvingLoan = "";
    var lumpsumLoan = "";
    var cashing = "";

    if (cardObj[0].credit_limit_bottom !== null && cardObj[0].credit_limit_bottom !== 0)
    {
        lowerLimit = addCommas(cardObj[0].credit_limit_bottom / 10000) + "万円";
    }

    if (cardObj[0].credit_limit_upper !== null && cardObj[0].credit_limit_upper !== 0)
    {
        upperLimit = addCommas(cardObj[0].credit_limit_upper / 10000) + "万円";
    }

    if (cardObj[0].cutoff_date !== null) {
        closureDate = cardObj[0].cutoff_date;
    }

    if (cardObj[0].debit_date !== null) {
        paymentDate = cardObj[0].debit_date;
    }

    var p;
    for (p = 0; p < cardObj[0].interest.length; p++) {
        var interestType = cardObj[0].interest[p].Type;
        if (interestType === "ribo") {
            revolvingLoan = "リボ：" + cardObj[0].interest[p].Display;
        } else if (interestType === "bunkatsu") {
            lumpsumLoan = "分割：" + cardObj[0].interest[p].Display;
        } else if (interestType === "cashing") {
            cashing = cardObj[0].interest[p].Display;
        }
    }

    condDetails += '<div class="details-column">下限：' + lowerLimit + '</div>';
    condDetails += '<div class="details-column">締日：' + closureDate + '</div>';
    condDetails += '<div class="details-column">' + revolvingLoan + '</div>';
    condDetails += '<div class="details-column">' + cashing + '</div><div class="clearfix"></div>';

    condDetails += '<div class="details-column">上限：' + upperLimit + '</div>';
    condDetails += '<div class="details-column">引落日：' + paymentDate + '</div>';
    condDetails += '<div class="details-column">' + lumpsumLoan + '</div>';
    condDetails += '<div class="details-column"></div><div class="clearfix"></div>';


    var $cloneDetails = $('#details-template').html();
    $cloneDetails = $cloneDetails.replace("{{details-selector}}", detailsId)
            .replace("{{image-url-details}}", imgUrl)
            .replace("{{card-rank-details}}", cardRank)
            .replace("{{card-name-details}}", cardName)
            .replace("{{affiliate-url-details}}", affiliateUrl)
            .replace("{{link-id-details}}", cardName)
            .replace("{{tab1selector}}", "#" + tab1id)
            .replace("{{tab2selector}}", "#" + tab2id)
            .replace("{{tab3selector}}", "#" + tab3id)
            .replace("{{tab4selector}}", "#" + tab4id)
            .replace("{{tab5selector}}", "#" + tab5id)
            .replace("{{tab1id}}", tab1id)
            .replace("{{tab2id}}", tab2id)
            .replace("{{tab3id}}", tab3id)
            .replace("{{tab4id}}", tab4id)
            .replace("{{tab5id}}", tab5id)
            .replace("{{tab1details}}", pointDetails)
            .replace("{{tab2details}}", rewardDetails)
            .replace("{{tab3details}}", featureDetails)
            .replace("{{tab4details}}", feeDetails)
            .replace("{{tab5details}}", condDetails);

    $(".card-list-container").append($cloneDetails);

    var defaultText = "1年間で <div class='number-highlight-details'>" + addCommas(ttlPoints) + "ポイント</div> 貯まる";
    $(detailsSelector + " .footer-details").html(defaultText);

    $(".details-tabs").tabs({
        beforeActivate: function (event, ui) {
            var tabCat = ui.newPanel.attr('id');
            if (tabCat.indexOf("rewards") !== -1 && topReward > 0) {
                var rewardText = "最大 <div class='number-highlight-details'>" + addCommas(topReward) + "円相当</div> の特典に交換できる";
                $(detailsSelector + " .footer-details").html("");
                $(detailsSelector + " .footer-details").html(rewardText);
            }
            else if (tabCat.indexOf("points") !== -1) {
                $(detailsSelector + " .footer-details").html("");
                $(detailsSelector + " .footer-details").html(defaultText);
            }
            else {
                $(detailsSelector + " .footer-details").html("");
            }
        }
    });

    $(detailsSelector).dialog({
        dialogClass: "card-details",
        autoOpen: false,
        resizable: false,
        closeText: "閉じる",
        close: function (event, ui)
        {
            $(this).dialog("destroy").remove();
        },
        modal: true,
        width: 600
    });
    //Create details popup object
    $(detailsSelector).dialog("open");
    $(detailsSelector + " .card-pane-details").css("display", "block");
}

function sendGglEvent(categ, action, label) {
    ga('send', 'event', categ, action, label);
}

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}

function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload !== 'function') {
        window.onload = func;
    } else {
        window.onload = function () {
            if (oldonload) {
                oldonload();
            }
            func();
        };
    }
}

addLoadEvent(preloader);
