function preguntarSino(){
    alertify.confirm('Eliminar Datos', '¿Estas seguro de eliminar este grupo?',
    function(){alertify.success('Ok') }
    , function(){alertify.error('Cancel')});
}