window.onload = () => {
    setTimeout(() => {
        new Audio("/lib/kiki/startup.ogg").play();
        $('#loading').fadeOut(200)
    }, 500)
}