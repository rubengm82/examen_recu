document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let form = document.getElementById('editForm');
    let bikeId = document.getElementById('editData').dataset.id;
    let messageContent = document.getElementById('editMessage');

    //GET ITEM para INPUTS
    fetch(`/api/bikes/${bikeId}`, {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let bike = data.bike;
        let input_marca = document.getElementById('marca').value = bike.marca;
        let modelo = document.getElementById('modelo').value = bike.modelo;
    })
    .catch(error => {
        console.log("Error al mostrar el item");
        console.error(error);
    });

    // CLICK ACTUALIZAR ACEPTAR BUTTON
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        formData.append("_method", "PUT");

        fetch(`/api/bikes/${bikeId}`, {
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