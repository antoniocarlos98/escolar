<?php 
$pag = "turmas";
require_once("../conexao.php"); 

@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}


?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Nova Turma</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Turmas</th>
                        <th>Sala</th>
                        <th>Professor</th>
                        <th>Horário</th>
                        <th>Dias</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                 <?php 

                 $query = $pdo->query("SELECT * FROM turmas order by id desc ");
                 $res = $query->fetchAll(PDO::FETCH_ASSOC);

                 for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $disciplina = $res[$i]['disciplina'];
                  $sala = $res[$i]['sala'];
                  $professor = $res[$i]['professor'];
                  $horario = $res[$i]['horario'];
                  $dia = $res[$i]['dia'];
                  $id = $res[$i]['id'];

                      //RECUPERAR NOME DISCIPLINA
                  $query_r = $pdo->query("SELECT * FROM disciplinas where id =  '$disciplina'");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                  $nome_disc = $res_r[0]['nome'];

                       //RECUPERAR NOME SALA
                  $query_r = $pdo->query("SELECT * FROM salas where id =  '$sala'");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                  $nome_sala = $res_r[0]['sala'];

                       //RECUPERAR NOME PROFESSOR
                  $query_r = $pdo->query("SELECT * FROM professores where id =  '$professor'");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                  $nome_prof = $res_r[0]['nome'];

                  $query2 = $pdo->query("SELECT * FROM matriculas where turma = '$id' order by id desc ");
                  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                  $total_alunos = @count(@$res2);


                  ?>


                  <tr>
                    <td><?php echo $nome_disc ?> <small> <span><i class='fa fa-user text-primary'></i></span> <span class="text-danger">(<?php echo $total_alunos ?>)</span></small></td>
                    <td><?php echo $nome_sala ?></td>
                    <td><?php echo $nome_prof ?></td>
                    <td><?php echo $horario ?></td>
                    <td><?php echo $dia ?></td>


                    <td>
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>

                       <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-primary mr-1' title='Ver Dados da Turma'><i class='fas fa-home'></i></a>

                       <a href="index.php?pag=<?php echo $pag ?>&funcao=matricula&id=<?php echo $id ?>" class='text-success mr-1' title='Matricular Aluno'><i class='fas fa-user-plus'></i></a>

                       <a href="index.php?pag=<?php echo $pag ?>&funcao=modulos&id=<?php echo $id ?>" class='text-secondary mr-1' title='Adicionar Módulos / Cursos'><i class='fas fa-plus'></i></a>
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

                    $query = $pdo->query("SELECT * FROM turmas where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $disciplina2 = $res[0]['disciplina'];
                    $sala2 = $res[0]['sala'];
                    $professor2 = $res[0]['professor'];
                    $horario2 = $res[0]['horario'];
                    $dia2 = $res[0]['dia'];
                    $data_inicio2 = $res[0]['data_inicio'];
                    $data_final2 = $res[0]['data_final'];
                    //$valor_mensalidade2 = $res[0]['valor_mensalidade'];
                    $ano2 = $res[0]['ano'];



                } else {
                    $titulo = "Inserir Registro";

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
                        <div class="col-md-4">

                           <div class="form-group">
                            <label >Turma</label>
                            <select name="disciplina" class="form-control" id="disciplina">

                                <?php 

                                $query = $pdo->query("SELECT * FROM disciplinas order by nome asc ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                                for ($i=0; $i < @count($res); $i++) { 
                                    foreach ($res[$i] as $key => $value) {
                                    }
                                    $nome_reg = $res[$i]['nome'];
                                    $id_reg = $res[$i]['id'];
                                    ?>                                  
                                    <option <?php if(@$disciplina2 == $id_reg){ ?> selected <?php } ?> value="<?php echo $id_reg ?>"><?php echo $nome_reg ?></option>
                                <?php } ?>

                            </select>
                        </div>


                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                        <label >Sala</label>
                        <select name="sala" class="form-control" id="sala">

                            <?php 

                            $query = $pdo->query("SELECT * FROM salas order by sala asc ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < @count($res); $i++) { 
                                foreach ($res[$i] as $key => $value) {
                                }
                                $nome_reg = $res[$i]['sala'];
                                $id_reg = $res[$i]['id'];
                                ?>                                  
                                <option <?php if(@$sala2 == $id_reg){ ?> selected <?php } ?> value="<?php echo $id_reg ?>"><?php echo $nome_reg ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                 <div class="form-group">
                    <label >Professor</label>
                    <select name="professor" class="form-control" id="professor">

                        <?php 

                        $query = $pdo->query("SELECT * FROM professores order by nome asc ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < @count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }
                            $nome_reg = $res[$i]['nome'];
                            $id_reg = $res[$i]['id'];
                            ?>                                  
                            <option <?php if(@$professor2 == $id_reg){ ?> selected <?php } ?> value="<?php echo $id_reg ?>"><?php echo $nome_reg ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label >Data Início</label>
                    <input value="<?php echo @$data_inicio2 ?>" type="date" class="form-control" id="data_inicio" name="data_inicio">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label >Data Final</label>
                <input value="<?php echo @$data_final2 ?>" type="date" class="form-control" id="data_final" name="data_final">
            </div>
        </div>
        <div class="col-md-4">
           <div class="form-group">
            <label >Horário Aulas</label>
            <input value="<?php echo @$horario2 ?>" type="text" class="form-control" id="horario" name="horario" placeholder="De xx:xx às xx:xx">
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label >Dias das Aulas</label>
            <input value="<?php echo @$dia2 ?>" type="text" class="form-control" id="dia" name="dia" placeholder="Segunda à Sexta">
        </div>
    </div>
    <!-- Modal -->
   <!-- <div class="col-md-4">
       <div class="form-group">
        <label >Valor Mensalidade</label>
        <input value="<?php echo @$valor_mensalidade2 ?>" type="text" class="form-control" id="valor_mensalidade" name="valor_mensalidade" placeholder="Valor da Mensalidade">
    </div>
</div>-->
<div class="col-md-4">
    <div class="form-group">
        <label >Ano Início</label>
        <input value="<?php echo @$ano2 ?>" type="number" class="form-control" id="ano" name="ano" placeholder="Ano da Turma">
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

                <small><div align="center" id="mensagem_excluir" class="">

                </div></small>

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
                <h5 class="modal-title">Dados da Turma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
                if (@$_GET['funcao'] == 'endereco') {

                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM turmas where id = '$id2' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $disciplina3 = $res[0]['disciplina'];
                    $sala3 = $res[0]['sala'];
                    $professor3 = $res[0]['professor'];
                    $horario3 = $res[0]['horario'];
                    $dia3 = $res[0]['dia'];
                    $data_inicio3 = $res[0]['data_inicio'];
                    $data_final3 = $res[0]['data_final'];
                    //$valor_mensalidade3 = $res[0]['valor_mensalidade'];
                    $ano3 = $res[0]['ano'];


                     //RECUPERAR NOME DISCIPLINA
                    $query_r = $pdo->query("SELECT * FROM disciplinas where id =  '$disciplina3'");
                    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                    $nome_disc3 = $res_r[0]['nome'];

                       //RECUPERAR NOME SALA
                    $query_r = $pdo->query("SELECT * FROM salas where id =  '$sala3'");
                    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                    $nome_sala3 = $res_r[0]['sala'];

                       //RECUPERAR NOME PROFESSOR
                    $query_r = $pdo->query("SELECT * FROM professores where id =  '$professor3'");
                    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                    $nome_prof3 = $res_r[0]['nome'];

                    /*$valor_mensF = number_format($valor_mensalidade3, 2, ',', '.');*/
                    $data_inicioF = implode('/', array_reverse(explode('-', $data_inicio3)));
                    $data_finalF = implode('/', array_reverse(explode('-', $data_final3)));
                    
                } 


                ?>
                
                <span><b>Disciplina: </b> <i><?php echo $nome_disc3 ?></i><br></span>

                <span><b>Sala: </b> <i><?php echo $nome_sala3 ?></i> </span><span class="ml-4"><b>Professor: </b> <i><?php echo $nome_prof3 ?></i><br></span>

                <span><b>Data Início: </b> <i><?php echo $data_inicioF ?></i> </span><span class="ml-4"><b>Data Final: </b> <i><?php echo $data_finalF ?></i><br></span>

                <span><b>Horário: </b> <i><?php echo $horario3 ?></i> </span><span class="ml-4"><b>Dias: </b> <i><?php echo $dia3 ?></i><br></span>
<!-- Modal -->
               <!-- <span><b>Valor Mensalidade: </b> <i>R$ <?php echo $valor_mensF ?></i> </span><span class="ml-4"><b>Ano: </b> <i><?php echo $ano3 ?></i><br></span>-->
                <!-- AQUI -->
              <span><b>Total de Alunos: </b> <i><?php echo $total_alunos ?></i> </span>

                


            </div>

        </div>
    </div>
</div>







<div class="modal" id="modal-matricula" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Matricular Aluno <small><a class="text-dark" title="Ver Alunos Matriculados" href="index.php?pag=<?php echo $pag ?>&funcao=matriculados&id_turma=<?php echo $_GET['id'] ?>"><u>Ver Alunos</u></a></small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

             <!-- DataTales Example -->
             <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
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
                              $id_aluno = $res[$i]['id'];


                              ?>


                              <tr>
                                <td><?php echo $nome ?></td>
                                <td><?php echo $telefone ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $cpf ?></td>
                                <td><img src="../img/alunos/<?php echo $foto ?>" width="50"></td>


                                <td>

                                   <a href="index.php?pag=<?php echo $pag ?>&funcao=confirmar&id_turma=<?php echo $_GET['id'] ?>&id_aluno=<?php echo $id_aluno ?>" class='text-primary mr-1' title='Confirmar Matricula'><i class='fas fa-check'></i></a>
                               </td>
                           </tr>
                       <?php } ?>





                   </tbody>
               </table>
           </div>
       </div>
   </div>



</div>

</div>
</div>
</div>





<div class="modal" id="modal-matriculados" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alunos Matriculados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                $query = $pdo->query("SELECT * FROM matriculas where turma = '$_GET[id_turma]' order by id desc ");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $aluno = $res[$i]['aluno'];
                  $id_m = $res[$i]['id'];
                  $query_r = $pdo->query("SELECT * FROM alunos where id = '" . $aluno . "' ");
                  $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

                  $nome_aluno = $res_r[0]['nome'];

                  ?>
                  <span><small><?php echo $nome_aluno ?><a title="Excluir Matrícula" href="index.php?pag=<?php echo $pag ?>&funcao=excluir_matricula&id_m=<?php echo $id_m ?>&id_turma=<?php echo $_GET['id_turma'] ?>"><span class="ml-2"><i class='fas fa-times text-danger'></i></span></a></small></span>

                  <hr style="margin:4px">

              <?php } ?>



          </div>

      </div>
  </div>
</div>






<div class="modal" id="modal-modulos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Módulos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                       $query = $pdo->query("SELECT * FROM modulos order by id asc ");
                       $res = $query->fetchAll(PDO::FETCH_ASSOC);

                       for ($i=0; $i < count($res); $i++) { 
                          foreach ($res[$i] as $key => $value) {
                          }

                          $nome_modulo = $res[$i]['nome'];
                          $id_m = $res[$i]['id'];

                          ?>
                          <span><small><?php echo $nome_modulo ?><a title="Adicionar Módulo" href="index.php?pag=<?php echo $pag ?>&funcao=add_modulo&id_m=<?php echo $id_m ?>&id_turma=<?php echo $_GET['id'] ?>&id_mod=<?php echo $id_m ?>"><span class="ml-2"><i class='fas fa-check text-success'></i></span></a></small></span>

                          <hr style="margin:4px">

                      <?php } ?>

                  </div>
                  <div class="col-md-6">
                   <?php 
                   $id_da_turma = @$_GET['id'];
                   $query = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_da_turma' order by id asc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);
                   if(@count($res) > 0){

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $id_modulo = $res[$i]['modulo'];
                      $id_mt = $res[$i]['id'];

                      $query2 = $pdo->query("SELECT * FROM modulos where id = '$id_modulo' ");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $nome_modulo = $res2[0]['nome'];

                      ?>
                      <span><small><?php echo $i+1 .' - '. $nome_modulo ?><a title="Excluir Módulo" href="index.php?pag=<?php echo $pag ?>&funcao=excluir_modulo&id_mt=<?php echo $id_mt ?>&id_turma=<?php echo $_GET['id'] ?>"><span class="ml-2"><i class='fas fa-times text-danger'></i></span></a></small></span>

                      <hr style="margin:4px">

                  <?php } }else{
                    echo '<small>Nenhum módulo / curso Adicionado!</small>';
                  } ?>

              </div>
          </div>



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


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "matricula") {
    echo "<script>$('#modal-matricula').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "confirmar") {

    $id_turma = $_GET['id_turma'];
    $id_aluno = $_GET['id_aluno'];

    $query_r = $pdo->query("SELECT * FROM matriculas where turma = '$id_turma' and aluno = '$id_aluno' ");
    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

    if(@count($res_r) == 0){
       $res = $pdo->query("INSERT INTO matriculas SET turma = '$id_turma', aluno = '$id_aluno', data = curDate()");

        $id_matricula = $pdo->lastInsertId();

     //GERAR AS PARCELAS DE PAGAMENTO MATRICULA
     /*$query_r = $pdo->query("SELECT * FROM turmas where id = '$id_turma' ");
    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);    
    $data_ini = $res_r[0]['data_inicio'];
    $data_fin = $res_r[0]['data_final'];
    $valor_turma = $res_r[0]['valor_mensalidade'];*/

    //RECUPERAR O TOTAL DE MESES ENTRE DATAS
/*$d1 = new DateTime($data_ini);
$d2 = new DateTime($data_fin);
$intervalo = $d1->diff( $d2 );
$anos = $intervalo->y;
$meses = $intervalo->m + ($anos * 12);

 for ($i=0; $i < $meses; $i++) { 

    //INCREMENTAR 1 MES NA DATA INICIAL
         $data_nova = date('Y/m/d', strtotime("+$i month",strtotime($data_ini))); 

         $res = $pdo->query("INSERT INTO pgto_matriculas SET matricula = '$id_matricula', valor = '$valor_turma', data_venc = '$data_nova', pago = 'Não'");


    }*/

   }

   echo "<script>window.location='index.php?pag=$pag&id_turma=$id_turma&id_aluno=$id_aluno&funcao=matriculados';</script>";
   

}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "matriculados") {
    echo "<script>$('#modal-matriculados').modal('show');</script>";
}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_matricula") {

    $id_m = $_GET['id_m'];
    $id_turma = $_GET['id_turma'];


    $res = $pdo->query("DELETE from matriculas WHERE id = '$id_m'");

    echo "<script>window.location='index.php?pag=$pag&id_turma=$id_turma&id_aluno=$id_aluno&funcao=matriculados';</script>";

    
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "modulos") {
    echo "<script>$('#modal-modulos').modal('show');</script>";
}




if (@$_GET["funcao"] != null && @$_GET["funcao"] == "add_modulo") {

    $id_turma = $_GET['id_turma'];
    $id_mod = $_GET['id_mod'];

    $query_r = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_turma' and modulo = '$id_mod' ");
    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

    if(@count($res_r) == 0){
       $res = $pdo->query("INSERT INTO modulos_turmas SET turma = '$id_turma', modulo = '$id_mod'");

   }

   echo "<script>window.location='index.php?pag=$pag&funcao=modulos&id=$id_turma';</script>";
   

}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_modulo") {

    $id_mt = $_GET['id_mt'];
    $id_turma = $_GET['id_turma'];


    $res = $pdo->query("DELETE from modulos_turmas WHERE id = '$id_mt'");

    echo "<script>window.location='index.php?pag=$pag&funcao=modulos&id=$id_turma';</script>";

    
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

                    $('#mensagem_excluir').addClass('text-danger')
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



