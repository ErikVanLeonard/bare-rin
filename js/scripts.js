
$(document).ready(function() {
    $('#myTable').DataTable( {
        "language": {
            "lengthMenu": "Mostrando  _MENU_  registros por pagina",
            "zeroRecords": "Sin resultados",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "NO SE ENCUENTRA NINGÚN REGISTRO",
            "search": "Buscar: ",
            "paginate": {
                "first":      "Inicio",
                "last":       "Fin",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "infoFiltered": ""
        }
    } );
} );

