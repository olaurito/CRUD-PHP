<?php
	function __autoload($class_name){
		require_once $class_name.'.php';
	}
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html, charset=utf-8">
<title>Exemplos para estudos</title> 
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>

<?php    
		
		$usuarios = new Usuarios();
	
	if(isset($_POST['cadastrar'])):
	
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		
		
		$usuarios->setLogin($login);
		$usuarios->setSenha($senha);
		$usuarios->setNome($nome);
		$usuarios->setTelefone($telefone);
		$usuarios->setEndereco($endereco);
		
			if($usuarios->insert()){
				echo "Inserido com sucesso!";
			}
		
			/*	validações
				if($nome == ''){
					echo ""Digite o nome;
					
				} */
	
	endif; 
 ?>
 
 <?php 
	if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
		
		$id = (int)$_GET['id'];
		
		if($usuarios->delete($id)){
			echo "Deletado com sucesso!";
		}
	endif;
 ?>
 
 
 
 <?php 
	if(isset($_POST['atualizar'])):
	
		$id = $_POST['id'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		
		$usuarios->setLogin($login);
		$usuarios->setSenha($senha);
		$usuarios->setNome($nome);
		$usuarios->setTelefone($telefone);
		$usuarios->setEndereco($endereco);
		
		if($usuarios->update($id)){
			echo "Atualizado com sucesso!";
		}
	endif;
 ?>
 
 
 <?php 
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
		
		$id = (int)$_GET['id'];
		$resultado = $usuarios->find($id);
		
 ?>
 
 
<form action="" method="post" >
<div>Login</div>
<div><input type="text" id="login" name="login" placeholder="Login" value="<?php echo $resultado->login ?>"></div>
<div>Senha:</div>
<div><input type="password" id="senha" name="senha" placeholder="senha" value="<?php echo $resultado->senha ?>"></div>
<div>Nome:</div>
<div><input type="text" id="nome" name="nome" placeholder="nome" value="<?php echo $resultado->nome ?>"></div>
<div>Telefone:</div>
<div><input type="text" id="telefone" name="telefone" placeholder="telefone" value="<?php echo $resultado->telefone ?>"></div>
<div>Endereço:</div>
<div><input type="text" id="endereco" name="endereco" placeholder="endereco" value="<?php echo $resultado->endereco ?>"></div>
<input type="hidden" name="id" value"<?php echo $resultado->id ?>">
<input type="submit" id="atualizar" name="atualizar" value="Atualizar">


</form>
<?php }else{ ?>
<form action="" method="post" >
<div>Login</div>
<div><input type="text" id="login" name="login" placeholder="Login"></div>
<div>Senha:</div>
<div><input type="password" id="senha" name="senha" placeholder="senha"></div>
<div>Nome:</div>
<div><input type="text" id="nome" name="nome" placeholder="nome"></div>
<div>Telefone:</div>
<div><input type="text" id="telefone" name="telefone" placeholder="telefone"></div>
<div>Endereço:</div>
<div><input type="text" id="endereco" name="endereco" placeholder="endereco"></div>

<input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar">


</form>
<?php } ?>
<table class="table" >
<thead>
<tr id="table-dados">
	<td>#</td>
	<td>Login</td>
	<td>Nome</td>
	<td>Telefone</td>
	<td>Endereço</td>
	<td>AÇÕES:</td>
</tr>
</thead>

<?php  foreach($usuarios->findAll() as $key => $value ): ?>

<tbody id="info-dados">
<tr>
	<td><?php echo $value->id; ?></td>
	<td><?php echo $value->login; ?></td>
	<td><?php echo $value->nome; ?></td>
	<td><?php echo $value->telefone; ?></td>
	<td><?php echo $value->endereco; ?></td>
	<td><?php echo "<a href='cadastrar.php?acao=editar&id=".  $value->id . "'>Editar</a> "; ?>
		<?php echo "<a href='cadastrar.php?acao=deletar&id=". $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\"')>Deletar</a> ";?>
	</td>
</tr>
</tbody>


<?php endforeach; ?>
</table>
</body>
</html>