let i=0;
let pn='pname';
let pa='pamount';
let ad='add'



function add(){
    i++;
    let j=i-1;
    let myhtml='<div class="form-group row" ><div class="col-8"> <input required type="text" class="form-control" name="product[\'name\'][]" id="pname'+i+'" placeholder="Product Name"></div>'+
        '<div class="col-4"> <div class="input-group mb-3"> <span class="input-group-text">₹</span>'+
        '<input required type="number" class="form-control" name="product[\'amount\'][]" id="pamount'+i+'" oninput=\'totall()\'aria-label="Amount" placeholder="Price"> </div></div></div><div id="add'+i+'"></div>';

    document.getElementById(ad+j).innerHTML=myhtml;
    document.getElementById('i').value=i;
    totall();
    pay();

}
function del(){
    i--;
    document.getElementById(ad+i).innerHTML="";
    document.getElementById('i').value=i;
    totall();
    pay();
}

function totall(){
    let tot= 0;
    for (let m=0; m<=i; m++){
        tot=+document.getElementById(pa+m).value + +tot;

    }
    document.getElementById("total").value=tot;
    pay();
}

function pay(){
    let paid= +document.getElementById('paid').value ;
    let total= +document.getElementById('total').value;
    document.getElementById("balance").value=total-paid;
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}


