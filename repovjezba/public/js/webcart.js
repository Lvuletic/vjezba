

document.getElementById("product").addEventListener("change", selectedProduct)

var product;

function selectedProduct(){
    product = this.value;
    console.log(this.value);
}

function addArtikal() {
    var selectbox = document.getElementById("webcart");
    var quantity = 1;
        var options = selectbox.options;
        for (var i = 0; i < options.length; i++)
        {
            if (product == options[i].text.slice(0,-1)) {
                var foundProduct = options[i].text;
                var productName = foundProduct.slice(0, -1)
                var newQuantity = foundProduct.slice(-1);
                newQuantity++;
                var changedItem = productName.concat(newQuantity);
                options[i].text = changedItem;
                return true;
            }

        }
    var item = document.createElement("option");
    var newitem = product.concat(quantity);
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

function removeArtikal()
{
    var selectbox = document.getElementById("webcart");
    selectbox.remove(x.selectedIndex);
}