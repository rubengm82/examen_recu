document.addEventListener("DOMContentLoaded", () => {
    const showCarContent = document.getElementById("showCarContent");
    const carId = showCarContent.dataset.id;

    fetch(`/api/cars/${carId}`, {
        method: "GET",
        headers: {
            "Accept": "application/json"
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let content = "";

        if (data.car == null) {
            content = `<p>${data.message}</p>`;
        } else {
            content = `
                <p>Nombre: ${data.car.name}</p>
                <p>Modelo: ${data.car.model}</p>
                <p>Precio: ${data.car.price}</p>
            `;
        }

        showCarContent.innerHTML = content;
    })
    .catch(error => {
        console.log("Error al mostrar el coche");
        console.error(error);
    });
});
