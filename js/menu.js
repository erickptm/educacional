// Seleciona o elemento do menu hamburguer e o menu principal
const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('nav');

// Adiciona um evento de clique ao menu hamburguer
menuToggle.addEventListener('click', () => {
    // Alterna a classe .active no menu principal para exibi-lo ou ocultá-lo
    nav.classList.toggle('active');
});
