/**
 * Created by Luka on 28/02/15.
 */

var artikl;
document.getElementById("Artikal").addEventListener("change", art)
document.getElementById("select2").addEventListener("click", selectAll)
function art(){
    artikl = this.value;
}

function puniKosaricu() {
    var x = document.getElementById("kosarica");
    var stavka = document.createElement("option");
    stavka.text = artikl;
    x.add(stavka);
}

function selectAll()
{
    selectBox = document.getElementById("kosarica");
    for (var i = 0; i < selectBox.options.length; i++)
    {
        selectBox.options[i].selected = true;
    }
}