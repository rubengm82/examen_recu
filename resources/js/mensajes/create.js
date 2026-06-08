document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let form = document.getElementById("createForm");
    const messageContent = document.getElementById("createMessage");
    let destinatario_select_id = document.getElementById('destinatario_select_id');

    
    // GET USERS DESTINATARIOS
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
        let destinatarios = data.destinatarios;
        console.log(destinatarios);
        
        destinatarios.forEach(destinatario => {
            let option = document.createElement('option');

            option.text = destinatario.name;
            option.value = destinatario.id;
            destinatario_select_id.append(option)
        });
    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    });


    // BOTON ACEPTAR
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        messageContent.innerHTML = "";
        const formData = new FormData(form);

        fetch("/api/mensajes", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            credentials: "same-origin",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            messageContent.innerHTML = `<p>${data.message}</p>`;
            if (data.message === "Creado correctamente") {
                form.reset();
            }
        })
        .catch(error => {
            console.log("Error al crear");
            console.error(error);
            messageContent.innerHTML = "<p>Ha ocurrido un error al crear</p>";
        })
    })
});