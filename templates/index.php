<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>EduSis</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../img/LOGO.png" type="image/png">

</head>

<!-- VIEWS -->
<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Administrador</div>
            </a>
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">
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

                        <a class="collapse-item" href="index.php?pag=secretarios">Secretários</a>
                        <a class="collapse-item" href="index.php?pag=Professores">Professores</a>
                    </div>
                </div>
            </li>

            <!-- iremos utlizar mais na frente linha 47 - 60 -->
           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-home"></i>
                    <span>Pessoas II</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Dados XX:</h6>
                        <a class="collapse-item" href="index.php?pag=alunos">Alunos</a>
                        <a class="collapse-item" href="index.php?pag=menu4">Menu 4</a>
                        <a class="collapse-item" href="index.php?pag=menu5">Menu 5</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Consultas
            </div>
            <li class="nav-item">
                <a class="nav-link" href="index.php?pag=menu6">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Menu 6</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <img class="img-profile" src="../img/LOGO.png" width="210" height="72">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nome do usuário</span>
                            <img class="img-profile rounded-circle" src="../img/sem-foto.jpg">
                        </a>

                        <!-- edição de perfil -->

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                Editar Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                Sair
                            </a>
                        </div>
                        <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="ModalPerfilLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-perfil" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalPerfilLabel">Editar Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input value="<?php echo $nome ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input value="<?php echo $cpf ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="<?php echo $email ?>" type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input value="" type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="imagem">Foto</label>
                                <input value="<?php echo $img ?>" type="file" class="form-control-file" id="imagem" name="imagem" onchange="carregarImg();">
                            </div>
                            <div class="form-group mb-2">
                                <img src="../img/profiles/<?php echo $img ?>" alt="Carregue sua Imagem" id="target" width="100%">
                            </div>
                        </div>
                    </div>
                    <small>
                        <div id="mensagem" class="mr-4">

                            <!-- atualizar informações do perfil -->
                        </div>
                    </small>
                </div>
                <div class="modal-footer">
                    <input value="<?php echo $idUsuario ?>" type="hidden" name="txtid" id="txtid">
                    <input value="<?php echo $cpf ?>" type="hidden" name="antigo" id="antigo">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">

                <!-- Paginas URLS -->
                <?php
                $pag = @$_GET["pag"];
                if ($pag == null) {

                } elseif ($pag == "secretarios") {
                    include_once("secretarios.php");
                } elseif ($pag == "Professores") {
                    include_once("professores.php");
                } elseif ($pag == "menu6") {
                    include_once("menu6.php");
                }
                ?>
                
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            
        </div>
    </div>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>