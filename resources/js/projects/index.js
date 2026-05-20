document.addEventListener("DOMContentLoaded", () => {
    const projectContent = document.querySelector(".sidebar");
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
            content += "<h2>Llistat del meus projectes</h2>"
            data.projects.forEach(project => {
                content += `
                <div class="project-element">
                    <p class='project-name' data-id='${project.id}'>${project.nombre}</p>
                    <a href="/projects/${project.id}/edit">Editar</a>
                    <button class="delete-project-button" data-id="${project.id}">Eliminar</button>

                </div>
                `;
            });
            // Para poner el primero proyecto en el centros
            let article = document.querySelector(".featured");
            let firstProject = data.projects[0];
            article.innerHTML = `${firstProject.nombre}: ${firstProject.descripcion}`

            // Para poder mostrar las tasks del primer proyecto en su sitio
            let contentTasksFirst = ""
            const tasksContainerFirst = document.querySelector(".news");
            if (firstProject.tasks.length > 0) {
                firstProject.tasks.forEach(projectTask => {
                    contentTasksFirst += `<article class="card">${projectTask.descripcion}</article>`
                });
            } else{
                contentTasksFirst += "<article class='card'>Este proyecto no tiene tareas</article>"
            }
            tasksContainerFirst.innerHTML = contentTasksFirst;


        }
        projectContent.innerHTML = content;

        // Eliminar el proyecto
        const deleteButtons = document.querySelectorAll(".delete-project-button");

        // Event listener del click de los botones de eliminar proyectos
        deleteButtons.forEach(button => {
            button.addEventListener("click", () => {
                const projectId = button.dataset.id;

                fetch(`/api/projects/${projectId}`, {
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
                        button.parentElement.remove();
                    }
                    console.log(deleteData.message);
                })
                .catch(error => {
                    console.log("Error al eliminar el proyecto");
                    console.error(error);
                });
            });
        });

        // Se usa para obtener los datos del proyecto al que se hace click

        const projectClickables = document.querySelectorAll(".project-name");
        projectClickables.forEach(projectClickable => {
            projectClickable.addEventListener("click", () => {
                // peticion
                fetch(`/api/projects/${projectClickable.dataset.id}`, {
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
                        // Se pone el texto en el centro y se modifican las tasks
                        let atricleElement = document.querySelector(".featured");
                        atricleElement.innerHTML = `${data.project.nombre}: ${data.project.descripcion}`

                        // Se ponen las tasks en la pagina
                        const projectTasks = data.project.tasks;

                        // Obtener las tareas el proyecto y mostrarlas en la derecha
                        const tasksContainer = document.querySelector(".news");

                        let contentTasks = "";
                        if (projectTasks.length > 0) {
                            projectTasks.forEach(projectTask => {
                                contentTasks += `<article class="card">${projectTask.descripcion}</article>`
                            });
                            console.log("Entra dentro del condicional")
                        } else{
                            console.log("Entra fuera del condicional")
                            contentTasks += "<article class='card'>Este proyecto no tiene tareas</article>"
                        }
                        tasksContainer.innerHTML = contentTasks;
                    }
                })
                .catch(error => {
                    console.log("Error al mostrar el proyecto");
                    console.error(error);
                });

                console.log(projectClickable.dataset.id);
            })
        });



    })
    .catch(error => {
        console.log("Error al hacer la peticion");
        console.error(error);
    })
});
