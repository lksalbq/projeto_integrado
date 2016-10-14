<div  class="container">

	<div class="row text-center" id="fh5co-features">
	
	<div class=" heading animate-box"><h2>Cadastro de Clientes</h2></div>
	
	<div id="load" class="form-group"></div>
	
	<div id="msgsucesso"  style="display: none;" class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Cliente cadastrado com sucesso!
	</div>
	
        <form  id="cadastroCliente" class="form-horizontal"  action="" method="POST" autocomplete="off" enctype="multipart/form-data">
	<fieldset>

		<!-- Form Name -->
		<legend></legend>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="">Nome</label>  
			<div class="col-md-6">
				<input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text">

			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="endereco">Endereço</label>  
			<div class="col-md-8">
				<input id="endereco" name="endereco" placeholder="Endereço" class="form-control input-md" required="" type="text">

			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="email">E-mail</label>  
			<div class="col-md-5">
				<input id="email" name="email" placeholder="E-mail" class="form-control input-md" required="" type="text">

			</div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="perfil">Perfil</label>
			<div class="col-md-4">
				<select id="perfil" name="perfil" class="form-control">
					<option value="1">Cliente</option>
					<option value="2">Vendedor</option>
					<option value="3">Administrador</option>
				</select>
			</div>
		</div>

		<!-- Button (Double) --> <div class="form-group"> <label class="col-md-4 control-label" for="salvar"></label> <div class="col-md-4"> <button id="salvar" name="salvar" class="btn btn-success">Salvar</button> <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button> </div> </div>
	</fieldset>
	</form>
</div>