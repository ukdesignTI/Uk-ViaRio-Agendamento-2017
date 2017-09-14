<?php
/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 05/06/17
 * Time: 3:12 PM
 */

define ('APP_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define ('APP_NAME', "Agendamento Lindeiros" );

if(!isset($_GET['lid'] ) || filter_input(INPUT_GET, 'lid', FILTER_DEFAULT ) < 0 )
{
    die("não.");
}

$lid= filter_input(INPUT_GET, 'lid', FILTER_DEFAULT );
$acao=filter_input(INPUT_GET,'acao', FILTER_DEFAULT );

date_default_timezone_set("America/Sao_Paulo");

function __autoload($classname)
{

	require_once APP_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . mb_strtolower($classname) . '.class.php';
}
?><!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marcação |
        <?php echo APP_NAME ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>
        .asteriskField {
            color: red;
        }
        .diaAgendamento {
            font-family: sans-serif;
        }
        .agendamento-hora {
            font-family: sans-serif;
            font-size: 12px;
            text-align: center;
            padding-top: 0.5em;
            padding-bottom: 0em;
        }
        .agendamento-hora * {
            cursor: pointer;
        }
        .agendamento-selecao {
            margin-left: 0.3em;
            line-height: 1;
            margin: 0 0 0 0.5em;
        }
        table td {
            padding: 0.20rem!important;
        }
        .mes,
        .dia,
        .diaSemana {
            display: block;
            font-weight: 400;
            text-align: center;
            text-transform: uppercase;
        }
        .mes,
        .diaSemana {
            background-color: #000;
            color: #fff;
            height: 2em;
            line-height: 2em;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .dia {
            font-size: 33px;
        }
        table tr.am {
            display: table-row;
        }
        table tr.pm {
            display: none;
        }
        .agendamento-hora.slash * {
        color: #ccc;
        cursor: not-allowed;
        text-decoration: line-through;
        }
        .btn {
            cursor: pointer;
        }
        header{
    /* 			background-image:url(imgs/estrada.jpg); */
                background-position:center;
                margin-bottom: 1em;
        }
        header div.topblue{
            width:100%;
            background-color:#196499;
            overflow:hidden;
        }
        div#logo{
            margin:40px 0 40px 110px;
            float:left;
        }
        header div.lineblue{
            width:100%;
            background-color:#25aae1;
            height:30px;
        }
    </style>

</head>

<body>
	<header>
		<div class="topblue">
			<div id="logo"><img style="width:100%;" src="imgs/logo.png"></div>
		</div><!-- topblue -->

		<div class="lineblue">
			&nbsp;
		</div><!-- lineblue -->
	</header>
    <section>
        <div class="bootstrap-iso">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="formden_header">
                            <h2 class="text-center">
                                Agendamento Lindeiros
                            </h2>
                            <p class="text-center">
                                Concession&aacute;ria ViaRio S.A. | Transol&iacute;mpica
                            </p>
                        </div>
                        <form method="post" accept-charset="UTF-8">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">Selecione um horário disponível da lista abaixo:</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-primary btn-outline-primary" id="btn-manha" type="button">MANHÃ</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-block btn-primary" id="btn-tarde" type="button">TARDE</button>
                            </div>
                        </div>

<?php
                            $tabelaAgendamento = new viewAgendamento();
                            $tabelaAgendamento->createSchedulingTable();
?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="scripts/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
    <script>
        var cels_manha = $('.am');
        var cels_tarde = $('.pm');
        var bt_manha = $('#btn-manha');
        var bt_tarde = $('#btn-tarde');
        var datasHoras = $('[id^="AG_"]');
        bt_manha.on('click', function (event) {
            event.preventDefault();
            // Muda a aparência do botão
            bt_manha.addClass('btn-outline-primary');
            bt_tarde.removeClass('btn-outline-primary');
            // Mostra horários matutinos, escondendo os vespertinos
            if (cels_manha.css('display')=='none') {
                cels_manha.css('display','table-row');
                cels_tarde.css('display',"none");

            }
        });
        bt_tarde.on('click', function (event) {
            event.preventDefault();
            // Muda a aparência do botão
            bt_manha.removeClass('btn-outline-primary');
            bt_tarde.addClass('btn-outline-primary');
            // Mostra horários vespertinos, escondendo os matutinos
            if (cels_tarde.css('display')=='none') {
                cels_tarde.css('display','table-row');
                cels_manha.css('display',"none");
            }
        });
        // Prepara os radiobuttons para exibição de modais
        datasHoras.on('click', function() {
            ag=$('input[name=agendamento]:checked').val();
            console.log(ag);
            agen= new Array;
            agen['ano'] = ag.slice(3,7);
            agen['mes'] = ag.slice(7,9);
            agen['dia'] = ag.slice(9,11);
            agen['hora'] = ag.slice(11,13);
            agen['min'] = ag.slice(13,15);
            console.log(agen);
            ag_show=agen['dia']+"-"+agen['mes']+'-'+agen['ano']+", as "+agen['hora']+":"+agen['min'];
            ag_xprt=agen['ano']+"/"+agen['mes']+'/'+agen['dia']+" "+agen['hora']+":"+agen['min'];
            console.log(ag_xprt);
            $.confirm({
                title: '',
                content: '<p>Você escolheu a data e hora a seguir:</p><p><strong>Dia '+ag_show+'.</strong></p><p>Confirma essa marcação?</p>',
                buttons: {
                    cancel: {
                        text: 'Voltar',
                        action: function() {
                            // Voltar
                        }
                    },
                    confirm: {
                        text: 'Confirmado',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function() {
                            window.location.href="http://www.ukdesign.com.br/viario/agendamento/processamento.php?lid=<?php echo $lid; ?>&acao=<?php echo $acao;?>&agendamento=".ag_xprt;
                        }
                    }
                }
            });
        });

    </script>
</body>

</html>
