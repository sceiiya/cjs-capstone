const logtoggle = $('#navbarDropdown');
const mdtoggle = $('#burgerDown');
const profDropdown = $('#profDropdown');

logtoggle.on('click', () => {
    profDropdown.toggleClass('hidden');
});

mdtoggle.on('click', () => {
    profDropdown.toggleClass('hidden');
});
