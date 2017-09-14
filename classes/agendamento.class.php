<?php

/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 31/05/17
 * Time: 2:32 PM
 * 
 * @author Emerson Alencar Junior <emersonajr.ukdesign@gmail.com>
 * 
 */
class Agendamento extends Crud
{
    protected $table = TBL_AGENDA;
		private $a_id;
    private $a_data;
    private $a_hora;
    private $a_cpf;
    private $a_placa;
    private $a_status;
    private $a_criado_em;
    private $a_alterado_em;

	/**
         * 
	 * @return mixed
	 */
	public function getAId()
	{
		return $this->a_id;
	}

	/**
	 * @param mixed $a_id
	 *
	 * @return agendamento
	 */
	public function setAId($a_id)
	{
		$this->a_id = $a_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAData()
	{
		return $this->a_data;
	}

	/**
	 * @param mixed $a_data
	 *
	 * @return agendamento
	 */
	public function setAData($a_data)
	{
		$this->a_data = $a_data;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAHora()
	{
		return $this->a_hora;
	}

	/**
	 * @param mixed $a_hora
	 *
	 * @return agendamento
	 */
	public function setAHora($a_hora)
	{
		$this->a_hora = $a_hora;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getACpf()
	{
		return $this->a_cpf;
	}

	/**
	 * @param mixed $a_cpf
	 *
	 * @return agendamento
	 */
	public function setACpf($a_cpf)
	{
		$this->a_cpf = $a_cpf;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAPlaca()
	{
		return $this->a_placa;
	}

	/**
	 * @param mixed $a_placa
	 *
	 * @return agendamento
	 */
	public function setAPlaca($a_placa)
	{
		$this->a_placa = $a_placa;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAStatus()
	{
		return $this->a_status;
	}

	/**
	 * @param mixed $a_status
	 *
	 * @return agendamento
	 */
	public function setAStatus($a_status)
	{
		$this->a_status = $a_status;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getACriadoEm()
	{
		return $this->a_criado_em;
	}

	/**
	 * @param mixed $a_criado_em
	 *
	 * @return agendamento
	 */
	public function setACriadoEm($a_criado_em)
	{
		$this->a_criado_em = $a_criado_em;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAAlteradoEm()
	{
		return $this->a_alterado_em;
	}

	/**
	 * @param mixed $a_alterado_em
	 *
	 * @return agendamento
	 */
	public function setAAlteradoEm($a_alterado_em)
	{
		$this->a_alterado_em = $a_alterado_em;
		return $this;
	}

	/**
	 * @return array or false
	 */
	public function existeAgendamento()
	{
		$sql="SELECT * FROM agendamento_teste WHERE cpf = :cpf AND placa = :placa AND status = 'A'";
		$stmt=DB::prepare($sql);
		$stmt->bindParam('cpf',$this->a_cpf, PDO::PARAM_STR);
		$stmt->bindParam('placa',$this->a_placa, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}

	/**
	 * @return array or false
	 */
	public function marcacaoLivre()
	{
		$sql="SELECT * FROM agendamento_teste WHERE data = :data AND hora = :hora AND status = 'L'";
		$stmt=DB::prepare($sql);
		$stmt->bindParam('data', $this->a_data, PDO::PARAM_STR);
		$stmt->bindParam('hora', $this->a_hora, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt;
	}

	public function insert()
	{
		// TODO: Check insert method
		$sql = "REPLACE INTO $this->table (id, data, hora, cpf, placa, status, criado_em, alterado_em) VALUES (:id, :data, :hora, :cpf, :placa, :status, :criado_em, :alterado_em)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('id',$this->a_id, PDO::PARAM_INT);
		$stmt->bindParam('data',$this->a_data, PDO::PARAM_STR);
		$stmt->bindParam('hora',$this->a_hora, PDO::PARAM_STR);
		$stmt->bindParam('cpf',$this->a_cpf, PDO::PARAM_STR);
		$stmt->bindParam('placa',$this->a_placa, PDO::PARAM_STR);
		$stmt->bindParam('status',$this->a_status, PDO::PARAM_STR);
		$stmt->bindParam('criado_em', "NOW()");
		$stmt->bindParam('alterado_em',strtotime (date ("Y-m-d H:i:s")), PDO::PARAM_STR);
		return $stmt->execute();
	}

	public function update($id)
	{
		// TODO: Check update method
		$sql = "SELECT * FROM agendamento_teste WHERE data = :data AND hora = :hora FOR UPDATE
						UPDATE INTO $this->table SET nome = :nome, data = :data, hora = :hora, cpf = :cpf, placa = :placa, status = :status, alterado_em = :alterado_em";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('id',$this->a_id, PDO::PARAM_INT);
		$stmt->bindParam('data',$this->a_data, PDO::PARAM_STR);
		$stmt->bindParam('hora',$this->a_hora, PDO::PARAM_STR);
		$stmt->bindParam('cpf',$this->a_cpf, PDO::PARAM_STR);
		$stmt->bindParam('placa',$this->a_placa, PDO::PARAM_STR);
		$stmt->bindParam('status',$this->a_status, PDO::PARAM_STR);
		$stmt->bindParam('alterado_em',strtotime (date ("Y-m-d H:i:s")), PDO::PARAM_STR);
		return $stmt->execute();
	}

	public function efetuarAgendamento()
	{
		// Tenta efetuar um update com trava na marcação,
		// para evitar o problema dos dois usuários
		//
			$this->a_status="A";
		try {
			$ret = $this->insert();
		} catch (PDOException $exception) {
			// Em caso de erro, retorna dados do erro
		  $ret = [
							'errcode' => $exception->getCode(),
							'errmsg' => $exception->getCode()
						];
		}
		return $ret;
	}
	public function cancelarAgendamento()
	{
		$this->a_status="L";
		try {
			$this->insert();
		}
		catch (PDOException $exception) {
			// Em caso de erro, retorna dados do erro
		  $ret = [
							'errcode' => $exception->getCode(),
							'errmsg' => $exception->getCode()
						];
		}
		return $ret;
	}

}
