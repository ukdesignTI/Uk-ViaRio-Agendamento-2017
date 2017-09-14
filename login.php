<?php
/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 31/05/17
 * Time: 3:30 PM
 */
spl_autoload_register(function ($classname) {

    require_once APP_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . mb_strtolower($classname) . '.class.php';
});

$mensagem = "";
$lid = -1;
$acao = "erro";

// Só entrará em ação se formulário for chamado
if (isset($_GET['checagem']))
{
    $mensagem = "<p>Infelizmente o seu cadastro não foi encontrado.</p>";
    $mensagem .= "<p>Para realizar um agendamento, é necessário se cadastrar previamente no endereço:<p>";
    $mensagem .= "<p><a href=\"http://viario.com.br/viario-cadastramento-online.php\" target=\"_blank\">http://viario.com.br/viario-cadastramento-online.php</a></p>";
    $mensagem .= "<p>Caso você já tenha se cadastrado, aguarde o nosso contato.</p>";

    // Confere se a placa e se o CPF estao
    // cadastrados no DB

    $cliente = new Lindeiros();
    $cliente->setLCpf(trim(filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT)));
    $cliente->setLPlaca(trim(filter_input(INPUT_POST, 'placa', FILTER_DEFAULT)));
    echo "CPF:" . $cliente->getLCpf();
    echo "PLACA:" . $cliente->getLPlaca();
    $existeLindeiro = $cliente->checkExisteLindeiro();

    if ($existeLindeiro)
    {
        // Verifica se ja possui agendamento
        $acao = "agendamento";
        $mensagem = "Cliente cadastrado. Direcionando para tela de agendamento...";
        $lid = $existeLindeiro->id;
        $agendamento = new Agendamento();
        $agendamento->setACpf($cliente->getLCpf());
        $agendamento->setAPlaca($cliente->getLPlaca());
        $existeAgendamento = $agendamento->existeAgendamento();
        if ($existeAgendamento)
        {
            // Existe agendamento - ativa dialog box
            $mensagem = "Cliente cadastrado, agendado para o dia $existeAgendamento->data, as $existeAgendamento->hora horas. Deseja reagendar?";
            $acao = "reagendamento";
            $aid = $existeAgendamento->id;
        }
        else
        {
            // Nao existe agendamento - salta para a pagina de agendamentos
            header("Location: http://www.ukdesign.com.br/viario/agendamento/agendamento.php?lid=$lid&acao=$acao");
//            exit(0);
        }
    }
}
?><!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo APP_NAME ?></title>
        <!-- Bootstrap Full 4.0.0-alpha.6-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <!--Font Awesome (added because you use icons in your prepend/append)-->
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">

        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>
            .bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
                font-family: Arial, Helvetica, sans-serif;
                color: black
            }
            .bootstrap-iso form button, .bootstrap-iso form button:hover {
                color: #ffffff !important;
            }
            .asteriskField {
                color: red;
            }
            input:invalid {
                background-color: #ffefee!important;
            }
            header{
                /* 			background-image:url(imgs/estrada.jpg); */
                background-position:center;
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="scripts/jquery-migrate-3.0.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
    </head>
    <body>
        <section>

            <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
            <header>
                <div class="topblue">
                    <div id="logo"><img style="width:100%;" src="imgs/logo.png"></div>
                </div><!-- topblue -->

                <div class="lineblue">
                    &nbsp;
                </div><!-- lineblue -->
            </header>
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
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="placa">
                                        PLACA
                                        <span class="asteriskField">
                                            *
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="placa" name="placa" type="text" value="KYZ1115" />
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk">
                                            </i>
                                        </div>
                                    </div>
                                    <span class="help-block" id="hint_cpf">
                                        Insira sua placa sem separadores, conforme documento do veículo.
                                    </span>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="cpf">
                                        CPF
                                        <span class="asteriskField">
                                            *
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="cpf" name="cpf" type="text" value="73313459749" pattern="[0-9]{11}"/>
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk">
                                            </i>
                                        </div>
                                    </div>
                                    <span class="help-block" id="hint_cpf">
                                        Insira seu CPF conforme documento original (somente números).
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input type="hidden" name="checagem" value="lindeiros">
                                        <button class="btn btn-info btn-lg btn-block" name="submit" type="submit">
                                            CONFERIR
                                        </button>
                                    </div>
                                </div>
                            </form>
<?php if ($acao != "reagendamento")
{ ?>
                                <div class="alert alert-warning"><?php echo sprintf('%s', $mensagem); ?></div>
<?php }
else
{ ?>
                                <script>
                                    $.confirm({
                                        columnClass: 'large',
                                        title: 'AVISO',
                                        content: '<?php echo sprintf('%s', $mensagem); ?>',
                                        buttons: {
                                            voltar: {
                                                text: 'Voltar',
                                                action: function () {
                                                    // fazendo nada desfaz o popup
                                                }
                                            },
                                            cancelar: {
                                                text: 'Cancela Agendamento',
                                                btnClass: 'btn-red',
                                                action: function () {
                                                    $.confirm({
                                                        columnClass: 'large',
                                                        title: 'Deseja mesmo cancelar seu agendamento?',
                                                        content: '<p>Outras pessoas poderão marcar nessa mesma data/horário caso aceite.</p>',
                                                        buttons: {
                                                            abort: {
                                                                text: "DESISTIR DE CANCELAR",
                                                                action: function () {
                                                                }
                                                            },
                                                            ok: {
                                                                text: "CANCELAR MARCAÇÃO",
                                                                btnClass: "btn-red",
                                                                action: function () {
                                                                    window.location.href = "http://www.ukdesign.com.br/viario/agendamento/processamento.php?lid=<?php echo $lid; ?>&aid=<?php echo $aid; ?>&acao=cancelamento";
                                                                }
                                                            }
                                                        }
                                                    });
                                                }
                                            },
                                            reagendar: {
                                                text: 'Reagendar',
                                                btnClass: 'btn-blue',
                                                keys: ['enter', 'shift'],
                                                action: function () {
                                                    window.location.href = "http://www.ukdesign.com.br/viario/agendamento/agendamento.php?lid=<?php echo $lid; ?>&aid=<?php echo $aid; ?>&acao=<?php echo $acao; ?>&marcacao=<?php echo $marcacao; ?>";
                                                }
                                            }
                                        }
                                    });
                                </script>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </body>
</html>
