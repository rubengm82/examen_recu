document.addEventListener("DOMContentLoaded", () => {
    let form = document.getElementById("createCardForm");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const messageContent = document.getElementById("createCarMessage");

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        messageContent.innerHTML = "";
        const formData = new FormData(form);

        // Peticion para crear el coche
        fetch("/api/cars", {
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
            if (data.message === "Coche creado correctamente") {
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
