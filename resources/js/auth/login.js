document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    const errorsContainer = document.getElementById("loginErrors");

    if (form && errorsContainer) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            errorsContainer.innerHTML = "";

            const formData = new FormData(form);

            fetch("/login", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
                credentials: "same-origin",
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.redirect) {
                        // Se redirige a la url que se pasa de respuesta dentro del backend
                        window.location.href = data.redirect;
                    } else if (data.errors) {
                        const messages = Object.values(data.errors).flat();
                        errorsContainer.innerHTML = `<ul>${messages.map((message) => `<li>${message}</li>`).join("")}</ul>`;
                    } else if (data.message) {
                        errorsContainer.innerHTML = `<p>${data.message}</p>`;
                    }
                })
                .catch((error) => {
                    console.error(error);
                    errorsContainer.innerHTML = "<p>Ha ocurrido un error al iniciar sesion.</p>";
                });
        });
    }
});
