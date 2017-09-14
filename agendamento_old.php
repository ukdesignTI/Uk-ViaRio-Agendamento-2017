<?php
/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 05/06/17
 * Time: 3:12 PM
 */

define ('APP_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define ('APP_NAME', "Agendamento Lindeiros" );

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
    <!-- Bootstrap Full 4.0.0-alpha.6-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button,
        .bootstrap-iso form button:hover {
            color: #ffffff !important;
        }

        .asteriskField {
            color: red;
        }
    </style>
</head>

<body>
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
                                Concession&aacute;rio ViaRio S.A. | Transol&iacute;mpica
                            </p>
                        </div>
                        <form method="post" accept-charset="UTF-8">
                            <table class="table">
                                <caption>DISPONÍVEL PARA AGENDAMENTO</caption>
                                <thead>
                                    <tr>
                                        <th class="tg-031e">Jul/18</th>
                                        <th class="tg-031e">Jul/19</th>
                                        <th class="tg-031e">Jul/20</th>
                                        <th class="tg-031e">Jul/21</th>
                                        <th class="tg-031e">Jul/22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tg-031e">
                                            <div class="form-check"><input class="form-check-input" type="radio" name="hora" value="8:10" id="hora011">&nbsp;
                                                <label
                                                    for="hora011" class="form-check-label">8h10</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check"><input class="form-check-input" type="radio" name="hora" value="8:10" id="hora021">&nbsp;
                                                <label
                                                    for="hora021" class="form-check-label">8h10</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:10" id="hora031"
                                                    disabled="disabled">&nbsp;<label for="hora031" class="form-check-label">8h10</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check"><input type="radio" class="form-check-input" name="hora" value="8:10" id="hora041">&nbsp;
                                                <label
                                                    for="hora041" class="form-check-label">8h10</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:10" id="hora051"
                                                    disabled="disabled">&nbsp;<label for="hora051" class="form-check-label">8h10</label></div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="tg-031e">
                                            <div class="form-check"><input class="form-check-input" type="radio" name="hora" value="8:20" id="hora012">&nbsp;
                                                <label
                                                    for="hora012" class="form-check-label">8h20</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:20" id="hora022"
                                                    disabled="disabled">&nbsp;<label for="hora022" class="form-check-label">8h20</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:20" id="hora032"
                                                    disabled="disabled">&nbsp;<label for="hora032" class="form-check-label">8h20</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:20" id="hora042"
                                                    disabled="disabled">&nbsp;<label for="hora042" class="form-check-label">8h20</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:20" id="hora052"
                                                    disabled="disabled">&nbsp;<label for="hora052" class="form-check-label">8h20</label></div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="tg-031e">
                                            <div class="form-check"><input class="form-check-input" type="radio" name="hora" value="8:30" id="hora013">&nbsp;
                                                <label
                                                    for="hora013" class="form-check-label">8h30</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check"><input class="form-check-input" type="radio" name="hora" value="8:30" id="hora023">&nbsp;
                                                <label
                                                    for="hora023" class="form-check-label">8h30</label>
                                            </div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:30" id="hora033"
                                                    disabled="disabled">&nbsp;<label for="hora033" class="form-check-label">8h30</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:30" id="hora043"
                                                    disabled="disabled">&nbsp;<label for="hora043" class="form-check-label">8h30</label></div>
                                        </td>
                                        <td class="tg-031e">
                                            <div class="form-check disabled"><input class="form-check-input" type="radio" name="hora" value="8:30" id="hora053"
                                                    disabled="disabled">&nbsp;<label for="hora053" class="form-check-label">8h30</label></div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>