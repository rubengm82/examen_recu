document.addEventListener("DOMContentLoaded", () => {
    console.log("Se conecta al create de projects")
    let form = document.getElementById("createProjectForm");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const messageContent = document.getElementById("createProjectMessage");
    
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        messageContent.innerHTML = "";
        const formData = new FormData(form);

        // Peticion para crear el projecto
        fetch("/api/projects", {
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
            if (data.message === "Creado correctamente") {
                form.reset();
            }
        })
        .catch(error => {
            console.log("Error al crear el coche");
            console.error(error);
            messageContent.innerHTML = "<p>Ha ocurrido un error al crear el coche</p>";
        })
    })
});
