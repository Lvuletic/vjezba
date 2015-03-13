
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

function updatePage(value)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("rezultati").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "index?page="+value, true);
    xmlhttp.send();
}