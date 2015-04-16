
var rowIndex;
/*
$("#data tbody").on("click", "tr:not('#totalprice')", function () {
    $(this).addClass('selected').siblings().removeClass('selected');
    rowIndex = $(this).index();
})
*/
$("#data tbody").on("click", "button", function () {
    rowIndex = $(this).closest('tr').index();
    console.log(rowIndex);
    removeProduct()
})

function removeProduct()
{
    var table = document.getElementById("webcartTable");
    table.deleteRow(rowIndex+1);
}

function updateWebshopPage(value)
{
    $.ajax({
        url: "",
        type: "post",
        data: {"page" : value},
        //dataType: "json",
        success: function(response) {
            // console.log(response);
            //$("#whole").html("");
            $("#shoplist").html(response);
        }
    });
}

function addTable(productCode, productName, price)
{
    var bool;
    $("#webcartTable tbody tr").each(function() {
        var value = $(this).find("td:first").text();
        if (value==productCode)
        {
            var quantity = $(this).find("td").eq(2).html();
            quantity = parseInt(quantity, 10)+1;
            $(this).find("td").eq(2).text(quantity);
            var price = $(this).find("td").eq(3).html();
            price = parseFloat(price, 10);
            var totalprice = quantity*price;
            $(this).find("td").eq(4).text(totalprice);
            bool = 1;
        }
    });
    if (bool!=1)
    {
        var table = document.getElementById("webcartTable");
        var row = table.insertRow(webcartTable.rows.length-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        button  = document.createElement("button");
        button.type = "button";
        //button.className = "btn btn-default";
        span = document.createElement("span");
        span.className = "glyphicon glyphicon-minus";
        button.appendChild(span);
        cell6.appendChild(button);
        cell1.innerHTML = productCode;
        cell2.innerHTML = productName;
        cell3.innerHTML = 1;
        cell4.innerHTML = price;
        cell5.innerHTML = price * 1;
    }
    //var pricetotal = $("#webcartTable tbody tr:last").find("td").eq(1).html();
    var pricetotal = 0;
    /*console.log(pricetotal);
    pricetotal = parseFloat(pricetotal);
    console.log(pricetotal);*/
    $("#webcartTable tbody tr:not('#total')").each(function() {
        var oneprice = $(this).find("td").eq(4).html();
        oneprice = parseFloat(oneprice, 10);
        //console.log(oneprice);
        pricetotal = oneprice + pricetotal;
        //console.log(pricetotal);
    });
    $("#webcartTable tbody tr:last").find("td").eq(1).text(pricetotal);

}

function getTable()
{
    var rowcount = $('#webcartTable tr').length;
    if (rowcount<=2) {
        alert("Niste stavili niti jedan artikl");
    }
    else {
    var headers = [];
    var array = [];
    $('#webcartTable th').each(function(index, item) {
        headers[index] = $(item).html();
    });
    $('#webcartTable tr:not("#total")').has('td').each(function() {
        var arrayItem = {};
        $('td', $(this)).each(function(index, item) {
            arrayItem[headers[index]] = $(item).html();
        });
        array.push(arrayItem);
    });

    sendOrder(JSON.stringify(array));
    //alert(JSON.stringify(array));
    }
}

function sendOrder(data)
{
    $.ajax({
        url: "orders/create",
        type: "post",
        data: {"data" : data},
        success: function(response) {
            $("#data").html(response);
        }
    });
}

