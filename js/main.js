document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("formCategoria");
    const errorMsg = document.getElementById("errorMsg");

    form.addEventListener("submit", function(e) {
        errorMsg.classList.add("d-none");
        errorMsg.textContent = "";

        const action = e.submitter.getAttribute("formaction");
        const selectCategoria = document.getElementById("id_categoria").value.trim();
        const nombre = document.getElementById("categoria").value.trim();
        const orden = document.getElementById("orden").value.trim();
        const activa = document.getElementById("activa").value.trim();

        if (action === "modificarCategoria") {
            if (!selectCategoria || !nombre || !orden || !activa) {
                e.preventDefault();
                errorMsg.textContent = "Completa todos los campos para modificar.";
                errorMsg.classList.remove("d-none");
            }
        } else if (action === "eliminarCategoria") {
            if (!selectCategoria) {
                e.preventDefault();
                errorMsg.textContent = "Selecciona una categoría para eliminar.";
                errorMsg.classList.remove("d-none");
            }
        } else if (action === "agregarCategoria") {
            if (!nombre || !orden || !activa) {
                e.preventDefault();
                errorMsg.textContent = "Completa todos los campos para agregar.";
                errorMsg.classList.remove("d-none");
            }
        }
    });
});
