document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const mensajeID = document.getElementById("showData").dataset.id;
    let contenido_show = document.getElementById('contenido_show');
    console.log(contenido_show);
    

    fetch(`/api/mensajes/${mensajeID}`, {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let mensaje = data.mensaje;
        console.log(mensaje);

        contenido_show.innerHTML += `
            Fecha: ${mensaje.created_at}<br>
            De: ${mensaje.remitente_id}<br>
            Para: ${mensaje.destinatario_id}<br>
            Asunto: ${mensaje.asunto}<br>
            Mensaje: ${mensaje.mensaje}<br>
        `;
        
        
    })
    .catch(error => {
        console.log("Error al mostrar el item");
        console.error(error);
    });

});