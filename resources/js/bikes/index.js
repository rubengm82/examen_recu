document.addEventListener('DOMContentLoaded', () => {
    let div_sidebar = document.querySelector('.sidebar');
    let div_featured = document.querySelector('.featured');
    let div_news = document.querySelector('.news');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    
    div_sidebar.innerHTML = '<h2>Llistat de Items</h2>';

    fetch("/api/bikes", {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let bikes = data.bikes
        // console.log(data);

        // SIDEBAR DE BIKES
        bikes.forEach(bike => {
            div_sidebar.innerHTML += `
                <div>
                    <p class='sidebar_item' data-id='${bike.id}'>${bike.marca} ${bike.modelo}</p>
                    <a href='/bikes/${bike.id}/edit' data-id='${bike.id}'>Editar</a> 
                    <button class='sidebar_eliminar' data-id='${bike.id}'>Eliminar</button> 
                </div>
            `;            
        });

        // ULTIMA BIKE
        let lastBike = bikes[0];
        
        div_featured.innerHTML = `
        ${lastBike.marca}<br>
        ${lastBike.modelo}<br>
        ${lastBike.cilindrada}<br>
        ${lastBike.gasolina ? 'GASOLINA' : 'NO GASOLINA'}<br>
        `;
        
        lastBike.piezas.forEach(pieza => {
            div_news.innerHTML += `
                <article class="card">${pieza.nombre}<br>${pieza.precio}</article>
            `;
        });


        // SIDEBAR ITEMS CLICKABLES
        let items_sidebar = document.querySelectorAll('.sidebar_item');
        // console.log(items_sidebar);
        
        items_sidebar.forEach(item_sidebar => {
            item_sidebar.addEventListener('click', (e) => {
                let bikeId = item_sidebar.dataset.id;
                // let bikeId = e.currentTarget.dataset.id;
                // console.log(bikeId);

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
                    // console.log(data.bike);
                    let bike = data.bike;

                     div_featured.innerHTML = `
                    ${bike.marca}<br>
                    ${bike.modelo}<br>
                    ${bike.cilindrada}<br>
                    ${bike.gasolina ? 'GASOLINA' : 'NO GASOLINA'}<br>
                    `;
                    
                    div_news.innerHTML = '';
                    if(bike.piezas.length > 0) {
                        bike.piezas.forEach(pieza => {
                            div_news.innerHTML += `
                                <article class="card">${pieza.nombre}<br>${pieza.precio}</article>
                            `;
                        });
                    } else {
                        div_news.innerHTML = `
                            <article class="card">NO HAY PIEZAS</article>
                        `;
                    }
                    
                })
                .catch(error => {
                    console.log("Error al mostrar el item");
                    console.error(error);
                });
            });
        });
        
        // SIDEBAR DELETE BUTTONS
        let delete_items_sidebar = document.querySelectorAll('.sidebar_eliminar');
        
        delete_items_sidebar.forEach(deleteButton => {
            deleteButton.addEventListener('click', () => {
                const bikeId = deleteButton.dataset.id;

                fetch(`/api/bikes/${bikeId}`, {
                    method: "DELETE",
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    credentials: "same-origin"
                })
                .then(response => response.json())
                .then(deleteData => {
                    if (deleteData.message === "Eliminado correctamente") {
                        deleteButton.parentElement.remove();
                    }
                    console.log(deleteData.message);
                })
                .catch(error => {
                    console.log("Error al eliminar el item");
                    console.error(error);
                });
            });

        });
    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    });
});
