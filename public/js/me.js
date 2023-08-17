document.addEventListener("DOMContentLoaded", function () {
    const btnEliminar = document.getElementById("btnEliminar");
    const crear = document.getElementById("crear");
    const eliminar = document.getElementById("eliminar");
    const editar = document.getElementById("editar");

    // Oculta las alertas después de 2 segundos
    setTimeout(() => {
        if (crear) {
            crear.style.display = "none";
        }
        if (eliminar) {
            eliminar.style.display = "none";
        }
        if (editar) {
            editar.style.display = "none";
        }
    }, 2000);

    btnEliminar.addEventListener("click", (event) => {
        if (!confirm("¿Quiere eliminar la tarea enserio?")) {
            event.preventDefault(); // Evita que el formulario se envíe si el usuario hace clic en "Cancelar"
        }
    });
});
