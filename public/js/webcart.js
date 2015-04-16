
document.getElementById("product").addEventListener("change", selectedProduct)

var product;

function selectedProduct(){
    product = this.value;
    console.log(this.value);
}

function addProduct(product) {
    var selectbox = document.getElementById("webcart");
    var quantity = 1;
        var options = selectbox.options;
        for (var i = 0; i < options.length; i++)
        {
            if (product == options[i].text.slice(0,-2)) {
                var foundProduct = options[i].text;
                var productName = foundProduct.slice(0, -1)
                var newQuantity = foundProduct.slice(-1);
                newQuantity++;
                var changedItem = productName.concat(newQuantity);
                options[i].text = changedItem;
                return true;
            }
        }
    var newitem = product;
    var item = document.createElement("option");
    var newitem = newitem.concat(" "+quantity);
    item.text = newitem;
    selectbox.add(item);

}

function selectAll()
{
    selectBox = document.getElementById("webcart");
    for (var i = 0; i < selectBox.options.length; i++)
    {
        selectBox.options[i].selected = true;
    }
}

function removeProduct()
{
    var selectbox = document.getElementById("webcart");
    selectbox.remove(selectbox.selectedIndex);
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

function addTable()
{
    var table = document.getElementById("webcartTable");
    var row = table.insertRow(webcartTable.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "kruh";
    cell2.innerHTML = "5";
    cell3.innerHTML = "25";
    fillSelectBox();
}

function fillSelectBox()
{
    $('#webcartTable tr').each(function (index, value)
    {
        var row = webcartTable[1].cells[0].innerHTML;
        var selectbox = document.getElementById("webcart");
        var item = document.createElement("option");
        item.text = row;
        selectbox.add(item);
    });
}
