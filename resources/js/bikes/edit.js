document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const bikeId = document.getElementById('editData').dataset.id;
    const form = document.getElementById('editForm');
    const messageContent = document.getElementById('editMessage');

    // Rellenar inputs
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
        console.log(data.bike);
        let bike = data.bike;

        document.getElementById('marca').value = bike.marca;
        document.getElementById('modelo').value = bike.modelo;
        document.getElementById('cilindrada').value = bike.cilindrada;
        document.getElementById('gasolina').value = bike.gasolina;
        
    })
    .catch(error => {
        console.log("Error al mostrar el item");
        console.error(error);
    });


    // BUTTON ACEPTAR DEL EDITAR
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
    })
        
});