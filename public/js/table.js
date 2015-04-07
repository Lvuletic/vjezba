
$("#narudzbe tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();
    //$("#code").val(value);
    //clickB();
    console.log(value);
    showItems(value);

});

function clickB()
{
    document.getElementById("showOrderItems").click();
}

function showItems(value)
{
    $.ajax({
       url: "index",
       type: "post",
       data: {"code" : value},
       success: function(response) {
           $("#scroll2").html(response);
       }
    });
}

function updatePage(value)
{
    $.ajax({
        url: "index",
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
