document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const div_mensajes_entrada = document.querySelector(".mensajes_entrada");
    const div_mensajes_salida = document.querySelector(".mensajes_salida");


    // GET ALL mensajes mios
    fetch("/api/mensajes", {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.mensajes);
        console.log(data.mensajesdestinatarios);

        let mensajesEntada = data.mensajes;
        let mensajesSalida = data.mensajesdestinatarios;

        div_mensajes_entrada.innerHTML = "Bandeja de Entrada"
        div_mensajes_salida.innerHTML = "Bandeja de Salida"

        // Mensajes de entrada
        mensajesEntada.forEach(mensaje => {
            div_mensajes_entrada.innerHTML += `
            <div class='div_mensaje'>
                <p class='p_click' data-id='${mensaje.id}'>Fecha: ${mensaje.created_at} De: ${mensaje.remitente_id} Asunto: ${mensaje.asunto}</p>
                <a href='/mensajes/${mensaje.id}' data-id='${mensaje.id}'>Ver</a>
            </div>
            `;
        });
        
         // Mensajes de salida
        mensajesSalida.forEach(mensaje => {
            div_mensajes_salida.innerHTML += `
            <div class='div_mensaje'>
                <p class='p_click' data-id='${mensaje.id}'>Fecha: ${mensaje.created_at} De: ${mensaje.remitente_id} Asunto: ${mensaje.asunto}</p>
                <a href='/mensajes/${mensaje.id}' data-id='${mensaje.id}'>Ver</a>
            </div>
            `;
        });

    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    });

});