document.addEventListener("DOMContentLoaded", () => {
    const editCarData = document.getElementById("editCarData");
    const form = document.getElementById("editCarForm");
    const messageContent = document.getElementById("editCarMessage");
    const carId = editCarData.dataset.id;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(`/api/cars/${carId}`, {
        method: "GET",
        headers: {
            "Accept": "application/json"
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        // Se rellena el contenido de los inputs con los datos del coche que se intenta editar
        if (data.car) {
            document.getElementById("name").value = data.car.name;
            document.getElementById("model").value = data.car.model;
            document.getElementById("price").value = data.car.price;
        } else {
            editCarData.innerHTML = `<p>${data.message}</p>`;
        }
    })
    .catch(error => {
        console.log("Error al cargar el coche");
        console.error(error);
    });

    // Para cuando se envia el formulario de edicion de un coche
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        messageContent.innerHTML = "";

        const formData = new FormData(form);
        // Se especifica que el metodo que se envia es PUT
        formData.append("_method", "PUT");

        fetch(`/api/cars/${carId}`, {
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
            console.log("Error al editar el coche");
            console.error(error);
            messageContent.innerHTML = "<p>Ha ocurrido un error al editar el coche</p>";
        });
    });
});
