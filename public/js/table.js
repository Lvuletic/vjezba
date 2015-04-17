
$("#whole").on("click", "tr", function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();
    //$("#code").val(value);
    console.log(value);
    showItems(value);

});

function showItems(value)
{
    $.ajax({
       url: "",
       type: "post",
       data: {"code" : value},
       success: function(response) {
           $("#orderDetails").html(response);
       }
    });
}

function updatePage(value)
{
    $.ajax({
        url: "",
        type: "post",
        data: {"page" : value},
        //dataType: "json",
        success: function(response) {
            // console.log(response);
            //$("#whole").html("");
            $("#whole").html(response);
        }
    });
}

function updateCustomerPage(value)
{
    $.ajax({
        url: "orderlist/customer",
        type: "post",
        data: {"page" : value},
        //dataType: "json",
        success: function(response) {
            // console.log(response);
            //$("#whole").html("");
            $("#whole").html(response);
        }
    });
}

$(document).ready( function() {
    $('.dropdown-toggle').dropdown();
});
