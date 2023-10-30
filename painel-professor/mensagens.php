<?php 
$pag = "mensagens";
require_once("../conexao.php"); 

?>


<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Aluno</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Arquivo</th>                        
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                 <?php 

                 $query = $pdo->query("SELECT * FROM mensagens where professor = '$id_prof' order by id desc ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $aluno = $res[$i]['aluno'];
                  $titulo = $res[$i]['titulo'];
                  $mensagem = $res[$i]['mensagem'];

                  $arquivo = $res[$i]['arquivo'];
                  $id = $res[$i]['id'];
                  $data = $res[$i]['data'];
                  $hora = $res[$i]['hora'];                  
                  $dataF = implode('/', array_reverse(explode('-', $data)));

                    $query2 = $pdo->query("SELECT * FROM alunos where id = '$aluno' order by id desc ");
                     $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                     $nome_professor = $res2[0]['nome'];
                  ?>


                  <tr>
                    <td><a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Responder Mensagem'><?php echo $titulo ?></a></td>
                    <td><?php echo $nome_professor ?></td>
                    <td><?php echo $dataF ?></td>
                    <td><?php echo $hora ?></td>

                    <td><?php if($arquivo != "sem-foto.jpg"){
                        echo '<a href="../img/arquivos-aula/'.$arquivo.'"  target="_blank" title="Ver Arquivo"> Ver Arquivo </a>';
                    }  ?></td>


                    <td>
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Responder Mensagem'><i class='far fa-edit'></i></a>
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>

                       <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-warning mr-1' title='Ver Mensagem'><i class='far fa-comment'></i></a>


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
                    $titulo_modal = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM mensagens where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                     $professor2 = $res[0]['professor'];
                     $aluno2 = $res[0]['aluno'];
                  $titulo2 = $res[0]['titulo'];
                  $mensagem2 = $res[0]['mensagem'];
                  $arquivo2 = $res[0]['arquivo'];                 
                  $data2 = $res[0]['data'];
                  $hora2 = $res[0]['hora'];  



                } else {
                    $titulo_modal = "Inserir Registro";
                    $vencimento2 = date('Y-m-d');
                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel">Resposta do Professor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">

                   <div class="row">
                    <div class="col-md-12">
                     <div class="form-group">
                        <label >Título</label>
                        <input maxlength="100" value="<?php echo @$titulo2 ?>" type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da Mensagem">
                    </div>
                </div>
            </div>


            <div class="row">
                    <div class="col-md-12">
                     <div class="form-group">
                        <label >Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem"></textarea>
                    </div>
                </div>
            </div>


             <div class="row">
                   
                <div class="col-md-8">
                     <div class="form-group">
                                <label >Arquivo</label>
                                <input type="file" value="<?php echo @$arquivo2 ?>"  class="form-control" id="arquivo" name="arquivo" onChange="carregarImg();">
                            </div>

                          
                </div>

                 <div class="col-md-4">
                      <div id="divImgConta">                       
                                <img src="../img/arquivos-aula/sem-foto.jpg" width="150" height="150" id="target">
                          
                            </div>

                 </div>

            </div>



            <small>
                <div id="mensagem-msg">

                </div>
            </small> 

        </div>



        <div class="modal-footer">



            <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
            <input value="<?php echo @$aluno2 ?>" type="hidden" name="id_aluno" id="id_aluno">
            <input value="<?php echo @$id_prof ?>" type="hidden" name="id_professor" id="id_professor">
                        

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
                if (@$_GET['funcao'] == 'endereco') {

                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM mensagens where id = '$id2' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $professor3 = $res[0]['professor'];
                  $titulo3 = $res[0]['titulo'];
                  $mensagem3 = $res[0]['mensagem'];
                  $arquivo3 = $res[0]['arquivo'];                 
                  $data3 = $res[0]['data'];
                  $hora3 = $res[0]['hora']; 
                   $dataF3 = implode('/', array_reverse(explode('-', $data3)));  
                } 


                ?>
               
                    <span><i><?php echo $mensagem3 ?></i> <br> <br>
                       
                            </div>

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

                                $('#mensagem-msg').removeClass()

                                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#mensagem-msg').addClass('text-danger')
                }

                $('#mensagem-msg').text(mensagem)

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


        var arquivo = file['name'];
        resultado = arquivo.split(".", 2);
        //console.log(resultado[1]);

        if(resultado[1] === 'pdf'){
            $('#target').attr('src', "../img/arquivos-aula/pdf.png");
            return;
        }

         if(resultado[1] === 'rar'){
            $('#target').attr('src', "../img/arquivos-aula/zip.png");
            return;
        }


         if(resultado[1] === 'zip'){
            $('#target').attr('src', "../img/arquivos-aula/zip.png");
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





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>







                <!--AJAX PARA EXCLUSÃO DOS DADOS -->
                <script type="text/javascript">
                    $(document).ready(function () {
                        var pag = "<?=$pag?>";
                        $('#btn-baixar').click(function (event) {
                            event.preventDefault();

                            $.ajax({
                                url: pag + "/baixar.php",
                                method: "post",
                                data: $('form').serialize(),
                                dataType: "text",
                                success: function (mensagem) {

                                    if (mensagem.trim() === 'Baixado com Sucesso!') {


                                        $('#btn-cancelar-baixar').click();
                                        window.location = "index.php?pag=" + pag;
                                    }

                                    $('#mensagem_baixar').text(mensagem)



                                },

                            })
                        })
                    })
                </script>

