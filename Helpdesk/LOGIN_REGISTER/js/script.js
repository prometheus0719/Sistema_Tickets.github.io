document.addEventListener('DOMContentLoaded', function() {
    // Elementos principales
    const container = document.querySelector('.container');
    const btnSignIn = document.getElementById('btn-sign-in');
    const btnSignUp = document.getElementById('btn-sign-up');

    // Event Listeners para cambiar entre Login y Registro
    btnSignIn.addEventListener('click', function() {
        container.classList.remove('toggle');
    });

    btnSignUp.addEventListener('click', function() {
        container.classList.add('toggle');
    });

    // Manejo del dropdown para la selección de rol
    const dropdownButton = document.querySelector('.dropdown-button');
    
    if (dropdownButton) {
        // Agregar evento de clic al botón dropdown
        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Evitar que el clic se propague
            event.preventDefault(); // Prevenir comportamiento por defecto

            const container = this.closest('.container-input');
            container.classList.toggle('dropdown-active');
        });

        // Cerrar el dropdown cuando se hace clic en cualquier otra parte
        document.addEventListener('click', function() {
            const activeDropdowns = document.querySelectorAll('.dropdown-active');
            activeDropdowns.forEach(dropdown => {
                dropdown.classList.remove('dropdown-active');
            });
        });

        // Permitir que se seleccione una opción del dropdown
        const dropdownOptions = document.querySelectorAll('.dropdown-content a');

        dropdownOptions.forEach(option => {
            option.addEventListener('click', function(event) {
                event.preventDefault(); // Prevenir la navegación
                event.stopPropagation(); // Evitar que se propague

                const buttonText = this.textContent;
                const dropdownContainer = this.closest('.container-input');
                const dropdownButton = dropdownContainer.querySelector('.dropdown-button');

                // Actualizar el texto del botón con la selección
                dropdownButton.textContent = buttonText;

                // Cerrar el dropdown después de seleccionar
                dropdownContainer.classList.remove('dropdown-active');

                // Asignar el valor seleccionado a un input hidden
                const hiddenInput = document.querySelector('input[name="rol"]') || document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'rol';
                hiddenInput.value = buttonText;

                // Remover y agregar el nuevo input al formulario de registro
                document.querySelector('.sign-up').appendChild(hiddenInput);
            });
        });
    }
});