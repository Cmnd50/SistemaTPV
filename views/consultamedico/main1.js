function buscar(){

    var descripcion = document.getElementById('buscardescripcion').value;
    var grupos = document.getElementById('buscargrupos').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = '../../views/consultamedico/buscar.php';

    data.append("descripcion", descripcion);
    data.append("grupos", grupos);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){
        var cajadatos = document.getElementById('datos');
        cajadatos.innerHTML = e.target.responseText;

    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('buscardescripcion').addEventListener('input', buscar, false);
    document.getElementById('buscargrupos').addEventListener('input', buscar, false);
}, false);
