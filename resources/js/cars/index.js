document.addEventListener("DOMContentLoaded", () => {
    console.log("Se conecta al index de cars");
    // Se obtiene el contenedor que muestra los coches
    const carsContent = document.querySelector(".showCars");

    // Se hace la peticion para obtener los datos del controller API de laravel
    fetch("api/cars")
    .then(response => response.json())
    .then(data => {
        let content = "";
        if (data.cars == null) {
            content = `<p>${data.message}</p>`
        } else {
            data.cars.forEach(car => {
                content += `<p>Nombre:${car.model}</p>`
            });
        }
        carsContent.innerHTML = content;
    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    })
});
