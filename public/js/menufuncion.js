// Seletor dos links do menu
const linksMenu = document.querySelectorAll(".menu-link");

// Manipulador de evento para cada link do menu
linksMenu.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault(); // Evita que o link direcione para uma página diferente

        // Remove a classe "active" de todos os links do menu
        linksMenu.forEach(menuLink => {
            menuLink.classList.remove("active");
        });

        // Adiciona a classe "active" apenas ao link clicado
        link.classList.add("active");

        // Resto do código para rolagem suave
        const targetId = link.getAttribute("href").substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
            const sectionTop = targetSection.offsetTop;
            const menuHeight = document.querySelector(".sticky-menu").offsetHeight;
            const scrollToPosition = sectionTop - menuHeight;
            window.scrollTo({ top: scrollToPosition, behavior: "smooth" });
        }
    });
});

// Adicione aqui o código para rolagem suave quando a página é carregada
// ...


