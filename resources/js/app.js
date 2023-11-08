import './bootstrap';

const open = document.getElementById("open");
const navbar = document.getElementById('navbar');
const close = document.getElementById("close");

open?.addEventListener('click', () => {
    navbar?.classList.remove('hidden')
    navbar?.classList.add('flex')
})

close?.addEventListener('click', () => {
    navbar?.classList.remove('flex')
    navbar?.classList.add('hidden')
})

