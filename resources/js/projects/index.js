document.addEventListener("DOMContentLoaded", () => {
    const divContent = document.querySelector(".sidebar");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch("/api/projects", {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        let content = "";
        if (data.projects == null) {
            content = `<p>${data.message}</p>`;
        } else {
            content += "<h2>Listado de Items</h2>";
            data.projects.forEach(project => {
                content += `
                <div class="sidebar-items">
                    <div>
                        <p class='sidebar-item-name' data-id='${project.id}'>${project.nombre}</p>
                    </div>
                    <div>
                        <a href="/projects/${project.id}/edit">Editar</a>
                        <button class="delete-item-button" data-id="${project.id}">Eliminar</button>
                    </div>
                </div>
                `;
            });

            // PONER PRIMER PROYECTO EN EL CENTRO
            let article = document.querySelector(".featured");
            let firstProject = data.projects[0];
            // console.log(firstProject);
            
            article.innerHTML = `
                Nombre: ${firstProject.nombre}<br>
                Descripción: ${firstProject.descripcion}<br>
                Fecha incio: ${firstProject.fecha_inicio}<br>
                Fecha fin: ${firstProject.fecha_fin}<br>
            `

            // Para poder mostrar las tasks del primer proyecto en su sitio
            let contentTasksFirst = ""
            const tasksContainerFirst = document.querySelector(".news");
            if (firstProject.tasks.length > 0) {
                firstProject.tasks.forEach(projectTask => {
                    contentTasksFirst += `
                        <article class="card">
                            Descripción: ${projectTask.descripcion}<br>
                            Completada: ${projectTask.completada ? 'SI' : 'NO'}
                        </article>
                    `
                });
            } else{
                contentTasksFirst += "<article class='card'>No hay tareas</article>"
            }
            tasksContainerFirst.innerHTML = contentTasksFirst;

        }
        divContent.innerHTML = content;


        // ////////////////////////////////////
        // CLICK EN BOTON BORRAR DE SIDEBAR //
        // ///////////////////////////////////
        // Eliminar el proyecto
        const deleteButtons = document.querySelectorAll(".delete-item-button");

        // Event listener del click de los botones de eliminar proyectos
        deleteButtons.forEach(button => {
            button.addEventListener("click", () => {
                const itemId = button.dataset.id;

                fetch(`/api/projects/${itemId}`, {
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
                        button.parentElement.parentElement.remove();
                    }
                    console.log(deleteData.message);
                })
                .catch(error => {
                    console.log("Error al eliminar el proyecto");
                    console.error(error);
                });
            });
        });

        // /////////////////////////////////////
        // CLICK EN LINK PROYECTOS DE SIDEBAR //
        // /////////////////////////////////////
        // Se usa para obtener los datos del proyecto al que se hace click
        const sidebarItemsClickables = document.querySelectorAll(".sidebar-item-name");
        sidebarItemsClickables.forEach(itemClickable => {
            itemClickable.addEventListener("click", () => {
                // peticion
                fetch(`/api/projects/${itemClickable.dataset.id}`, {
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    credentials: "same-origin"
                })
                .then(response => response.json())
                .then(data => {
                    if (data.project) {
                        let atricleElement = document.querySelector(".featured");
                        atricleElement.innerHTML = `
                            Nombre: ${data.project.nombre}<br>
                            Descripción: ${data.project.descripcion}<br>
                            Fecha incio: ${data.project.fecha_inicio}<br>
                            Fecha fin: ${data.project.fecha_fin}<br>
                        `

                        // Se ponen las tasks en la pagina
                        const projectTasks = data.project.tasks;

                        // Obtener las tareas el proyecto y mostrarlas en la derecha
                        const tasksContainer = document.querySelector(".news");

                        let contentTasks = "";
                        if (projectTasks.length > 0) {
                            projectTasks.forEach(projectTask => {
                                contentTasks += `
                                    <article class="card">
                                        Descripción: ${projectTask.descripcion}<br>
                                        Completada: ${projectTask.completada ? 'SI' : 'NO'}
                                    </article>
                                `
                            });
                            // console.log("Entra dentro del condicional")
                        } else{
                            // console.log("Entra fuera del condicional")
                            contentTasks += "<article class='card'>No hay tareas</article>"
                        }
                        tasksContainer.innerHTML = contentTasks;
                    }
                })
                .catch(error => {
                    console.log("Error al mostrar el item");
                    console.error(error);
                });
                // console.log(itemClickable.dataset.id);
            })
        });
    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    })

});
