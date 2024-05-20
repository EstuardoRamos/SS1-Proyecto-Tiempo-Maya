function getBackgroundImage() {
    const hour = new Date().getHours();
    if (hour >= 3 && hour < 7) {
        return 'img/dinamicos/amanecer.jpeg'; // amanecer
    } else if (hour >= 7 && hour < 12) {
        return 'img/dinamicos/mañana.jpeg'; // mañana
    }else if (hour >= 12 && hour < 14) {
        return 'img/dinamicos/medio-dia.jpeg'; // medio dio
    }else if (hour >= 14 && hour < 16) {
        return 'img/dinamicos/tarde.jpeg'; // Tarde
    }else if (hour >= 16 && hour < 18) {
        return 'img/dinamicos/atardecer.jpeg'; // atrdecer
    }else if (hour >= 18 && hour < 20) {
        return 'img/dinamicos/anochecer.jpeg'; // anochecer
    } else if (hour >= 20 && hour <= 24) {
        return 'img/dinamicos/noche.jpeg'; // noche
    }else if (hour >= 0 && hour <= 2){
        return 'img/dinamicos/noche.jpeg'; // noche 
    }
}

function updateBackgroundImage() {
    document.body.style.backgroundImage = `url(${getBackgroundImage()})`;
}

// Actualiza el fondo de pantalla al cargar la página
window.onload = updateBackgroundImage;

// Actualiza el fondo de pantalla cada hora para reflejar cambios
setInterval(updateBackgroundImage, 60 * 60 * 1000);
