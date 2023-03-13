function activar(){
    let n_sub = document.getElementById('n_sub');
    let checkbox = document.getElementById('count-enable');
    if (checkbox.checked == true) {
        n_sub.disabled = false;
        n_sub.style.display = "block";
    } else {
        
        n_sub.style.display = "none";
        n_sub.disabled=true;
    }
    document.getElementsByName('suscription_numer')[0].placeholder = "ingresa tu numero de subscriptor";
    
}
