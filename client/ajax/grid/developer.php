<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<tr>
				<th>Sel.</th>
				<th>Id.</th>
				<th class="thNome">Nome</th>
				<th>Sexo</th>
				<th>Idade</th>
				<th>Hobby</th>
				<th>Nascimento</th>
				
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th><input id="inputNome" type="text" class="form-control"></th>
				<th>
				<select id="inputSexo" class="form-control">
				<option value=""></option>
				<option value="M">Masculino</option>
				<option value="F">Feminino</option>
				</select>
				</th>
				<th><input id="inputIdade" type="number" class="form-control"></th>
				<th><input id="inputHobby" type="text" class="form-control"></th>
				<th><input id="inputDataNascimento" type="date" class="form-control"></th>
				
			</tr>
		</thead>
		 <tbody id="rowsTableDeveloper">
		</tbody>
	   
	</table>
								

	<nav>
	  <ul class="pagination"></ul>
	</nav>
									
	<br/><br/><br/><br/>

</div>

<button class="btn btn-success buttonSearch" type="button" onclick="pesquisarDeveloper(0)">Pesquisar</button>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-primary">
   
   <a class="navbar-brand" href="javascript:;" id="AdicionarDeveloper"><i class="fas fa-plus iconsActions"></i> </a>
   <a class="navbar-brand" href="javascript:;" id="EditarDeveloper"><i class="fas fa-edit iconsActions"></i> </a>
   <a class="navbar-brand" href="javascript:;" id="ApagarDeveloper"><i class="fas fa-trash text-danger iconsActions"></i> </a>
   
</nav>
<script>


//Faz a requisição na API e retorna todos os desenvolvedores
$(document).ready(function () {
	
	$.ajax({
	type: "GET",
	url: "http://localhost:8080/pontential_crud/api/developers/",
	dataType: "json",
	statusCode: {
		200: function(response) {
			if (response != null) {
				
				var result = '';

				for(var i in response['dados']) {
				//fazendo a montagem das linhas da grid
					result += "<tr class='even gradeA'><td><input type='radio' name='developerId' value='"+([i, response['dados'][i]][1]['id'])+"' class='form-control'></td><td>"+([i, response['dados'][i]][1]['id'])+"</td><td>"+([i, response['dados'][i]][1]['nome'])+"</td><td>"+([i, response['dados'][i]][1]['sexo'])+"</td><td>"+([i, response['dados'][i]][1]['idade'])+"</td><td>"+([i, response['dados'][i]][1]['hobby'])+"</td><td>"+dataFormatada([i, response['dados'][i]][1]['datanascimento'])+"</td></tr>";
				}
				$("#rowsTableDeveloper").html(result);
				
			}
		}
	}
		
	});
	
	
  
	$('#AdicionarDeveloper').click(function() {
		//Chama o formulário de desenvolvedor

		load_pagina('form','developer.php','Cad. developer',false);
					
										
	});
					
	$('#EditarDeveloper').click(function() {
		var developerId = parseInt($("input[name='developerId']:checked").val());
		
		//Verifica se tem algum radio marcado na grid e se tiver, abre o formulário de desenvolvedor, enviando o respectivo id para requisição futura do desenvolvedor no formulário
		if(developerId>0) {
			
			load_pagina('form','developer.php?developerId='+developerId,'Editar developer',false);
		
		} else {
			
			toastr.warning('Nenhum dev. selecionado');
			
		}									
	});
	
	$('#ApagarDeveloper').click(function(){
		var developerId = parseInt($("input[name='developerId']:checked").val());
		
		//Verifica se tem algum radio marcado na grid e se tiver, faz uma requisição com o método DELETE na api para tentar remover o desenvolvedor
		if(developerId>0) {
			
		$.ajax({
			type: "DELETE",
			url: "http://localhost:8080/pontential_crud/api/developers/",
			dataType: "json",
			data: {
				id : developerId
			},
			statusCode: {
				204: function() {
				  toastr.success('Dev. removido');
				},
				400: function() {
				  toastr.warning('Nenhum dev. removido');
				}
			}
				
		});
		
		setTimeout(function(){
		load_pagina('grid','developer.php','Developers',false);
		}, 777);
		} else {
			
			toastr.warning('Nenhum dev. selecionado');
			
		}	
	});
	
	
	
	
	

}); 

</script>