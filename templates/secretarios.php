<?php
$pag = "secretarios";
require_once("../conexao.php");
?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Secretário</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>

</div>

<!-- tabelas -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                         <th>Telefone</th>
                         <th>Email</th>
                         <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                   <?php
                /* Aparecer o que foi colocado no banco */
                   $query = $pdo->query("SELECT * FROM secretarios order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) {
                      foreach ($res[$i] as $key => $value) {
                      }

                      $nome = $res[$i]['nome'];
                      $telefone = $res[$i]['telefone'];
                      $email = $res[$i]['email'];
                      $endereco = $res[$i]['endereco'];
                      $cpf = $res[$i]['cpf'];
                      $id = $res[$i]['id'];

                      ?>

                <!--Aparecer as tabelas e o que foi colocado no banco -->
                    <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $telefone ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $cpf ?></td>

                        <td>
                            <!-- função de icons edição de registro-->
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-info mr-1' title='Ver Endereço'><i class='fas fa-home'></i></a>
                        </td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                /* continuando aqui */
                /* função de editar e inserir registro */
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM secretarios where id = " . $id2 . " ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome2 = $res[0]['nome'];
                    $telefone2 = $res[0]['telefone'];
                    $email2 = $res[0]['email'];
                    $endereco2 = $res[0]['endereco'];
                    $cpf2 = $res[0]['cpf'];

                } else {
                    $titulo = "Inserir Registro";

                }

                ?>

                <h5 class="modal-title" id="ModalInserirRegistroLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-inserir" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    

                    <div class="form-group">
                        <label >Nome</label>
                        <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="CPF" placeholder="CPF" oninput="applyCpfMask(this)">
                    </div>
                    <div class="form-group">
                        <label >Telefone</label>
                        <input value="<?php echo @$telefone2 ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label >Endereco</label>
                        <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="endereco">
                    </div>
                    
                    <!-- Inside the modal-body -->
                    <div id="message-container"></div>
                    <!-- Inside the modal-body -->
                    <small>
                        <div id="mensagem">
                        </div>
                    </small>
                </div>

                <div class="modal-footer">
                
                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- excluir registro -->
<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ver endereço -->
<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Dados do Secretário</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<?php 
				if (@$_GET['funcao'] == 'endereco') {
					
					$id2 = $_GET['id'];

					$query = $pdo->query("SELECT * FROM secretarios where id = '$id2' ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					$nome3 = $res[0]['nome'];
					$cpf3 = $res[0]['cpf'];
					$telefone3 = $res[0]['telefone'];
					$email3 = $res[0]['email'];
					$endereco3 = $res[0]['endereco'];
					
				} 


				?>

				<span><b>Nome: </b> <i><?php echo $nome3 ?></i><br>
				<span><b>Telefone: </b> <i><?php echo $telefone3 ?></i> <span class="ml-4"><b>CPF: </b> <i><?php echo $cpf3 ?></i><br>
				<span><b>Email: </b> <i><?php echo $email3 ?><br>
				<span><b>Endereço: </b> <i><?php echo $endereco3 ?><br>

			</div>
			
		</div>
	</div>
</div>

<?php
/* função dos icons */
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {
    echo "<script>$('#modal-endereco').modal('show');</script>";
}

?>
<!--continuando -->
<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#message-container').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#message-container').addClass('text-danger')
                }

                $('#message-container').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>

<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function () {
		var pag = "<?=$pag?>";
		$('#btn-deletar').click(function (event) {
			event.preventDefault();

			$.ajax({
				url: pag + "/excluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function (mensagem) {

					if (mensagem.trim() === 'Excluído com Sucesso!') {


						$('#btn-cancelar-excluir').click();
						window.location = "index.php?pag=" + pag;
					}

					$('#mensagem_excluir').text(mensagem)



				},

			})
		})
	})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>
<script type="text/javascript">
    function applyCpfMask(input) {
        // Remove any non-numeric characters
        var cleaned = input.value.replace(/\D/g, '');

        // Apply the CPF mask
        if (cleaned.length <= 3) {
            input.value = cleaned;
        } else if (cleaned.length <= 6) {
            input.value = cleaned.slice(0, 3) + '.' + cleaned.slice(3);
        } else if (cleaned.length <= 9) {
            input.value = cleaned.slice(0, 3) + '.' + cleaned.slice(3, 6) + '.' + cleaned.slice(6);
        } else {
            input.value = cleaned.slice(0, 3) + '.' + cleaned.slice(3, 6) + '.' + cleaned.slice(6, 9) + '-' + cleaned.slice(9, 11);
        }
    }
</script>