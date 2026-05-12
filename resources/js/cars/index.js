document.addEventListener("DOMContentLoaded", () => {
    console.log("Se conecta al index de cars");
    const carsContent = document.querySelector(".showCars");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch("/api/cars", {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let content = "";
        if (data.cars == null) {
            content = `<p>${data.message}</p>`;
        } else {
            data.cars.forEach(car => {
                content += `
                    <div class="car-item" data-id="${car.id}">
                        <p>Nombre: ${car.name}</p>
                        <p>Modelo: ${car.model}</p>
                        <p>Precio: ${car.price}</p>
                        <a href="/cars/${car.id}">Ver</a>
                        <a href="/cars/${car.id}/edit">Editar</a>
                        <button class="delete-car-button" data-id="${car.id}">Eliminar</button>
                    </div>
                `;
            });
        }

        // Cuando se intenta eliminar un coche
        carsContent.innerHTML = content;

        const deleteButtons = document.querySelectorAll(".delete-car-button");

        // Event listener del click de los botones de eliminar coches
        deleteButtons.forEach(button => {
            button.addEventListener("click", () => {
                const carId = button.dataset.id;

                fetch(`/api/cars/${carId}`, {
                    method: "DELETE",
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    credentials: "same-origin"
                })
                .then(response => response.json())
                .then(deleteData => {
                    console.log(deleteData);
                    if (deleteData.message === "Coche eliminado correctamente") {
                        button.parentElement.remove();
                    }
                })
                .catch(error => {
                    console.log("Error al eliminar el coche");
                    console.error(error);
                });
            });
        });
    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    })
});
