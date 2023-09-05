// Seletor do ícone do menu
const menuIcon = document.querySelector(".menu-icon");

// Seletor do ícone de toggle (X)
const menuToggleIcon = document.querySelector(".menu-toggle i");

// Seletor do menu
const menu = document.querySelector(".menu");

// Manipulador de evento de clique para o ícone de toggle
menuIcon.addEventListener("click", () => {
    // Adiciona ou remove a classe "open" no menu
    menu.classList.toggle("open");
    
    // Alterna entre os ícones de barras e "X"
    if (menu.classList.contains("open")) {
        menuIcon.innerHTML = '<i class="fas fa-times"></i>';
    } else {
        menuIcon.innerHTML = '<i class="fas fa-bars"></i>';
    }
});

//menu funcional


