function load_pagina(item,pagina,titulo,menuClick) {
	$("#geral").load('ajax/'+item+'/'+pagina);
	$(".navbar-brand").html(titulo);
	
	if(menuClick==true) {
		
		$(".navbar-toggler").click();
	
	}
	document.title = 'PotentialCrud	- '+titulo;
}

function dataFormatada(data){
   if(data) {
	data = data.split('-');
	return data[2]+"/"+data[1]+"/"+data[0];
} else { return 0; }

}

//Retorna os desenvolvedores de acordo com o termo passado via querystring e paginação
function pesquisarDeveloper(inicio=0) {
					

	$.ajax({
	type: "GET",
	url: "http://localhost:8080/pontential_crud/api/developers/",
	dataType: "json",
	data :{
		inicio : inicio,
		fim  : 5,
		nome : $("#inputNome").val(),
		sexo : $("#inputSexo").val(),
		idade : $("#inputIdade").val(),
		hobby : $("#inputHobby").val(),
		datanascimento : $("#inputDataNascimento").val()
		
	},
	statusCode: {
		200: function(response) {
		 if (response != null) {
			var total = 0;
			var result = '';
			var itens = '';
			for(var i in response['dados']) {
			result += "<tr class='even gradeA'><td><input type='radio' name='developerId' value='"+([i, response['dados'][i]][1]['id'])+"' class='form-control'></td><td>"+([i, response['dados'][i]][1]['id'])+"</td><td>"+([i, response['dados'][i]][1]['nome'])+"</td><td>"+([i, response['dados'][i]][1]['sexo'])+"</td><td>"+([i, response['dados'][i]][1]['idade'])+"</td><td>"+([i, response['dados'][i]][1]['hobby'])+"</td><td>"+dataFormatada([i, response['dados'][i]][1]['datanascimento'])+"</td></tr>";
			
			//total += 1;
			}
		
			total = response['total'];
			var npaginas = Math.ceil(total / 5)	;
			
			
			
			for(var i = 0; i<npaginas; i++) {
				
				itens += '<li class="page-item"><a class="page-link" href="javascript:pesquisarDeveloper('+(i*5)+');">'+(i+1)+'</a></li>';
				
			}
			var pagAnterior = inicio-5;
			if(inicio == 0) { pagAnterior = 0; }
			
			var pagSeguinte = inicio+5;
			if(inicio >= total-5) { pagSeguinte = inicio; }
			
			$("#rowsTableDeveloper").html(result);
			$(".pagination").html('<li class="page-item"><a class="page-link" href="javascript:pesquisarDeveloper('+(pagAnterior)+');"><<</a></li>'+itens+'<li class="page-item"><a class="page-link" href="javascript:pesquisarDeveloper('+(pagSeguinte)+');">>></a></li>');
			
		}
		},
		404: function(response) {
		$("#rowsTableDeveloper").html('');
		$(".pagination").html('');
		  toastr.warning('Nenhum dev. encontrado');
		}
	}
		
	});	
									

}