<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    </header>

    <section>
    </section>
</body>
<!-- <script src="https://gist.github.com/fredyfx/f3cfb8de0edc80a3946606fb8d31046d.js"></script> -->
<script>
    const header = document.querySelector('header');
    const section = document.querySelector('section');

    //Declaramos nuestra peticion para consulta de api donde está el JSON
    const requestURL = 'https://api.themoviedb.org/3/trending/all/week?api_key=dd974a88eac4b6306518cfba28e6e350'
    //Declaramos un objeto para hacer la solicitud
    const request = new XMLHttpRequest();

    //Para definir que tipo de solicitud queremos, utilizamos el método open
    //pasando como primer parametro el tipo GET en este caso, como segundo
    //parametro será el enlace de nuestro JSON
    request.open('GET', requestURL);

    // ¡! POR CUESTIONES DEL TUTORIAL, ESTO SE REEMPLAZÓ !!
    // ¡! SIN EMBARGO, LO DEJARÉ AQUÍ, PORQUE TAMBIÉN ES POSIBLE USAR ESA PROPIEDAD ¡!

    //-------------------------------------------
    //Indicamos que la respuesta es de tipo JSON |
    //------------------------------------------

    request.responseType = 'text';

    //Enviamos nuestra solicitud mediante el método send
    request.send();

    //Al cargar nuestra solicitud...
    request.onload = function() {

        //declaramos la variable películas qué almacenará la solicitud del JSON (así es como lo entiendo, pero en serio que no entiedo la docuemntación de esto)
        const peliculasText = request.response;
        const peliculasJson = JSON.parse(peliculasText);

        //llamamos a las funciones para cargar al iniciar
        topSemanal(peliculasJson);
        peliculas(peliculasJson);
    }

    function topSemanal(jsonObj) {
        //Hay que hacer un if para validar si es tv o es movie
        //pues ya se nos entrega el top, sólo importa identificar
        //el formato del contenido visual

        //Declaramos una varible que almacene el valor que se encuentre
        //en el campo "media_type" del JSON, este campo está dentro de
        //results, y nos indica que tipo de formato es el contendio visual
        const mediaType = jsonObj['media_type'];

        //Validamos para si es igual a tv
        //esto porque el "media_type" de la película es "movie"
        //y la de las series es "tv"
        if (mediaType == 'tv') {
            //De ser veradero, entonces creamos un títlo para nuestra contenido
            //y obtenemos el valor del JSON, el campo name, y hay otro que es 
            //"orignal title" y sabemos a lo que se refiere, pero en verdad pefiero 
            //dejar eso escondido
            const tTitulo = document.createElement('h2');
            tTitulo.textContext = jsonObj['name'];    
            header.appendChild(tTitulo);
            
            //Ahpra para la sipnósis creamos un párrafo
            const tSipnosis = document.createElement('p');
            //Concatenamos tantillo
            //la sipnosis no se muestra como tal "sipnosis"
            //sino como "overview"
            tSipnosis.textContent = 'Sipnósis: ' +  jsonObj['overview'];
            header.appendChild(tSipnosis);
        } else {
            //Caso contrario, [_]
            //lo mismo para las peliculas                                                              
            const tTitulo = document.createElement('h2');
            tTitulo.textContext = jsonObj['title'];
            header.appendChild(tTitulo);

            const tSipnosis = document.createElement('p');
            tSipnosis.textContent = 'Sipnósis: ' +  jsonObj['overview'];
            header.appendChild(tSipnosis);
        }
    }
    /**FALTA PROBRAR EXHAUSTIVAMENTE */

    function peliculas(jsonObj) {
        //Declaramos la varible que almacenará el JSON
        //"results"
        const pelis = jsonObj['results'];

        //Un for para que nos imprima la totalidad de registros
        for (var i = 0; i < pelis.length; i++) {
            //Por lo que entiendo, es que la etiqueta "article" será almacenará
            //en las respectivas variables
            const nombre = document.createElement('article');
            const sipnosis = document.createElement('p');

            //usamos la función con la propiedad textContent
            //la cual pienso que es para inyectar directamente el texto
            //que contendrá la etiqueta "article" y "p", respectivamente
            nombre.textContent = pelis[i].title;
            //el valor que asignamos proviene de nuestra variable 
            //
            sipnosis.textContent = pelis[i].overview;
            
            //Mostramos nuestro contenido
            nombre.appendChild(sipnosis);

            section.appendChild(nombre);
        }
    }
</script>
</html>