			$(document).ready(function()
				{
					$("#btnSair").click(function()
						{
							$.ajax
							({
								type: 'POST',
								url:'Sair.php',
								async: true,
								dataType: 'json',
								success: function(response)
									{
										$("#msgUsuario").text("Deslogado com sucesso");
										window.setTimeout(function() {
											window.location = 'Index.php';
										  }, 1000);
									}
							});
						});
				});
	