<?php
/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 31/05/17
 * Time: 2:48 PM
 */

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');
ob_start('mb_output_handler');

define ("DB_HOST", "198.71.225.54");
define ("DB_NAME", "viario_geral");
define ("DB_USER", "viario");
define ("DB_PASS", "v1ar102016");

define ("TBL_AGENDA", "agendamento_teste");
define ("TBL_LINDEIROS", "passagem_gratuita");
$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;
define ("DSN",$dsn);


