
$("#narudzbe tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();
    $("#odabir").val(value);
    clickB();

});

function clickB()
{
    document.getElementById("prikazStavki").click();

}