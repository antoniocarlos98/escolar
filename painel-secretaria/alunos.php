<?php 
$pag = "alunos";
require_once("../conexao.php"); 
require_once("verificar.php"); 

?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Aluno</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
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
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM alunos order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $nome = $res[$i]['nome'];
                      $telefone = $res[$i]['telefone'];
                      $email = $res[$i]['email'];
                      $endereco = $res[$i]['endereco'];
                      $cpf = $res[$i]['cpf'];
                      $foto = $res[$i]['foto'];
                      $id = $res[$i]['id'];


                      ?>


                      <tr>
                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=matriculas&id=<?php echo $id ?>" title="Ver Matrículas" class="text-dark"><?php echo $nome ?></a>
                            
                        </td>
                        <td><?php echo $telefone ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $cpf ?></td>
                        <td><img src="../img/alunos/<?php echo $foto ?>" width="50"></td>


                        <td>
                         <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                         <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>

                         <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-primary mr-1' title='Ver Endereço'><i class='fas fa-home'></i></a>

                         <a href="index.php?pag=<?php echo $pag ?>&funcao=arquivo&id=<?php echo $id ?>" class='text-info mr-1' title='Adicionar Arquivo'><i class='fas fa-file'></i></a>

                          <a href="../rel/carteirinha_html.php?id=<?php echo $id ?>" target="_blank" class='text-primary ml-2' title='Imprimir Carteirinha'><i class='fa fa-file-image'></i></a>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM alunos where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome2 = $res[0]['nome'];
                    $telefone2 = $res[0]['telefone'];
                    $email2 = $res[0]['email'];
                    $endereco2 = $res[0]['endereco'];
                    $cpf2 = $res[0]['cpf'];
                    $foto2 = $res[0]['foto'];
                    $data_nasc2 = $res[0]['data_nascimento'];
                    $sexo2 = $res[0]['sexo'];

                } else {
                    $titulo = "Inserir Registro";
                    $data_nasc2 = date('Y-m-d');
                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">

                         <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label >Nome</label>
                                    <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Email</label>
                                    <input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                             <div class="form-group">
                                <label >CPF</label>
                                <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                            </div>
                        </div>

                        <div class="col-md-6">
                         <div class="form-group">
                            <label >Telefone</label>
                            <input value="<?php echo @$telefone2 ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">

                        <div class="form-group">
                            <label >Endereço</label>
                            <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                        </div>  
                    </div>

                    <div class="col-md-3">
                     <div class="form-group">
                        <label >Sexo</label>
                        <select name="sexo" class="form-control" id="sexo">
                            <option <?php if(@$sexo2 == 'M'){ ?> selected <?php } ?> value="M">M</option>
                            <option <?php if(@$sexo2 == 'F'){ ?> selected <?php } ?> value="F">F</option>

                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                    <label >Data Nascimento</label>
                    <input value="<?php echo @$data_nasc2 ?>" type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="CPF">
                </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                <label >CPF Responsável</label>
                <input value="<?php echo @$responsavel2 ?>" type="text" class="form-control" id="cpf2" name="responsavel" placeholder="CPF do Responsável">
            </div>
        </div>
    </div>

</div>

<div class="col-md-4">
    <div class="form-group">
        <label >Imagem</label>
        <input type="file" value="<?php echo @$foto2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
    </div>

    <div id="divImgConta">
        <?php if(@$foto2 != ""){ ?>
            <img src="../img/alunos/<?php echo $foto2 ?>"  width="100%" id="target">
        <?php  }else{ ?>
            <img src="../img/alunos/sem-foto.jpg" width="100%" id="target">
        <?php } ?>
    </div>
</div>
</div>






<small>
    <div id="mensagem">

    </div>
</small> 

</div>



<div class="modal-footer">



    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
    <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
    <input value="<?php echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">

    <button type="button" id="btn-fechar" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
</div>
</form>
</div>
</div>
</div>






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






<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados do Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
                if (@$_GET['funcao'] == 'endereco') {

                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM alunos where id = '$id2' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $nome3 = $res[0]['nome'];
                    $cpf3 = $res[0]['cpf'];
                    $telefone3 = $res[0]['telefone'];
                    $email3 = $res[0]['email'];
                    $endereco3 = $res[0]['endereco'];
                    $foto3 = $res[0]['foto'];
                    $data_nasc3 = $res[0]['data_nascimento'];
                    $sexo3 = $res[0]['sexo'];
                    $responsavel3 = $res[0]['responsavel'];

                    $query_resp = $pdo->query("SELECT * FROM responsaveis where cpf = '$responsavel3' ");
                    $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
                    $nome_resp = $res_resp[0]['nome'];
                    $telefone_resp = $res_resp[0]['telefone'];
                    $email_resp = $res_resp[0]['email'];

                    $data_F = implode('/', array_reverse(explode('-', $data_nasc3)));
                    
                    //CALCULAR IDADE
                    $date1 = $data_nasc3;
                    $date2 = date('Y-m-d');
                    $diff = abs(strtotime($date2) - strtotime($date1));
                    $idade = floor($diff / (365*60*60*24));

                    
                } 


                ?>

                <div class="row">
                    <div class="col-md-7">
                        <span><b>Nome: </b> <i><?php echo $nome3 ?></i><br></span>
                        <span><b>Telefone: </b> <i><?php echo $telefone3 ?></i></span> <span class="ml-4"><b>CPF: </b> <i><?php echo $cpf3 ?></i><br>
                        </span><span><b>Email: </b> <i><?php echo $email3 ?><br></i></span>
                    </span><span><b>Data de Nascimento: </b> <i><?php echo $data_F ?><br></i></span>

                    <span><b>Sexo: </b> <i><?php echo $sexo3 ?></i> </span> <span class="ml-4"><b>Idade: </b> <i><?php echo $idade ?> Anos</i><br></span>

                    <span><b>Endereço: </b> <i><?php echo $endereco3 ?><br></i></span>

                    <?php if($responsavel3 != ""){ ?>
                        <p class="mt-2"><i><u>Dados do Responsável</i></u></p>

                        <span><b>Nome: </b> <i><?php echo $nome_resp ?></i><br></span>
                        <span><b>Telefone: </b> <i><?php echo $telefone_resp ?></i></span> <span class="ml-4"><b>CPF: </b> <i><?php echo $responsavel3 ?></i><br>
                        </span><span><b>Email: </b> <i><?php echo $email_resp ?><br></i></span>




                    <?php } ?>
                </div>

                <div class="col-md-5">

                    <img src="../img/alunos/<?php echo $foto3 ?>" width="100%">

                </div>


            </div>


        </div>

    </div>
</div>
</div>







<div class="modal" id="modal-matriculas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Matrículas do Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
                $query = $pdo->query("SELECT * FROM matriculas where aluno = '$_GET[id]' order by id desc ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $aluno = $res[$i]['aluno'];
                  $turma = $res[$i]['turma'];
                  $data = $res[$i]['data'];

                  $dataF = implode('/', array_reverse(explode('-', $data)));

                  $id_m = $res[$i]['id'];




                  $query_r = $pdo->query("SELECT * FROM turmas where id = '" . $turma . "' ");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

                  $id_disciplina = $res_r[0]['disciplina'];


                  $query_r = $pdo->query("SELECT * FROM disciplinas where id = '" . $id_disciplina . "' ");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

                  $nome_disc = $res_r[0]['nome'];

                  ?>
                  <span><?php echo $nome_disc ?>
                    <!-- EXCLUIR -->
                 <!-- <a target="_blank" title="Gerar Contrato" href="../rel/contrato.php?id=<?php echo $id_m ?>"><span class="ml-2"><i class='fas fa-book-open text-primary'></i></span></a>-->

                  <a target="_blank" title="Gerar Declaração Matrícula" href="../rel/declaracao.php?id=<?php echo $id_m ?>"><span class="ml-2"><i class='far fa-sticky-note text-danger'></i></span></a>

              </span>

              <hr style="margin:4px">

          <?php } ?>


      </div>

  </div>
</div>
</div>






<div class="modal" id="modal-arquivo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir Arquivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-arq">
                <div class="modal-body">

                   

                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group">
                                    <label >Descrição</label>
                                    <input value="" type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                                </div>

                              <div class="form-group">
                        <label >Foto</label>
                        <input type="file" value="" class="form-control-file" id="imagem2" name="imagem" onChange="carregarImg2();">




                    </div>


                    <div id="divImgConta" class="mt-4">
                     <img src="../img/arquivos/sem-foto.jpg"  width="150px" id="target2">                              
                 </div>

                        </div>

                         <div class="col-md-6">
                            <?php 
                            $id_al = @$_GET['id'];
                             $query = $pdo->query("SELECT * FROM arquivos_alunos where aluno = '$_GET[id]' order by id desc ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $arquivo = $res[$i]['arquivo'];
                  $id_arq = $res[$i]['id'];
                  $descricao = $res[$i]['descricao'];
                  $data = $res[$i]['data'];
                  $data = implode('/', array_reverse(explode('-', $data)));

                  $ext = pathinfo($arquivo, PATHINFO_EXTENSION);   
        if($ext == 'pdf'){ 
            $tumb_arquivo = 'pdf.png';
        }else if($ext == 'rar' || $ext == 'zip'){
            $tumb_arquivo = 'rar.png';
        }else{
            $tumb_arquivo = $arquivo;
        }


                             ?>
                             <img src="../img/arquivos/<?php echo $tumb_arquivo ?>" width="15px">
                             <a href="../img/arquivos/<?php echo $arquivo ?>" target="_blank" title="Abrir Arquivo">
                             <span class="mr-2"> <?php echo $descricao ?>  </span>
                             <span class="mr-2"> Data: <?php echo $data ?>  </span></a>

                             <span class="mr-2">  <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir_arquivo&id_arq=<?php echo $id_arq ?>&id=<?php echo $id_al ?>" class='text-danger mr-1' title='Excluir Arquivo'><i class='far fa-trash-alt'></i></a> </span>
                             <hr>

                         <?php } ?>
                        </div>

                    </div>
                  



                 <div align="center" id="mensagem_arquivo" class="">

                 </div>

             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                

                <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                <button type="submit" id="btn-arquivo" name="btn-arquivo" class="btn btn-primary">Inserir</button>

            </div>
        </form>
    </div>
</div>
</div>



<?php 

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

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "matriculas") {
    echo "<script>$('#modal-matriculas').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "arquivo") {
    echo "<script>$('#modal-arquivo').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_arquivo") {

    $id = @$_GET['id_arq'];
    $id_al = @$_GET['id'];

    //BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
$query_con = $pdo->query("SELECT * FROM arquivos_alunos WHERE id = '$id'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
$imagem = $res_con[0]['arquivo'];
if($imagem != 'sem-foto.jpg'){
    @unlink('../img/arquivos/'.$imagem);
}
$pdo->query("DELETE from arquivos_alunos where id = '$id'");

  echo "<script language='javascript'> window.location='index.php?pag=$pag&funcao=arquivo&id=$id_al'</script>";
}

?>




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

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

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



<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>





<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg2() {
        
        var target = document.getElementById('target2');
        var file = document.querySelector("#imagem2").files[0];


        var arquivo = file['name'];
        resultado = arquivo.split(".", 2);
        //console.log(resultado[1]);

        if(resultado[1] === 'pdf'){
            $('#target2').attr('src', "../img/arquivos/pdf.png");
            return;
        }

         if(resultado[1] === 'rar'){
            $('#target2').attr('src', "../img/arquivos/rar.png");
            return;
        }


         if(resultado[1] === 'zip'){
            $('#target2').attr('src', "../img/arquivos/rar.png");
            return;
        }


        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>






<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form-arq").submit(function () {
        console.log('fsdfsdfsd')
        var pag = "<?=$pag?>";
        var id = "<?=$id_al?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir-arquivo.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_arquivo').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    //$('#btn-fechar-arquivo').click();
                    window.location = "index.php?pag="+pag+"&funcao=arquivo&id="+id;

                } else {

                    $('#mensagem_arquivo').addClass('text-danger')
                }

                $('#mensagem_arquivo').text(mensagem)

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


