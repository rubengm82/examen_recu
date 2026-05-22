document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

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
        // console.log(data.bikes);

        let bikes = data.bikes;
        let div_sidebar = document.querySelectorAll('.sidebar')[0];
        let div_featured = document.querySelectorAll('.featured')[0];
        let div_news = document.querySelectorAll('.news')[0];

        div_sidebar.innerHTML += `<h2>Llistat de Bikes</h2>`
        
        if (bikes == null) {
            div_sidebar.innerHTML += `
                <div>
                    <p>${data.message}</p>
                </div>
            `;
        } else {
            bikes.forEach(bike => {
                div_sidebar.innerHTML += `
                    <div>
                        <p class='sidebar_item_name' data-id='${bike.id}'>${bike.marca} ${bike.modelo}</p>
                        <a href="/bikes/${bike.id}/edit">Editar</a>
                        <button class='sidebar_item_delete' data-id='${bike.id}'>Eliminar</button>
                    </div>
                `;
            });

            // CENTRO CON EL ITEM MAS ANTIGUO
            let bikeLast = bikes[0];
            // console.log(bikeLast);
            
            div_featured.innerHTML = `
                Marca: ${bikeLast.marca}<br>
                Modelo: ${bikeLast.modelo}<br>
                Año: ${bikeLast.anyo}<br>
            `;

            let partsLast = bikeLast.parts;
            partsLast.forEach(partLast => {
                let div_card = document.createElement('div');
                div_card.classList.add('card');
                div_card.innerHTML = `${partLast.nombre}`;

                // LISTA MOTOS QUE LLEVAN ESA PIEZA
                div_card.innerHTML += `<br><br>Usada en:<br>`;
                if (partLast.bikes && partLast.bikes.length > 0) {
                    partLast.bikes.forEach(bike => {
                        div_card.innerHTML += `· ${bike.marca} ${bike.modelo}<br>`;
                    });
                } else {
                    div_card.innerHTML += `Ninguna bike<br>`;
                }
                
                div_news.appendChild(div_card);
            });
            
             // Si no hay piezas te lo pone en un div
            if(bikeLast.parts.length == 0) {
                let div_card = document.createElement('div');
                div_card.classList.add('card');
                div_card.style.backgroundColor = '#d95959';
                div_card.innerHTML = `No hay piezas`;
                div_news.appendChild(div_card);
            }
        }
        
        // CLICK <P> SIDEBAR ITEMS
        let sidebar_items_p = document.querySelectorAll('.sidebar_item_name');
        // console.log(sidebar_items_p);

        sidebar_items_p.forEach(sidebar_item => {
            sidebar_item.addEventListener('click', (e) => {
                
                let bikeId = sidebar_item.dataset.id;

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
                        Marca: ${bike.marca}<br>
                        Modelo: ${bike.modelo}<br>
                        Año: ${bike.anyo}<br>
                    `;

                    let parts = bike.parts;
                    div_news.innerHTML = '';
                    parts.forEach(part => {
                        let div_card = document.createElement('div');
                        div_card.classList.add('card');
                        div_card.innerHTML = `${part.nombre}`;

                        // LISTA MOTOS QUE LLEVAN ESA PIEZA
                        div_card.innerHTML += `<br><br>Usada en:<br>`;
                        if (part.bikes && part.bikes.length > 0) {
                            part.bikes.forEach(bike => {
                                div_card.innerHTML += `· ${bike.marca} ${bike.modelo}<br>`;
                            });
                        } else {
                            div_card.innerHTML += `Ninguna bike<br>`;
                        }

                        div_news.appendChild(div_card);
                    });       
                    
                    // Si no hay piezas te lo pone en un div
                    if(parts.length == 0) {
                        let div_card = document.createElement('div');
                        div_card.classList.add('card');
                        div_card.style.backgroundColor = '#d95959';
                        div_card.innerHTML = `No hay piezas`;
                        div_news.appendChild(div_card);
                    }  
                })
                .catch(error => {
                    console.log("Error al mostrar el item");
                    console.error(error);
                });
                
            });
        });

        // CLICK <DELETE BUTTONS> SIDEBAR ITEMS
        let sidebar_items_delete = document.querySelectorAll('.sidebar_item_delete');

        sidebar_items_delete.forEach(buttonDelete => {
            buttonDelete.addEventListener('click', (e) => {
                const bikeId = buttonDelete.dataset.id;
                
                fetch(`/api/bikes/${bikeId}`, {
                    method: "DELETE",
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    credentials: "same-origin"
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === "Eliminado correctamente") {
                        buttonDelete.parentElement.remove();
                    }
                    console.log(data.message);
                })
                .catch(error => {
                    console.log("Error al eliminar el item");
                    console.error(error);
                });

            })
        });

    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    });

});