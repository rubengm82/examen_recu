document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const form = document.getElementById('createForm');
    const messageContent = document.getElementById('createMessage');
    
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        let formData = new FormData(form);
        fetch("/api/bikes", {
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
            console.log("Error al crear");
            console.error(error);
            messageContent.innerHTML = "<p>Ha ocurrido un error al crear</p>";
        })
    });

});