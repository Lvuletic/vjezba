
$("#narudzbe tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();
    $("#code").val(value);
    clickB();

});

function clickB()
{
    document.getElementById("showOrderItems").click();
}

function showItems(value)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("scroll2").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "items?page="+value, true);
    xmlhttp.send();
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
