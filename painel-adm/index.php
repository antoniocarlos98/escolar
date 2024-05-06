<?php 
    @session_start();
    require_once("../conexao.php"); 

    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "secretarios";
    $menu2 = "professores";
    //$menu3 = "tesoureiros";
    $menu4 = "funcionarios";
    $menu5 = "disciplinas";
    $menu6 = "salas";
    $menu7 = "turmas";
    $menu8 = "usuarios";
    $menu9 = "modulos";

    //RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usu = @$res[0]['nome'];
$cpf_usu = @$res[0]['cpf'];
$email_usu = @$res[0]['email'];
$idUsuario = @$res[0]['id'];  

 ?>



<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Antonio Carlos e João Pedro">

        <title>Painel Administrativo</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
   <link rel="shortcut icon" href="../img/icone.png" type="image/x-icon">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                    <div class="sidebar-brand-text mx-3">Administrador</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Cadastros
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>Pessoas</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu1 ?>">Secretários</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu2 ?>">Professores</a>

                             <!--<a class="collapse-item" href="index.php?pag=<?php echo $menu3 ?>">Tesoureiros</a>-->
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu4 ?>">Funcionários</a>
                             <a class="collapse-item" href="index.php?pag=<?php echo $menu8 ?>">Usuários</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-home"></i>
                        <span>Turmas / Disciplinas</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                           
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu5 ?>">Disciplinas / Cursos</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu6 ?>">Salas</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu7 ?>">Turmas</a>
                             <a class="collapse-item" href="index.php?pag=<?php echo $menu9 ?>">Módulos / Curso</a>

                        </div>
                    </div>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="../painel-secretaria" target="_blank">
                        <i class="fas fa-phone-alt fa-chart-area"></i>
                        <span>Painel Secretaria</span></a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="../painel-tesoureiro" target="_blank">
                        <i class="fas fa-dollar-sign fa-chart-area"></i>
                        <span>Painel Tesouraria</span></a>
                </li>-->    

                <!-- Divider -->
                <hr class="sidebar-divider">

              
              

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <img class="mt-2" src="../img/logo.png" width="146" height="78">



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nome_usu ?></span>
                                    <img class="img-profile rounded-circle" src="../img/sem-foto.jpg">

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                        Editar Perfil
                                    </a>


                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalConfig">
                                        <i class="fas fa-cog fa-sm fa-fw mr-2 text-primary"></i>
                                        Configurações
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?php if (@$pag == null) { 
                        @include_once("home.php"); 
                        
                        } else if (@$pag==$menu1) {
                        @include_once(@$menu1.".php");
                        
                        } else if (@$pag==$menu2) {
                        @include_once(@$menu2.".php");

                         /*} else if (@$pag==$menu3) {
                        include_once(@$menu3.".php");*/

                        } else if (@$pag==$menu4) {
                        @include_once(@$menu4.".php");

                        } else if (@$pag==$menu5) {
                        @include_once(@$menu5.".php");

                        } else if (@$pag==$menu6) {
                        @include_once(@$menu6.".php");

                         } else if (@$pag==$menu7) {
                        @include_once(@$menu7.".php");

                         } else if (@$pag==$menu8) {
                        @include_once(@$menu8.".php");

                         } else if (@$pag==$menu9) {
                        @include_once(@$menu9.".php");
                       
                       
                        
                        } else {
                        @include_once("home.php");
                        }
                        ?>
                        
                        

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <!--  Modal Perfil-->
        <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>



                    <form id="form-perfil" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                           
                                    <div class="form-group">
                                        <label >Nome</label>
                                        <input value="<?php echo $nome_usu ?>" type="text" class="form-control" id="nome_usu" name="nome_usu" placeholder="Nome">
                                    </div>

                                    <div class="form-group">
                                        <label >CPF</label>
                                        <input value="<?php echo $cpf_usu ?>" type="text" class="form-control" id="cpf_usu" name="cpf_usu" placeholder="CPF">
                                    </div>

                                    <!-- Inclua o jQuery -->
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <!-- Inclua o jQuery Mask Plugin -->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                                    <script>
                                    // Aplicar a máscara ao campo CPF
                                    $(document).ready(function(){
                                    $('#cpf_usu').mask('000.000.000-00', {reverse: true});
                                        });
                                    </script>


                                    <div class="form-group">
                                        <label >Email</label>
                                        <input value="<?php echo $email_usu ?>" type="email" class="form-control" id="email_usu" name="email_usu" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label >Senha</label>
                                        <input value="" type="password" class="form-control" id="senha_usu" name="senha_usu" placeholder="Senha">
                                    </div>
                             



                            <small>
                                <div id="mensagem-perfil" class="mr-4">

                                </div>
                            </small>



                        </div>
                        <div class="modal-footer">



                            <input value="<?php echo $idUsuario ?>" type="hidden" name="id_usu" id="id_usu">
                            <input value="<?php echo $cpf_usu ?>" type="hidden" name="antigo_usu" id="antigo_usu">

                            <button type="button" id="btn-fechar-perfil" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>










        <!--  Modal Perfil-->
        <div class="modal fade" id="ModalConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Configurações</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>



                    <form id="form-config" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Nome Escola</label>
                                        <input value="<?php echo $nome_escola ?>" type="text" class="form-control-sm" name="nome_escola" placeholder="Nome da Escola" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Telefone Escola</label>
                                        <input value="<?php echo $telefone_escola ?>" type="text" class="form-control-sm" name="telefone_escola" id="telefone_escola" placeholder="Telefone da Escola" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Email Administrador</label>
                                        <input value="<?php echo $email_adm ?>" type="text" class="form-control-sm" name="email_adm" placeholder="Email do Gestor" style="width:100%">
                                    </div>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-md-8">
                                         <div class="form-group">
                                        <label >Endereço Escola</label>
                                        <input value="<?php echo $endereco_escola ?>" type="text" class="form-control-sm" name="endereco_escola" placeholder="Endereço da Escola" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Cidade Escola</label>
                                        <input value="<?php echo $cidade_escola ?>" type="text" class="form-control-sm" name="cidade_escola" placeholder="Cidade da Escola" style="width:100%">
                                    </div>
                                    </div>



                                </div>





                                <div class="row">

                                    <div class="col-md-8">
                                         <div class="form-group">
                                        <label >Rodapé Relatórios</label>
                                        <input value="<?php echo $rodape_relatorios ?>" type="text" class="form-control-sm" name="rodape_relatorios" placeholder="Texto do rodapé nos relatórios" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >CNPJ Escola</label>
                                        <input value="<?php echo $cnpj_escola ?>" type="text" class="form-control-sm" id="cnpj_escola" name="cnpj_escola" placeholder="CNPJ da Escola"  style="width:100%">
                                    </div>
                                    </div>



                                </div>




                                <div class="row">

                                    <!--<div class="col-md-3">
                                         <div class="form-group">
                                        <label >PGTO Boleto</label>
                                        <select class="form-control-sm" name="pgto_boleto" style="width:100%">
                                            <option value="Sim" <?php if($pgto_boleto == "Sim"){ echo 'selected'; } ?>>Sim</option>
                                            <option value="Não" <?php if($pgto_boleto == "Não"){ echo 'selected'; } ?>>Não</option>
                                        </select>
                                    </div>
                                    </div>-->


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Média Porcentagem Presença</label>
                                        <input value="<?php echo $media_porcentagem_presenca ?>" type="number" class="form-control-sm" name="media_porcentagem_presenca"  placeholder="Média de Presença Ex 70" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-5">
                                         <div class="form-group">
                                        <label >Média Pontos Mínimo Aprovação</label>
                                        <input value="<?php echo $media_pontos_minimo_aprovacao ?>" type="number" class="form-control-sm" name="media_pontos_minimo_aprovacao" placeholder="Média de Pontos para Aprovação" style="width:100%">
                                    </div>
                                    </div>

                                </div>



                                <div class="row">                                   


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Máximo pontos disciplina</label>
                                        <input value="<?php echo $maximo_pontos_disciplina ?>" type="number" class="form-control-sm" name="maximo_pontos_disciplina"  placeholder="Máximo de pontos disciplina" style="width:100%">
                                    </div>
                                    </div>


                                     <div class="col-md-4">
                                         <div class="form-group">
                                        <label >Carga Horária Certificado</label>
                                        <input value="<?php echo $carga_horaria_cert ?>" type="number" class="form-control-sm" name="carga_horaria_cert" placeholder="Carga Certificado" style="width:100%">
                                    </div>
                                    </div>

                                </div>
                                   

                                   <div class="row">

                                     <div class="col-md-4">
                                    <div class="form-group">
                                                <label >Logo (*PNG) <small>Modelo Retangular</small></label>
                                                <input type="file" class="form-control" id="logo_escola" name="logo" onChange="carregarLogo();">
                                            </div>

                                            <div id="">                   
                                                <img src="../img/logo.png" width="100" id="target_logo">   
                                            </div>
                                     </div>


                                      <div class="col-md-4">
                                    <div class="form-group">
                                                <label >Ícone (*PNG)</label>
                                                <input type="file" class="form-control" id="icone_escola" name="icone" onChange="carregarIcone();">
                                            </div>

                                            <div id="">                   
                                                <img src="../img/icone.png" width="40" id="target_icone">   
                                            </div>
                                     </div>




                                     <div class="col-md-4">
                                    <div class="form-group">
                                                <label >Logo Rel PDF (*JPG)</label>
                                                <input type="file" class="form-control" id="logo_rel_escola" name="logo_rel" onChange="carregarLogoRel();">
                                            </div>

                                            <div id="">                   
                                                <img src="../img/cp.jpg" width="100" id="target_logo_rel">   
                                            </div>
                                     </div>
                                       
                                   </div>
                                   


                            <small>
                                <div id="mensagem-config" class="mr-4">

                                </div>
                            </small>



                        </div>
                        <div class="modal-footer">

                            <button type="button" id="btn-fechar-config" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="btn-salvar-config" id="btn-salvar-config" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="../js/mascaras.js"></script>

    </body>

</html>





<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form-perfil").submit(function () {
       
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-perfil.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem-perfil').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-perfil').click();
                    window.location = "index.php";

                } else {

                    $('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)

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



  <!--SCRIPT PARA CARREGAR IMAGEM -->
                <script type="text/javascript">

                    function carregarLogo() {

                        var target = document.getElementById('target_logo');
                        var file = document.querySelector("#logo_escola").files[0];
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




                      function carregarIcone() {

                        var target = document.getElementById('target_icone');
                        var file = document.querySelector("#icone_escola").files[0];
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



                    function carregarLogoRel() {

                        var target = document.getElementById('target_logo_rel');
                        var file = document.querySelector("#logo_rel_escola").files[0];
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
    $("#form-config").submit(function () {
       
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-config.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem-config').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-config').click();
                    window.location = "index.php";

                } else {

                    $('#mensagem-config').addClass('text-danger')
                }

                $('#mensagem-config').text(mensagem)

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

