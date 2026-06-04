document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let div_sidebar = document.querySelector('.sidebar');
    let div_featured = document.querySelector('.featured');
    let div_news = document.querySelector('.news');

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

        div_sidebar.innerHTML = '<h2>Llistat de Items</h2>';

        bikes.forEach(bike => {
            div_sidebar.innerHTML += `
                <div>
                    <p class='item-p-sidebar' data-id=${bike.id}>${bike.marca} ${bike.modelo}</p>
                    <a href='bikes/${bike.id}/edit' class='item-editar-sidebar' data-id=${bike.id}>editar</a>
                    <button class='item-borrar-sidebar' data-id=${bike.id}>eliminar</button>
                </div>            
            `;
        });

        let lastBike = bikes[0];
        div_featured.innerHTML = `
            <p>MARCA: ${lastBike.marca}</p>
            <p>MODELO: ${lastBike.modelo}</p>
            <p>ID: ${lastBike.id}</p>
        `;

        lastBike.parts.forEach(part => {
            div_news.innerHTML += `
                <div>NOMBRE: ${part.nombre} | PRECIO: ${part.precio}</div>
            `;
        });
        

        // CLICK MENU SIDEBAR
        let items_p_sidebar = document.querySelectorAll('.item-p-sidebar');
        
        items_p_sidebar.forEach(item_p_sidebar => {
            item_p_sidebar.addEventListener('click', (e) => {
                
                let bikeId = item_p_sidebar.dataset.id;
                
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

                    div_featured.innerHTML = '';
                    div_featured.innerHTML = `
                    <p>MARCA: ${bike.marca}</p>
                    <p>MODELO: ${bike.modelo}</p>
                    <p>ID: ${bike.id}</p>
                `;

                div_news.innerHTML = '';
                if (bike.parts.length > 0) {
                    bike.parts.forEach(part => {
                        div_news.innerHTML += `
                            <div>NOMBRE: ${part.nombre} | PRECIO: ${part.precio}</div>
                        `;
                    });
                } else {
                    div_news.innerHTML += `
                        <div>NO HAY PIEZAS</div>
                    `;
                }
                })
                .catch(error => {
                    console.log("Error al mostrar el item");
                    console.error(error);
                });

            });
        });

        // CLICK BORRAR SIDEBAR
        let items_borrar_sidebar = document.querySelectorAll('.item-borrar-sidebar');

        items_borrar_sidebar.forEach(item_borrar_sidebar => {
            item_borrar_sidebar.addEventListener('click', (e) => {
                
                let bikeId = item_borrar_sidebar.dataset.id;
                
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
                        item_borrar_sidebar.parentElement.remove();
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