
function selection(select){
document.getElementById("paypal-button").disabled=false;
document.getElementById("choose_5").checked=false;
document.getElementById("choose_10").checked=false;
document.getElementById("choose_15").checked=false;
document.getElementById("choose_any").checked=false;


if(select.id == 'choose_any'){
    document.getElementById("any_amount").disabled=false;
}else{
    document.getElementById("any_amount").disabled=true;
}
select.checked=true;
}