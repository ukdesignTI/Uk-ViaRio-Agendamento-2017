<?php

/**
 * Created by PhpStorm.
 * User: emersonalencarjunior
 * Date: 01/06/17
 * Time: 13:39
 */

require_once APP_PATH . 'classes' . DIRECTORY_SEPARATOR . 'DB.class.php';

abstract class Crud extends DB
{
	protected $table;

	abstract public function insert();

	abstract public function update($id);

	public function find($id)
	{
		$sql  = "SELECT * FROM $this->table WHERE $id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('id', PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fecht();

	}

	public function findAll()
	{
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();

	}
}