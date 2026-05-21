document.addEventListener("DOMContentLoaded", () => {
    const editData = document.getElementById("editData");
    const form = document.getElementById("editForm");
    const messageContent = document.getElementById("editMessage");
    const itemId = editData.dataset.id;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(`/api/projects/${itemId}`, {
        method: "GET",
        headers: {
            "Accept": "application/json"
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        // Se rellena el contenido de los inputs con los datos de data
        if (data.project) {
            document.getElementById("nombre").value = data.project.nombre;
            document.getElementById("descripcion").value = data.project.descripcion;
            document.getElementById("fecha_inicio").value = data.project.fecha_inicio;
            document.getElementById("fecha_fin").value = data.project.fecha_fin;
        } else {
            editData.innerHTML = `<p>${data.message}</p>`;
        }
    })
    .catch(error => {
        console.log("Error al cargar el item");
        console.error(error);
    });

    // ////////////////////////////////////
    // CLICK EN BOTON ACEPTAR DE EDITAR //
    // ///////////////////////////////////
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        messageContent.innerHTML = "";

        const formData = new FormData(form);
        // Se especifica que el metodo que se envia es PUT
        formData.append("_method", "PUT");

        fetch(`/api/projects/${itemId}`, {
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
        })
        .catch(error => {
            console.log("Error al editar");
            console.error(error);
            messageContent.innerHTML = "<p>Ha ocurrido un error al editar</p>";
        });
    });

});