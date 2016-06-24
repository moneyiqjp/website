
$(document).ready(function() {


    $('#flightcost').dataTable({
        dom: "lfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/flightcost/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "FlightCostId", visible: false},
            {"data": "RetrievalDate"},
            {"data": "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId"},
            {
                "data": "MileageType",
                editField: "MileageType.MileageTypeId",
                "render": function (data, type, full, meta) {
                    if (type === 'display' && data != null) {
                        roundtrip = "one way";
                        if (data["MileageType"]["RoundTrip"]) {
                            roundtrip = "round trip"
                        }
                        return data["MileageType"]["Class"] + "-" + data["MileageType"]["Season"] + "-" + roundtrip;
                    }
                    return data;
                }
            },
            {
                data: "Trip",
                editField: "Trip.TripId",
                "render": function (data, type, full, meta) {
                    if (type === 'display' && data != null) {
                        return data["CityFrom"]["Name"] + "-" + data["CityTo"]["Name"];
                    }
                    return data;
                }
            },
            {"data": "FareType"},
            {"data": "DepartDate"},
            {"data": "DepartFlightNo"},
            {"data": "ReturnDate"},
            {"data": "ReturnFlightNo"},
            {"data": "Reference"},
            {"data": "Price"}
        ]

    });
} );