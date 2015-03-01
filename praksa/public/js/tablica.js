/**
 * Created by Luka on 01/03/15.
 */

$("#narudzbe tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');
    var value=$(this).find('td:first').html();
    prikaziStavke(value);
});



function prikaziStavke(value)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("odabir").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "izracun?sifra="+value, true);
    xmlhttp.send();
}