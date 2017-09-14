<!doctype html>  
<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <title>teste</title>  
  <meta name="description" content="The HTML5 Herald">  
  <meta name="author" content="SitePoint">  
  <link rel="stylesheet" href="css/styles.css?v=1.0"> 
  <style>
    .diaAgendamento {
    font-family: sans-serif;
    }
    .agendamento-hora {
    font-family: sans-serif;
    font-size: 12px;
    }
    .agendamento-hora * {
	    cursor: pointer;
    }
    .agendamento-selecao {
    margin-left: 0.3em;
    }
    .mes,
    .dia,
    .diaSemana {
        display: block;
    }
  </style> 
  <!--[if lt IE 9]>  
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
  <![endif]-->  
</head>  
<body>  
  <script src="js/scripts.js"></script>  


<?php
	
	date_default_timezone_set("America/Sao_Paulo");
	
    $mes=["", "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
    $diaDaSemana=[ "", "seg", "ter", "qua", "qui", "sex", "sáb", "dom"];
    $atendimento=[ "inicio"=>"08:00", "fim"=>"17:50","inicioDiaDaSemana"=>1, "fimDiaDaSemana"=>5];
    $feriados=["-", "2017-06-15", "2017-06-24", "2017-06-29", "2017-07-20", "2017-08-13", "2017-09-07", "2017-10-12", "2017-10-15", "2017-10-28", "2017-11-02", "2017-11-15", "2017-11-20", "2017-12-08", "2017-12-25", "2017-12-30", "2017-12-31" ];
    $almoco=[ "inicio"=>strtotime("12:00"), "fim"=> strtotime("13:10")];
    $dataInicial=date("Y-m-d",time())." ".$atendimento['inicio'];
    $df_dataInicial=date_create($dataInicial);
    $df_dataAtual=date_create($dataInicial);
    
    $intervalo_min=10;
    $dias_uteis=5;
    
    echo "<table class='table'>\n";
    echo "<thead>\n";
    $dia_contador=0;
    
    do
    {
        // É um dia útil (incluíndo sábado)?
        if(date_format($df_dataAtual, "N") < $atendimento["fimDiaDaSemana"]+1)
        {
            // Não é um feriado?
            if (!array_search(date_format($df_dataAtual,"Y-m-d"), $feriados))
            {
                //Inclui coluna no view
                echo "<th><div class='diaAgendamento'>";
                echo '<span class="mes">'.$mes[(int) date_format($df_dataAtual, "n")]."</span>";
                echo '<span class="dia">'.date_format($df_dataAtual, "d")."</span>";
                echo '<span class="diaSemana">'.$diaDaSemana[(int) date_format($df_dataAtual, "N")]."</span>";
                echo "</div></th>\n";
                // Só aumenta contador se for uma data válida
                // (garante que sempre terá o mesmo número de
                //  colunas quando esta função for executada.)
                $dia_contador++;
            }
        }
        // Pula para a Próxima Data
        $df_hoje=date_modify($df_dataAtual, "+24 hours");
    } while ($dia_contador < $dias_uteis);
    echo "</thead>\n";

    // Reseta data para o dia de hoje
    $df_dataAtual=date_create($dataInicial);

    // Vamos usar a hora agora para gerar o trecho
    // selecionável da tabela 
    $hora_ts=date_timestamp_get($df_dataAtual);
    $diaHora_id="";
    $col_contador=0; // contador coluna da tabela
    $row_contador=0; // contador linha da tabela

    // Iniciando o Markup do corpo da Tabela
    echo "<tbody>";

    do
    {

		$agora_ts=(int) strtotime(date_format($df_dataAtual,'H:i'));

		if ($agora_ts >= $almoco['inicio'] && $agora_ts <= $almoco['fim'])
		{
		    // Não exibir horários de almoço
		    echo "";
		} else {
		    // Prenchendo uma linha com horários iguais,
		    // usando as datas encontradas anteriormente
		    // no cabeçalho
		    echo "<tr>\n";
		    do
		    {
		        // É um dia útil (incluíndo sábado)?
                if(date_format($df_dataAtual, "N") < $atendimento["fimDiaDaSemana"]+1)
                {
                    // Não é um feriado?
                    if (!array_search(date_format($df_dataAtual,"Y-m-d"), $feriados))
                    {
                        $diaHora_id="AG_".date_format($df_dataAtual,"YmdHi");
                        echo "<td><div class='agendamento-hora'><input type='radio' id='$diaHora_id' name='agendamento' value='$diaHora_id'/><label class='agendamento-selecao' for='$diaHora_id'>".date_format($df_dataAtual, "H:i")."</label></div></td>\n";
                        // Só aumenta contador se for uma data válida
                        // (garante que sempre terá o mesmo número de
                        //  colunas quando esta função for executada.)
                        $col_contador++;
                    }
                }
		        $df_hoje=date_modify($df_dataAtual, "+24 hours");
		    } while ($col_contador < $dias_uteis);
		    echo "</tr>\n";
		    // Término do preenchimento das linhas com horários
		    // iguais. Agora seguimos para a próxima linha.
		    $proximo=(int) 24 * $dias_uteis;
		    $df_dataAtual=date_modify($df_dataAtual, "-".$proximo." hours");
		    $col_contador=0;
		}
	    // O ponteiro do relógio avançará de
	    // acordo com o intervalo dado
	    $df_dataAtual=date_modify($df_dataAtual, "+".$intervalo_min." min");
	    $row_contador++;
        
    } while ($row_contador < 60);
    
    echo "</table>\n";
    
?>

</body>  
</html>