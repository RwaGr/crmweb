$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
	emaila = $("#emaila").val();
	clavea = $("#clavea").val();

	$.post("../ajax/usuario.php?op=verificar",
		{"emaila": emaila, "clavea": clavea},
		function(data)	
	{
		if (data!="null") 
		{
			$(location).attr("href","contacto.php");
		}
		else
		{
			bootbox.alert("Usuario y/o Password incorrectos")
		}
	});
})