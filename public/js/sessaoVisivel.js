// Seletor dos links do menu
const linksMenu = document.querySelectorAll(".menu-link");

// Função para ativar a classe "active" no link do menu
function activateMenuLink(elementId) {
    linksMenu.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href").substring(1) === elementId) {
            link.classList.add("active");
        }
    });
}

// Configuração do Waypoint para cada seção
document.querySelectorAll(".scroll-section").forEach(section => {
    new Waypoint({
        element: section,
        handler: function(direction) {
            if (direction === "down") {
                activateMenuLink(section.getAttribute("id"));
            }
        },
        offset: "50%", // Ajuste conforme necessário
    });

    new Waypoint({
        element: section,
        handler: function(direction) {
            if (direction === "up") {
                activateMenuLink(section.getAttribute("id"));
            }
        },
        offset: "50%", // Ajuste conforme necessário
    });
});

