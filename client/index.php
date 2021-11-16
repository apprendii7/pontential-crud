<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Potential Crud</title>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="frameworks_plugins/bootstrap-4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="frameworks_plugins/toastr.min.css">
<link href="frameworks_plugins/fontawesome-free-5.12.1/css/all.css" rel="stylesheet">
<script defer src="frameworks_plugins/fontawesome-free-5.12.1/js/all.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>

</head>

<body>



<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">

	<img src="images/logo.png" width=52px>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
		
		<span class="navbar-toggler-icon"></span>
	
	</button>
	
	<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
		<ul class="navbar-nav mr-auto">

			<li class="nav-item">

				<a class="nav-link" href="javascript:load_pagina('grid','developer.php','Developers',true);"><i class="fas fa-code"></i> Developers</a>
			
			</li>

		</ul>
	</div>
	
</nav>

<div class="container-fluid">
	<div class="row">

		<div class="container-fluid">
			<div class="row" id="geral">
			</div>
		</div>

	</div>
</div>


<script src="frameworks_plugins/jquery-3.4.1.min.js"></script>
<script src="frameworks_plugins/popper.min.js"></script>
<script src="frameworks_plugins/bootstrap-4.4.1/js/bootstrap.min.js"></script>
<script src="frameworks_plugins/toastr.min.js"></script>
<script src="frameworks_plugins/jquery.form.js"></script>
<script>

$( document ).ready(function() {
	
	
	//carrega a página inicial
	load_pagina('grid','developer.php','Developers', false);
		
	//configurações do toastr
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
		
});
	
	
</script>
	
	
 </body>



</html>