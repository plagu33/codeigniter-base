var editor;

jQuery(document).ready(function($)
{

	$("#fakeLoader").fakeLoader({
		//timeToHide:2000, //Time in milliseconds for fakeLoader disappear
		zIndex:"9999",//Default zIndex
		spinner:"spinner6",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
		bgColor:"#337AB7", //Hex, RGB or RGBA colors
	});

	if( $('#dataTables-example').length>0 )
	{
	    $('#dataTables-example').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ]],
			dom: 'Bfrtip',
				buttons: [
					{
					    extend: 'excel',
					    text: 'Exportar',
					    title : 'Registros Mallplaza Enamorados 2016'
					},
					{
					    extend: 'print',
					    text: 'Imprimir',
					    title : 'Registros Mallplaza Enamorados 2016'
					}						
			]            
	    });
	}

	if( $('#dataTables-videos').length>0 )
	{
	    $('#dataTables-videos').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ]],
			dom: 'Bfrtip',
				buttons: [
					{
					    extend: 'excel',
					    text: 'Exportar',
					    title : 'Mensajes Mallplaza Enamorados 2016'
					},
					{
					    extend: 'print',
					    text: 'Imprimir',
					    title : 'Mensajes Mallplaza Enamorados 2016'
					}						
			]            
	    });

	}

});

function cambiar_estado(param,estado)
{	
	$.post('app/cambiarEstado', { id_video:param , estado:estado }, function(data, textStatus, xhr)
	{
			
	});
}











