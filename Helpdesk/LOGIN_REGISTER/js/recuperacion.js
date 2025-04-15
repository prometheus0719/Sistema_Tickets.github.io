document.addEventListener("DOMContentLoaded", function () {
    let tiempoRestante = 60; // Segundos
    let countdownElement = document.getElementById("countdown");

    function actualizarTiempo() {
        let minutos = Math.floor(tiempoRestante / 60);
        let segundos = tiempoRestante % 60;

        countdownElement.innerText = `${minutos}:${segundos < 10 ? "0" : ""}${segundos}`;

        if (tiempoRestante > 0) {
            tiempoRestante--;
            setTimeout(actualizarTiempo, 1000);
        } else {
            countdownElement.innerText = "Código expirado";
        }
    }

    actualizarTiempo();

    // Función para autoavanzar entre inputs
    const inputs = document.querySelectorAll(".code-input");
    
    inputs.forEach((input, index) => {
        input.addEventListener("input", (e) => {
            if (e.target.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && index > 0 && e.target.value.length === 0) {
                inputs[index - 1].focus();
            }
        });
    });
});