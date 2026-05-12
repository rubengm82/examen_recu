document.addEventListener("DOMContentLoaded", () => {

    let form = document.getElementById("createCardForm");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(form);
        console.log(formData)
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
            console.log(data)
        })
    })
});
