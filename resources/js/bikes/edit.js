document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let bikeId = document.getElementById('editData').dataset.id;
    let form = document.getElementById('editForm');
    let messageContent = document.getElementById('editMessage');

    //
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
        
        // RELLENAMOS LOS INPUTS CON LOS VALORES DE LA DATA
        let input_marca = document.getElementById('marca');
        let input_modelo = document.getElementById('modelo');
        let input_anyo = document.getElementById('anyo');

        input_marca.value = bike.marca;
        input_modelo.value = bike.modelo;
        input_anyo.value = bike.anyo;
        
        // EVENT DEL BOTON ACEPTAR
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
        
    })
    .catch(error => {
        console.log("Error al mostrar el item");
        console.error(error);
    });

});