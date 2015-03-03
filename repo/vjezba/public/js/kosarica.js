

document.getElementById("Artikal").addEventListener("change", selektiraniArtikl)

var artikl;

function selektiraniArtikl(){
    artikl = this.value;
    console.log(this.value);
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

function removeArtikl()
{
    var x = document.getElementById("kosarica");
    x.remove(x.selectedIndex);
}