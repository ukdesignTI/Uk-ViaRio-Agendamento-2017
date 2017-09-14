<?php

/**
 * Created by PhpStorm.
 * User: emersonalencarjunior
 * Date: 28/05/17
 * Time: 23:10
 */
class agenda
{
	public $kag_id;
	public $cliente;
	public $data_e_hora;
	public $criado_em;
	public $update_em;

	/**
	 * agenda.class constructor.
	 *
	 * @param $kag_id
	 * @param $cliente
	 * @param $data_e_hora
	 * @param $criado_em
	 * @param $update_em
	 */
	public function __construct($kag_id, $cliente, $data_e_hora, $criado_em, $update_em)
	{
		$this->kag_id      = $kag_id;
		$this->cliente     = $cliente;
		$this->data_e_hora = $data_e_hora;
		$this->criado_em   = $criado_em;
		$this->update_em   = $update_em;
	}

	/**
	 * @return mixed
	 */
	public function getKagId()
	{
		return $this->kag_id;
	}

	/**
	 * @param mixed $kag_id
	 *
	 * @return class
	 */
	public function setKagId($kag_id)
	{
		$this->kag_id = $kag_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCliente()
	{
		return $this->cliente;
	}

	/**
	 * @param mixed $cliente
	 *
	 * @return class
	 */
	public function setCliente($cliente)
	{
		$this->cliente = $cliente;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDataEHora()
	{
		return $this->data_e_hora;
	}

	/**
	 * @param mixed $data_e_hora
	 *
	 * @return class
	 */
	public function setDataEHora($data_e_hora)
	{
		$this->data_e_hora = $data_e_hora;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCriadoEm()
	{
		return $this->criado_em;
	}

	/**
	 * @param mixed $criado_em
	 *
	 * @return class
	 */
	public function setCriadoEm($criado_em)
	{
		$this->criado_em = $criado_em;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUpdateEm()
	{
		return $this->update_em;
	}

	/**
	 * @param mixed $update_em
	 *
	 * @return class
	 */
	public function setUpdateEm($update_em)
	{
		$this->update_em = $update_em;
		return $this;
	}


}