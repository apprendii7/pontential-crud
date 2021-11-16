<script>
$(document).ready(function () {
//se vier o id no get ele busca o desenvolvedor na requisição abaixo no método GET e preenche o formulário para edição
<?php if(!empty($_GET['developerId'])) { ?>


	$.ajax({
	type: "GET",
	url: "http://localhost:8080/pontential_crud/api/developers/<?=$_GET['developerId']?>",
	dataType: "json",
		statusCode: {
			200: function(response) {
				if (response != null) {

					$("#ID").val(response['id']);
					$("#NOME").val(response['nome']);
					$("select[id='SEXO'] option[value='" + response['sexo'] + "']").attr({"selected": "selected"});
					$("#IDADE").val(response['idade']);
					$("#HOBBY").val(response['hobby']);
					$("#NASCIMENTO").val(response['datanascimento']);
				}
			},
			404: function(response) {
				
				toastr.warning('Desenvolvedor não encontrado');
				
			}
		}
		
	});
<?php } ?>


$('#formdeveloper').click(function() {
	var developerId = parseInt($("input[name='ID']").val());
	
	//se vier preenchido o id do campo ID do formulário, ele faz a requisição na API com o método PUT para tentar editar o desenvolvedor
	if(developerId>0) {
		
		$.ajax({
		type: "PUT",
		url: "http://localhost:8080/pontential_crud/api/developers/"+developerId,
		dataType: "json",
			data: {
				id : $("#ID").val(),
				nome : $("#NOME").val(),
				sexo : $("#SEXO").val(),
				idade : $("#IDADE").val(),
				hobby : $("#HOBBY").val(),
				datanascimento : $("#NASCIMENTO").val()
			},
			statusCode: {
				200: function() {
				  toastr.success('Dev. atualizado');
				  load_pagina('grid','developer.php','Developers',false);
				},
				400: function() {
				  toastr.warning('Nenhum dev. atualizado');
				}
			}	
		});
	
	} else { //caso não venha id, ele faz a requisição na API com o método POST para tentar inserir um novo desenvolvedor
		
		$.ajax({
		type: "POST",
		url: "http://localhost:8080/pontential_crud/api/developers/",
		dataType: "json",
			data: {
				nome : $("#NOME").val(),
				sexo : $("#SEXO").val(),
				idade : $("#IDADE").val(),
				hobby : $("#HOBBY").val(),
				datanascimento : $("#NASCIMENTO").val()
			},
			statusCode: {
				201: function() {
				  load_pagina('grid','developer.php','Developers',false);
				  toastr.success('Dev. adicionado');
				},
				400: function() {
				  toastr.warning('Nenhum dev. adicionado');
				}
			}
			
		});
		
	}
										
});

});
</script>
<form action="javascript:;" method=POST>


<div class="container-fluid containerForm">
	<div class="row">
	  
		<div class="col-sm-12 col-md-2">
			<label for="ID" class="form-label">ID</label>
			<input type="text" class="form-control" id="ID" aria-describedby="ID" name="ID" readonly>
			<div id="" class="form-text"></div>
		</div>

		<div class="col-sm-12 col-md-10">
			<label for="NOME" class="form-label">NOME</label>
			<input type="text" class="form-control" id="NOME" aria-describedby="NOME" name="NOME" required>
			<div id="" class="form-text"></div>
		</div>

		<div class="col-sm-12 col-md-2">
			<label for="SEXO" class="form-label">SEXO</label>
			<select class="form-control" id="SEXO" aria-describedby="SEXO" name="SEXO" required>
			<option value=""></option>
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
			</select>
			<div id="" class="form-text"></div>
		</div>
		  

		<div class="col-sm-12 col-md-2">
			<label for="IDADE" class="form-label">IDADE</label>
			<input type="number" class="form-control" id="IDADE" aria-describedby="IDADE" name="IDADE" required>
			<div id="" class="form-text"></div>
		</div>
		  
		<div class="col-sm-12 col-md-5">
			<label for="HOBBY" class="form-label">HOBBY</label>
			<input type="text" class="form-control" id="HOBBY" aria-describedby="HOBBY" name="HOBBY" required>
			<div id="" class="form-text"></div>
		</div>
		  
		  
		<div class="col-sm-12 col-md-3">
			<label for="NASCIMENTO" class="form-label">NASCIMENTO</label>
			<input type="date" class="form-control" id="NASCIMENTO" aria-describedby="NASCIMENTO" name="NASCIMENTO" required>
			<div id="" class="form-text"></div>
		</div>

	</div>
</div>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-primary">
   
   <a class="navbar-brand" href="javascript:load_pagina('grid','developer.php','Developers',false);"><i class="fas fa-arrow-left iconsActions"></i> </a>
      
   <a class="navbar-brand" href="javascript:;" id="formdeveloper"><button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button> </a>
   
</nav></form>