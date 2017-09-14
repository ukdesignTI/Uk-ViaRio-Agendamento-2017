<?php

/**
 * Created by PhpStorm.
 * User: emerson alencar junior
 * Date: 31/05/17
 * Time: 4:03 PM
 */
class Lindeiros extends Crud
{
	protected $table = TBL_LINDEIROS;
	private   $l_id;
	private   $l_placa;
	private   $l_cpf;
	private   $l_cep;

	/**
	 * @return mixed
	 */
	public function getLId()
	{
		return $this->l_id;
	}

	/**
	 * @param mixed $l_id
	 *
	 * @return lindeiros
	 */
	public function setLId($l_id)
	{
		$this->l_id = $l_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLPlaca()
	{
		return $this->l_placa;
	}

	/**
	 * @param mixed $l_placa
	 *
	 * @return lindeiros
	 */
	public function setLPlaca($l_placa)
	{
		$this->l_placa = $l_placa;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLCpf()
	{
		return $this->l_cpf;
	}

	/**
	 * @param mixed $l_cpf
	 *
	 * @return lindeiros
	 */
	public function setLCpf($l_cpf)
	{
		$this->l_cpf = $l_cpf;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLCep()
	{
		return $this->l_cep;
	}

	/**
	 * @param mixed $l_cpf
	 *
	 * @return lindeiros
	 */
	public function setLCep($l_cep)
	{
		$this->l_cep = $l_cep;
		return $this;
	}

	/**
	 * @return mixed
	 */
	
	public function checkExisteLindeiro()
	{
		$sql  = "SELECT id, proprietario, cpf, placa, cep FROM $this->table WHERE cpf = :cpf AND placa = :placa";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('cpf', $this->l_cpf, PDO::PARAM_STR);
		$stmt->bindParam('placa', $this->l_placa, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();	
	}
	
	/**
	 * @return mixed
	 */

	public function checkAreaDeCadastramento()
	{
		$sql  = "SELECT ac_id, ac_cep, ac_logradouro FROM area_de_cadastramento WHERE ac_cep = :cep";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('cep', $this->l_cep, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}
	/**
	 *
	 */
	public function insert()
	{
		exit(500);
		// TODO: insert() não disponível nesta classe. Não implementar!
	}

	/**
	 * @param $id
	 */
	public function update($id)
	{
		exit(500);
		// TODO: update() não disponível nesta classe. Não implementar!
	}

}