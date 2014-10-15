


    function prueba_notificacion(nombre) {
        if (Notification) {
            if (Notification.permission !== "granted") {
                Notification.requestPermission()
            }
            
            var title = "Bienvenid@ de nuevo :)";
            var extra = {
                icon: "img/favicon.png",
                body: nombre
            }
            var noti = new Notification( title, extra)
            noti.onclick = {/* Al hacer click */ }
            noti.onclose = {/* Al cerrar */}
            setTimeout( function() { noti.close() }, 50000)
        }
    }




