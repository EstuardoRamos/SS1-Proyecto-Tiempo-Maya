function getBackgroundImage() {
    const hour = new Date().getHours();
    console.log('hola');
    console.log(hour);
    if (hour >= 5 && hour < 6) {
        return 'img/dinamicos/noche-dia.jpeg'; // noche
    } else if (hour >= 6 && hour < 8) {
        return 'img/dinamicos/amanecer.jpeg'; // amanecer
    } else if (hour >= 8 && hour < 12) {
        return 'img/dinamicos/mañana.jpeg'; // mañana
    } else if (hour >= 12 && hour < 14) {
        return 'img/dinamicos/medio-dia.jpeg'; // medio día
    } else if (hour >= 14 && hour < 16) {
        return 'img/dinamicos/tarde.jpeg'; // tarde
    } else if (hour >= 16 && hour < 18) {
        return 'img/dinamicos/atardecer.jpeg'; // atardecer
    } else if (hour >= 18 && hour < 20) {
        return 'img/dinamicos/anochecer.jpeg'; // anochecer
    } else if (hour >= 20 && hour < 24) {
        return 'img/dinamicos/noche.jpeg'; // noche
    } else {
        return 'img/dinamicos/noche.jpeg'; // noche para cualquier otro caso
    }
}


function updateBackgroundImage() {
    document.body.style.backgroundImage = `url(${getBackgroundImage()})`;
}

// Actualiza el fondo de pantalla al cargar la página
window.onload = updateBackgroundImage;

// Actualiza el fondo de pantalla cada hora para reflejar cambios
setInterval(updateBackgroundImage, 60 * 60 * 1000);
