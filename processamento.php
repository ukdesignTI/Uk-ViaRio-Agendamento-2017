<?php

/*
  Serviço que efetua o processamento de todo o app
 */

// Para começar, só funcionará se tiver essas duas variáveis setadas,
// senão retornará erro 400 (padrão);

if (isset($_GET['lid']) && isset($_GET['acao']))
{

    define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
    define('APP_NAME', "Agendamento Lindeiros");

    function __autoload($classname)
    {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . mb_strtolower($classname) . '.class.php';
    }

    $lid = filter_input(INPUT_GET, 'lid', FILTER_DEFAULT);
    $acao = filter_input(INPUT_GET, 'acao', FILTER_DEFAULT);



    $lindeiros = new Lindeiros();

    // Define as possíveis ações que este serviço fornecerá aos
    // seus clientes, e direciona para a ação certa

    $acoes_permitidas = ["cancelar", "marcacao", "remarcacao"];

    if (array_search($acao, $acoes_permitidas))
    {
        switch ($acao)
        {
            case $acoes_permitidas[0]:
                /* CANCELAMENTO DE UMA MARCAÇÃO
                 *
                 * Significa mudar o status da data para L de livre
                 * Só precisa da data e da hora para isso
                 * Se não tiver data e hora, retorna com erro;
                 * 
                 */
                if (!isset($_GET['marcacao']))
                {
                    //Erro;
                    exit(400);
                }

                // Obtém data e hora da query;
                $dataHora_df = date_create(filter_input(INPUT_GET, 'marcacao', FILTER_DEFAULT));
                $data = date_format($dataHora_df, "Y-m-d");
                $hora = date_format($dataHora_df, "H:i");

                // Efetua o Cancelamento (muda status da data/hora para L)
                // limpa placa e cpf tb;
                $ag = new Agendamento();
                $ag->setAId($lid);
                $ag->setAData($data);
                $ag->setAHora($hora);
                $ag->setACpf(null);
                $ag->setAPlaca(null);
                $ret = $ag->cancelarAgendamento();
                header("Location: http://www.ukdesign.com.br/viario/agendamento/msg.cancelado.php?&lid=$lid");
                break;
            case $acoes_permitidas[1]:
                if (!isset($_GET['marcacao']))
                {
                    //Erro;
                    exit(400);
                }

                // Obtém data e hora da query;
                $dataHora_df = date_create(filter_input(INPUT_GET, 'marcacao', FILTER_DEFAULT));
                $data = date_format($dataHora_df, "Y-m-d");
                $hora = date_format($dataHora_df, "H:i");

                // Efetua o Cancelamento (muda status da data/hora para L)
                // limpa placa e cpf tb;
                $ag = new Agendamento();
                $li = new Lindeiros();
                // Checa se já existe registro
                $li->find($lid);
                $ag->setAId($lid);
                $ag->setAData($data);
                $ag->setAHora($hora);
                $ag->setACpf($li->getLCpf());
                $ag->setAPlaca($li->getLPlaca());
                $ret = json_decode($ag->efetuarAgendamento());
                header("Location: http://www.ukdesign.com.br/viario/agendamento/msg.confirmado.php?&lid=$lid");
                break;
            default:
                $saida = '{ "ok": 200 }';
        }
    }
}
else
{
    exit(400);
}
