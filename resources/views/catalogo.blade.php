<?php
    /** 
     * 
     * --FERA DEL 03 DE MARZO DESDE LAS 22:01 HASTA LA 01:25 DEL 04 DE MARZO
     * --MSCA ALEMÁN PEPSI LIVE CENTER
     * --GIFO SMN
     *  
    */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<!-- <script src="https://gist.github.com/fredyfx/f3cfb8de0edc80a3946606fb8d31046d.js"></script> -->
<script>
    //Declaramos nuestra peticion para consulta de api donde está el JSON
    const requestURL = 'https://api.themoviedb.org/3/trending/all/week?api_key=dd974a88eac4b6306518cfba28e6e350'
    //Declaramos un objeto para hacer la solicitud
    const request = new XMLHttpRequest();

    //Para definir que tipo de solicitud queremos, utilizamos el método open
    //pasando como primer parametro el tipo GET en este caso, como segundo
    //parametro será el enlace de nuestro JSON
    request.open('GET', requestURL);

    //Indicamos que la respuesta es de tipo JSON
    request.responseType = 'json';

    //Enviamos nuestra solicitud mediante el método send
    request.send();


    request.onload = function() {

        //declaramos la variable películas qué almacenará la solicitud del JSON (así es como lo entiendo, pero en serio que no entiedo la docuemntación de esto)
        const peliculas = request.response;

        //llamamos a las funciones para cargar al iniciar
        topSemanal(peliculas);
        peliculas(peliculas);
    }

    function topSemanal(jsonObj) {
        //Hay que hacer un if para validar si es tv o es movie
        //pues ya se nos entrega el top, sólo importa identificar
        //el formato del contenido visual
        if(jsonObj['media_type'].sitringify() == 'tv'){
            const tReal = document.createElement('h1');
            tReal.textContext = jsonObj['name'];    
            header.appendChild(tReal);
        }else{
            const tPeliculas = document.createElement('h1');
            tPeliculas.textContext = jsonObj['name'];
            header.appendChild(tPeliculas);
        }

        //Queda pendiente la función para mostrar las targetas
        //de las películas 01:25 -F
    }
    
    pelicula.textContent = 'Hometown: ' + jsonObj['homeTwon'] + ''
</script>
</html>