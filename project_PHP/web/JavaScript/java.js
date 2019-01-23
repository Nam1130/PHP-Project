
var arrayProductStore = [];

var Product = [
    {
        name_product: 'Đồng Hồ Tissot 6.7',
        price: 2.562000,
        quantity: 100,
        code: 'EFV-540L-1AVUDF'
    },
    {
        name_product: 'Đồng Hồ Tissot 8.',
        price: 2.562000,
        quantity: 100,
        code: 'EFV-540L-2AVUDF'
    }
]
// sessionStorage.setItem('arrayProduct', JSON.stringify(arrProduct));
// var list = sessionStorage.getItem('arrProduct');





//mua
var arrProduct = [];


// set tên sau khi đăng nhập
    function account(){
        var name = document.getElementById("input_name").value;
        sessionStorage.setItem('ten',name);

    }



// thêm sản phẩm
function addProduct(i) {

    var name_product = document.getElementsByName("namProduct")[i].innerHTML;

    var quantity = document.getElementsByName("quant[3]")[i].value;
    var code = document.getElementsByName("code")[i].innerHTML
    var price = document.getElementsByName("price")[i].innerHTML;

    var byProduct = {
        name_product: name_product,
        price: price,
        quantity: quantity,
        code: code
    }
    arrProduct.push(byProduct);


    sessionStorage.setItem('list1', JSON.stringify(arrProduct));
    


    var sl = parseInt(document.getElementById("cart").innerHTML);

    var sl1 = parseInt(document.getElementsByName("quant[3]")[0].value);
    var sl2 = parseInt(document.getElementsByName("quant[3]")[1].value);
    var totalSl;
   
    if (sl1 == 1 && sl2 == 1)
        totalSl = 0;
    if(sl1 == 1)
        totalSl = 0 + sl2;
    if(sl2 == 1)
        totalSl = 0 + sl1;
    if(sl1 != 1 && sl2 != 1)
        totalSl = sl1 + sl2;
    


   



    sessionStorage.setItem('SLpage2',totalSl);

    document.getElementById("cart").innerHTML = totalSl;

}
// tăng số lượng
function plus(i) {

    var productOld = parseInt(document.getElementsByName("quant[3]")[i].value);
    productOld = productOld + 1;
    document.getElementsByName("quant[3]")[i].value = productOld;

}
// giảm số lượng
function minus(i) {
    var productOld = parseInt(document.getElementsByName("quant[3]")[i].value);
    productOld = productOld - 1;
    document.getElementsByName("quant[3]")[i].value = productOld;
}







