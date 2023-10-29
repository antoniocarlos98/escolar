<?php 

@session_start();
require_once("../conexao.php"); 


$cpf_usuario = @$_SESSION['cpf_usuario'];

$query = $pdo->query("SELECT * FROM alunos where cpf = '$cpf_usuario'  order by id asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_aluno = $res[0]['id'];

$id_mat = $_GET['id'];
$id_per = @$_GET['id_periodo'];

$query = $pdo->query("SELECT * FROM matriculas where id = '$id_mat' order by id desc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_turma = $res[0]['turma'];

$query_2 = $pdo->query("SELECT * FROM turmas where id = '$id_turma' ");
$res_2 = $query_2->fetchAll(PDO::FETCH_ASSOC);
$disciplina = $res_2[0]['disciplina'];
$horario = $res_2[0]['horario'];
$dia = $res_2[0]['dia'];
$ano = $res_2[0]['ano'];
$data_final = $res_2[0]['data_final'];
$data_inicio = $res_2[0]['data_inicio'];
$professor = $res_2[0]['professor'];


                  	//RECUPERAR O TOTAL DE MESES ENTRE DATAS
$d1 = new DateTime($data_inicio);
$d2 = new DateTime($data_final);
$intervalo = $d1->diff( $d2 );
$anos = $intervalo->y;
$meses = $intervalo->m + ($anos * 12);

$data_finalF = implode('/', array_reverse(explode('-', $data_final)));

$query_resp = $pdo->query("SELECT * FROM disciplinas where id = '$disciplina' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$nome_disc = $res_resp[0]['nome'];


$query_resp = $pdo->query("SELECT * FROM professores where id = '$professor' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$nome_prof = $res_resp[0]['nome'];
$email_prof = $res_resp[0]['email'];
$imagem_prof = $res_resp[0]['foto'];


if($data_final < date('Y-m-d')){
 $concluido = 'Sim';
}else{
 $concluido = 'Não';
}




$query_resp = $pdo->query("SELECT * FROM matriculas where turma = '$id_turma' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$total_alunos = @count($res_resp);

$id_get_periodo = @$_GET['id_periodo'];

$query_resp = $pdo->query("SELECT * FROM aulas where turma = '$id_turma' and periodo = '$id_get_periodo'");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                 
$total_aulas = @count($res_resp);



$query_resp = $pdo->query("SELECT * FROM periodos where id = '$id_get_periodo' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                 
$nome_periodo = $res_resp[0]['nome'];
$maximo_nota = $res_resp[0]['total_pontos'];    





//RECUPERAR A % DE FREQUENCIA DO ALUNO
$contador = 0;
$query = $pdo->query("SELECT * FROM periodos where turma = '$id_turma' order by id asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$totalPorcentagemSoma = 0;
$totalPorcentagemSomaF = 0;
for ($i=0; $i < count($res); $i++) { 
  foreach ($res[$i] as $key => $value) {
  }

  $nome = $res[$i]['nome'];
  $id_periodo = $res[$i]['id'];


  
  $query_p = $pdo->query("SELECT * FROM aulas where periodo = '$id_periodo' ");
  $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);
  if(@count($res_p) > 0){
    $contador = $contador + 1;


          //CALCULAR FREQUÊNCIA
    $query2 = $pdo->query("SELECT * FROM chamadas where turma = '$id_turma' and aluno = '$id_aluno' and periodo = '$id_periodo'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $total_presencas2 = 0;
    $total_chamadas2 = 0;
    $porcentagem2 = 0;
    $totalPorcentagem = 0;
    
    $totalPorcentagemF = 0;
    for ($i2=0; $i2 < count($res2); $i2++) { 
      foreach ($res2[$i2] as $key => $value) {
      }
      $total_chamadas2 = count($res2);
      $presenca = @$res2[$i2]['presenca'];

      if($presenca == 'P'){
        $total_presencas2 = $total_presencas2 + 1;
      }

      $porcentagem2 = ($total_presencas2 * 100) / $total_chamadas2;
      
    }


    $totalPorcentagem = $totalPorcentagem + $porcentagem2;
    $totalPorcentagemSoma = $totalPorcentagem + $totalPorcentagemSoma;
    $totalPorcentagemSoma = $totalPorcentagemSoma / $contador . ' ' ;
  }
}


$totalPorcentagemSomaF = number_format(@$totalPorcentagemSoma, 2, ',', '.');

if($totalPorcentagemSoma < $media_porcentagem_presenca){
  $cor_presenca2 = 'text-danger';
}else{
  $cor_presenca2 = 'text-success';
}




  //RECUPERAR AS NOTAS POR PERIODO
$query = $pdo->query("SELECT * FROM periodos where turma = '$id_turma' order by id asc ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_notas_curso = 0;
    for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }

      $nome = $res[$i]['nome'];
      $id_periodo = $res[$i]['id'];
      $minimo_media = $res[$i]['minimo_media'];


        
      $query_n = $pdo->query("SELECT * FROM notas where periodo = '$id_periodo' and aluno = '$id_aluno'");
      $res_n = $query_n->fetchAll(PDO::FETCH_ASSOC);
      $total_notas_periodo = 0;

      for ($in=0; $in < count($res_n); $in++) { 
        foreach ($res_n[$in] as $key => $value) {
        }

        $total_notas_periodo = $total_notas_periodo + $res_n[$in]['nota'];


      }

      $total_notas_curso = $total_notas_curso + $total_notas_periodo;
      
    }


    //CALCULAR A MÉDIA DE PONTOS NO TOTAL
$query = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_turma'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$tot_modulos = @count($res);
if($tot_modulos > 0){
  $total_notas_curso = round($total_notas_curso / $tot_modulos);
}else{
  $total_notas_curso = $total_notas_curso;
}


 

?>

<h6><?php echo mb_strtoupper($nome_disc) ?> 
<?php 
    
$query_resp = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_turma' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC); 
$total_modulos = @count($res_resp);
if($total_modulos > 0){
  echo ' - '. $total_modulos . ' Módulos';
}                

 ?>

  <?php if($total_notas_curso >= $media_pontos_minimo_aprovacao){ ?>
    <a title="Retirar Certificado" href="../rel/certificado.php?id_turma=<?php echo $id_turma ?>&id_aluno=<?php echo $id_aluno ?>" target="_blank"> 
      <img src="../img/ico-certificado.png" width="30px">
    </a>
  <?php } ?>

</h6>
<hr>

<small>
  <div class="mb-3">

   <span class="mr-3"><i><b>Disciplina Concluída </b> <?php echo $concluido ?></i></span>
   <span class="mr-3"><i><b>Dias de Aula </b> <?php echo $dia ?></i></span>
   <span class="mr-3"><i><b>Horário Aula </b> <?php echo $horario ?></i></span>
   <span class="mr-3"><i><b>Ano Início </b> <?php echo $ano ?></i></span>
   <span class="mr-3"><i><b>Data da Conclusão </b> <?php echo $data_finalF ?></i></span>
 </div>
</small>

<hr>

<small>
  <div class="mb-3">
   <span class="mr-3"><img src="../img/professores/<?php echo $imagem_prof ?>" width="40px"></i></span>
   <span class="mr-3"><i><b>Professor:</b> <?php echo $nome_prof ?></i></span>
   <span class="mr-3"><i><b>Email Professor </b> <?php echo $email_prof ?></i></span>


 </div>
</small>
<hr>


<div class="row">
  <!--AJAX PARA LISTAR OS DADOS -->
  <!--<div class="col-xl-3 col-md-6 mb-4">
   <a class="text-dark" href="" data-toggle="modal" data-target="#modal-pagamentos" title="Informações da Turma">
     <div class="card text-danger shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold  text-danger text-uppercase">MENSALIDADES</div>
         <div class="text-xs text-secondary"> <?php echo $meses ?> PARCELAS</div>
       </div>
       <div class="col-auto" align="center">
         <i class="far fa-calendar-alt fa-2x  text-danger"></i><br>
         <span class="text-xs"></span>
       </div>
     </div>
   </div>
 </div>
</a>
</div>-->



<div class="col-xl-3 col-md-6 mb-4">
	<a class="text-dark" href="index.php?pag=turma&funcao=periodos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&frequencia=sim" title="Informações da Turma">
   <div class="card text-dark shadow h-100 py-2">
    <div class="card-body">
     <div class="row no-gutters align-items-center">
      <div class="col mr-2">
       <div class="text-xs font-weight-bold  text-primary text-uppercase">FREQUÊNCIA</div>
       <div class="text-xs text-secondary"> <span class="<?php echo $cor_presenca2 ?>"><?php echo $totalPorcentagemSomaF ?>% </span> DE FREQUÊNCIA</div>
     </div>
     <div class="col-auto" align="center">
       <i class="fas fa-calendar-day fa-2x  text-primary"></i><br>
       <span class="text-xs"></span>
     </div>
   </div>
 </div>
</div>
</a>
</div>




<div class="col-xl-3 col-md-6 mb-4">
	<a class="text-dark" href="index.php?pag=turma&funcao=periodos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&boletim=sim" title="Informações da Turma">
   <div class="card text-primary shadow h-100 py-2">
    <div class="card-body">
     <div class="row no-gutters align-items-center">
      <div class="col mr-2">
       <div class="text-xs font-weight-bold  text-primary text-uppercase">BOLETIM</div>
       <div class="text-xs text-secondary"> CONSULTAR NOTAS</div>
     </div>
     <div class="col-auto" align="center">
       <i class="fas fa-file-invoice fa-2x  text-primary"></i><br>
       <span class="text-xs"></span>
     </div>
   </div>
 </div>
</div>
</a>
</div>




<div class="col-xl-3 col-md-6 mb-4">
	<a class="text-dark" href="index.php?pag=turma&funcao=periodos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&aulas=sim" title="Aulas do Curso">
   <div class="card text-primary shadow h-100 py-2">
    <div class="card-body">
     <div class="row no-gutters align-items-center">
      <div class="col mr-2">
       <div class="text-xs font-weight-bold  text-primary text-uppercase">AULAS</div>
       <div class="text-xs text-secondary"> GRADE DO CURSO</div>
     </div>
     <div class="col-auto" align="center">
       <i class="fas fa-video fa-2x  text-primary"></i><br>
       <span class="text-xs"></span>
     </div>
   </div>
 </div>
</div>
</a>
</div>


</div>






<!--excluir -->
<!--<div class="modal" id="modal-pagamentos" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php 
        /*$id_m = $_GET['id'];
        $query = $pdo->query("SELECT * FROM matriculas where id = '$id_mat' ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $id = $res[0]['aluno'];
        $id_turma = $res[0]['turma'];

        $query = $pdo->query("SELECT * FROM alunos where id = '$id' ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $nome_aluno = $res[0]['nome'];

        $query = $pdo->query("SELECT * FROM turmas where id = '$id_turma' ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $disciplina = $res[0]['disciplina'];

        $query = $pdo->query("SELECT * FROM disciplinas where id = '$disciplina' ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $nome_disciplina = $res[0]['nome'];*/
        ?>
        <h6 class="modal-title"><?php echo $nome_disciplina ?></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">

        <small>
         <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Parcela</th>
              <th scope="col">Vencimento</th>
              <th scope="col">Valor</th>
              <th scope="col">Pago</th>
              
              <?php if($pgto_boleto == 'Sim'){ 
                //echo '<th scope="col">Arquivo</th>';
              } ?>
              <th scope="col">Valor Pago</th>
              <th scope="col">Data Pgto</th>
            </tr>
          </thead>
          <tbody>

            <?php 



                  //VERIFICAR SE EXISTE ATRASO NO PAGAMENTO DAS MATRICULAS
            /*$query_3 = $pdo->query("SELECT * FROM pgto_matriculas where matricula = '$id_mat' ");
            $res_3 = $query_3->fetchAll(PDO::FETCH_ASSOC);


            for ($i2=0; $i2 < count($res_3); $i2++) { 
              foreach ($res_3[$i2] as $key => $value) {
              }

              $data_venc = $res_3[$i2]['data_venc'];
              $pago = $res_3[$i2]['pago'];
              $valor = $res_3[$i2]['valor'];
              $id_pgto = $res_3[$i2]['id'];
              $arquivo = $res_3[$i2]['arquivo'];
              $valor_pago = $res_3[$i2]['valor_pago'];
              $data_pgto = $res_3[$i2]['data_pgto'];

              if($valor_pago == "" || $valor_pago == 0){
                $valor_pago = "";
              }else{
                $valor_pago = "R$ ".number_format($valor_pago, 2, ',', '.');
              }

              if($data_venc < date('Y-m-d') and $pago != 'Sim'){
                $atrasado = 'Sim';
              }

              $valor = number_format($valor, 2, ',', '.');
              $data_venc = implode('/', array_reverse(explode('-', $data_venc)));
              $data_pgto = implode('/', array_reverse(explode('-', $data_pgto)));*/




              ?>


              <tr>
                <td scope="row"><?php echo $i2+1 ?></td>

                <td>
                  <?php if($atrasado == 'Sim'){ ?>
                   <span class="text-danger"><?php echo $data_venc; 
                   //$atrasado = 'Não';
                   ?></span>
                 <?php }else{ ?>
                  <span class="text-dark"> <?php echo $data_venc ?></span>
                <?php } ?>
              </td>

              <td> R$ <?php echo $valor ?> </td>

              <td>
                <?php if($pago == 'Sim'){ ?>
                  <span class="text-success"> <?php echo $pago ?></span>
                <?php }else{ ?>
                  <span class="text-danger"><?php echo $pago ?></span>
                <?php } ?>
              </td>

              <td>
                 <?php if($pago == 'Sim'){ ?>
                      <a href="../rel/recibo_html.php?id=<?php echo $id_pgto ?>" target="_blank" class='text-primary ml-2' title='Gerar Recibo'><i class='fa fa-file'></i></a>
                 <?php } ?>
               <?php if($pgto_boleto == 'Sim'){ ?>

                <?php if($arquivo != ''){ ?>
                 <a href="../img/arquivos/<?php echo $arquivo ?>" class="text-primary ml-2" target="_blank" title="Abrir o Boleto / Carnê">Ver Arquivo</a>   
               <?php }else{ ?>
                  <?php if($pago != 'Sim'){ ?>
               <a href="../boletos/transacao.php?id=<?php echo $id_pgto ?>" target="_blank" class='text-success ml-2' title='Gerar Boleto'><i class='fa fa-file-pdf'></i></a>
             <?php } ?>
               <?php } } ?>
             </td>

              <td> <?php echo $valor_pago ?> </td>
               <td> <?php echo $data_pgto ?> </td>

           </tr>-->
<!--ate aqui -->
         

       </tbody>
     </table>
   </small>

 </div>

</div>
</div>
</div>






<div class="modal" id="modal-periodos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $nome_disc ?>
        <?php if(@$_GET['boletim'] != ""){ ?>
         - <small><small>Mínimo para Aprovação <?php echo $media_pontos_minimo_aprovacao ?> Pontos</small></small>
       <?php } ?>
     </h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <?php 
    $query = $pdo->query("SELECT * FROM periodos where turma = '$id_turma' order by id asc ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_notas_curso = 0;
    for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }

      $nome = $res[$i]['nome'];
      $id_periodo = $res[$i]['id'];
      $minimo_media = $res[$i]['minimo_media'];


          //RECUPERAR AS NOTAS POR PERIODO
      $query_n = $pdo->query("SELECT * FROM notas where periodo = '$id_periodo' and aluno = '$id_aluno'");
      $res_n = $query_n->fetchAll(PDO::FETCH_ASSOC);
      $total_notas_periodo = 0;

      for ($in=0; $in < count($res_n); $in++) { 
        foreach ($res_n[$in] as $key => $value) {
        }

        $total_notas_periodo = $total_notas_periodo + $res_n[$in]['nota'];


        


      }

              //CALCULAR A MÉDIA DE PONTOS NO TOTAL
$query_not = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_turma'");
$res_not = $query_not->fetchAll(PDO::FETCH_ASSOC);
$tot_modulos = @count($res_not);
if($tot_modulos > 0){
  $total_notas_periodo = round($total_notas_periodo / $tot_modulos);
}

if($total_notas_periodo < $minimo_media){
          $cor_nota = 'text-danger';
        }else{
          $cor_nota = 'text-primary';
        }


      $total_notas_curso = $total_notas_curso + $total_notas_periodo;

      if($total_notas_curso < $media_pontos_minimo_aprovacao){
        $classe_media_nota = 'text-danger';
      }else{
        $classe_media_nota = 'text-primary';
      }



      $query_p = $pdo->query("SELECT * FROM aulas where periodo = '$id_periodo' ");
      $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);

      if(@count($res_p) > 0){


          //CALCULAR FREQUÊNCIA
        $query2 = $pdo->query("SELECT * FROM chamadas where turma = '$id_turma' and aluno = '$id_aluno' and periodo = '$id_periodo'");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $total_presencas = 0;
        $total_chamadas = 0;
        $porcentagem = 0;
        $porcentagemF = 0;
        for ($i2=0; $i2 < count($res2); $i2++) { 
          foreach ($res2[$i2] as $key => $value) {
          }
          $total_chamadas = count($res2);
          $presenca = @$res2[$i2]['presenca'];

          if($presenca == 'P'){
            $total_presencas = $total_presencas + 1;
          }

          $porcentagem = ($total_presencas * 100) / $total_chamadas;
          $porcentagemF = number_format($porcentagem, 2, ',', '.');

          if($porcentagem < $media_porcentagem_presenca){
            $cor_presenca = 'text-danger';
          }else{
            $cor_presenca = 'text-success';
          }

        }


        ?>

        <?php if(@$_GET['frequencia'] != ""){ ?>
           <?php if($total_modulos > 0){ ?>
          <a title="Clique para Ver as Frequências" href="index.php?pag=turma&funcao=frequencias_modulos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&frequencia=sim" name="btn-salvar-aula" class="text-dark"><?php echo $nome ?> - <span class="<?php echo $cor_presenca ?>"><?php echo $porcentagemF ?></span> % de Frequência. </a>
          <?php }else{ ?>
             <a title="Clique para Ver as Frequências" href="index.php?pag=turma&funcao=frequencias&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>" name="btn-salvar-aula" class="text-dark"><?php echo $nome ?> - <span class="<?php echo $cor_presenca ?>"><?php echo $porcentagemF ?></span> % de Frequência. </a>
         
        <?php } 

        echo '<hr>';

      } ?>




        <?php if(@$_GET['boletim'] != ""){ ?>
          <a title="Gerar Boletim do Período" href="../rel/boletim_periodo.php?id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>" target="_blank" class="text-dark"><?php echo $nome ?> - <span class="<?php echo $cor_nota ?>"><?php echo $total_notas_periodo ?></span> pontos. </a>
          <hr>
        <?php } ?>



        <?php if(@$_GET['aulas'] != ""){ ?>

            <?php if($total_modulos > 0){ ?>
          <a title="Ver Grade do Curso" href="index.php?pag=turma&funcao=aulas_modulos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&aula=sim" class="text-dark"><?php echo $nome ?> - <?php echo @count($res_p) ?> Aulas </a>
          <?php }else{ ?>
          <a title="Ver Grade do Curso" href="index.php?pag=turma&funcao=aulas&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>" class="text-dark"><?php echo $nome ?> - <?php echo @count($res_p) ?> Aulas </a>
          <?php } 

        echo '<hr>';

      } ?>




      <?php }  }?>

      <?php if(@$_GET['boletim'] != ""){ ?>
        <div class="row">
          <div class="col-md-8">
             <?php if($total_modulos > 0){ ?>
             <a class="mr-4 text-dark" href="index.php?pag=turma&funcao=boletim_modulos&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&boletim=sim" title="Gerar Boletim">
              <i class='fas fa-clipboard text-success mr-1'></i>Boletim Módulo </a>
            <?php } ?>

            <a href="../rel/boletim_geral.php?id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>" target="_blank" title="Gerar Boletim">
              <i class='fas fa-clipboard text-primary mr-1'></i>Boletim Geral </a>
            </div>
            
            <div class="col-md-4" align="right">
              <small><span class="<?php echo $classe_media_nota ?>" ><?php echo $total_notas_curso ?> Pontos no Total</span></small>
            </div>
          </div>
        <?php } ?>

      </div>




    </div>
  </div>
</div>






<div class="modal" id="modal-aulas" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $nome_disc ?> - <?php echo $nome_periodo ?> - <?php echo $total_aulas ?> Aulas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php $id_mod = @$_GET['id_modulo']; ?>


        <span class=""><b>Aulas do Curso</b></span>
        <small><div id="listar-aulas" class="mt-2">

        </div></small>



      </div>


    </div>

  </div>
</div>
</div>





<div class="modal" id="modal-aulas-grade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $nome_disc ?> - <?php echo $nome_periodo ?> - <?php echo $total_aulas ?> Aulas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <span class=""><b>Aulas do Curso</b></span> <br><br>

        <?php 
        $id_mod = @$_GET['id_modulo'];
        $query = $pdo->query("SELECT * FROM aulas where turma = '$_GET[id_turma]' and periodo = '$_GET[id_periodo]' and modulo = '$id_mod' order by id asc ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        for ($i=0; $i < count($res); $i++) { 
          foreach ($res[$i] as $key => $value) {
          }

          $nome = $res[$i]['nome'];
          $descricao = $res[$i]['descricao'];
          $arquivo = $res[$i]['arquivo'];
          $id_aula = $res[$i]['id'];

          echo 'Aula '. ($i+1) . ' - '. $nome;

          if($arquivo != ""){
            echo '<span class="ml-1" ><a href="../img/arquivos-aula/'.$arquivo.'" target="_blank" class="text-primary"> Ver Arquivo </a> <br></span>';
          }else{ 
            echo '<br>';
          }

        }

        ?>


      </div>


    </div>

  </div>
</div>
</div>




<div class="modal" id="modal-modulos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $nome_disc . ' '. $total_modulos . ' Módulos' ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php 
        $id_turma = @$_GET['id_turma'];
        $id_periodo = @$_GET['id_periodo'];
        $query = $pdo->query("SELECT * FROM modulos_turmas where turma = '$id_turma' order by id asc ");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        for ($i=0; $i < count($res); $i++) { 
          foreach ($res[$i] as $key => $value) {
          }

         
          $id_modulo = $res[$i]['modulo'];
          $query2 = $pdo->query("SELECT * FROM modulos where id = '$id_modulo'");
          $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
          $nome_modulo = $res2[0]['nome'];

          ?>

         <?php if(@$_GET['frequencia'] != ""){ ?>
         
           <small><a href="index.php?pag=turma&funcao=frequencias&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&id_modulo=<?php echo $id_modulo ?>" name="btn-salvar-aula" class="text-secondary"><?php echo $i+1 .' - '. $nome_modulo ?></a></small><hr style="margin:1px">
         <?php } ?>

         <?php if(@$_GET['boletim'] != ""){ ?>
          <small><a href="../rel/boletim_modulo.php?id_turma=<?php echo $id_turma ?>&id_modulo=<?php echo $id_modulo ?>" target="_blank" title="Gerar Boletim" name="btn-salvar-aula" class="text-secondary"><?php echo $i+1 .' - '. $nome_modulo ?></a></small><hr style="margin:1px">
        <?php } ?>


        <?php if(@$_GET['chamada'] != ""){ ?>
          <small><a href="index.php?pag=turma&funcao=chamada&id=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&id_modulo=<?php echo $id_modulo ?>" name="btn-salvar-aula" class="text-secondary"><?php echo $i+1 .' - '. $nome_modulo ?></a></small><hr style="margin:1px">
        <?php } ?>


        <?php if(@$_GET['aula'] != ""){ ?>
          <small><a href="index.php?pag=turma&funcao=aulas&id=<?php echo $id_mat ?>&id_turma=<?php echo $id_turma ?>&id_periodo=<?php echo $id_periodo ?>&id_modulo=<?php echo $id_modulo ?>" name="btn-salvar-aula" class="text-secondary"><?php echo $i+1 .' - '. $nome_modulo ?></a></small><hr style="margin:1px">
        <?php } ?>



        <?php } ?>

      </div>

    </div>
  </div>
</div>



<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "periodos") {
  echo "<script>$('#modal-periodos').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "frequencias") {
  echo "<script>$('#modal-aulas').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "aulas") {
  echo "<script>$('#modal-aulas-grade').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "frequencias_modulos") {
  echo "<script>$('#modal-modulos').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "boletim_modulos") {
  echo "<script>$('#modal-modulos').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "aulas_modulos") {
  echo "<script>$('#modal-modulos').modal('show');</script>";
}

?>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
  $(document).ready(function(){
   listarDados();
   
 })
</script>


<script type="text/javascript">
  function listarDados(){
    var pag = "<?=$pag?>";
    var turma = "<?=$id_turma?>";
    var periodo = "<?=$id_per?>";
    var modulo = "<?=$id_mod?>";

    $.ajax({
     url: pag + "/listar-aulas.php",
     method: "post",
     data: {turma, periodo, modulo},
     dataType: "html",
     success: function(result){
      $('#listar-aulas').html(result)

    },


  })
  }
</script>