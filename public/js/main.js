function buscar_pedido() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/pedidos/getall',
        datatype: "html"
    })
    .done(function(data) {
        if (data != null) {
            //console.log(data);
            $('#pedidos').html(data);
        } else {
            alert("No se encontró pedido");
        }
    })
    .fail(function(e, f, j) {
        alert("Hubo un error al recuperar la información. Favor comuníquese con el Soporte Técnico de la empresa.");
    });
}

$(document).ready(function (){
    buscar_pedido();
    window.setInterval(function() {
        buscar_pedido();
    }, 10000);
});
