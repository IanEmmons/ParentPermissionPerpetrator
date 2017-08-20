<?php
declare(strict_types = 1);
require_once('DbStatement.php');

class DbResult
{
	private $stmt = null;
	private $result = null;

	function __construct(DbStatement $stmt, mysqli_result $result)
	{
		$this->stmt = $stmt;
		$this->result = $result;
	}

	function __destruct()
	{
		isset($this->result) ? $this->result->close() : null;
	}

	function fetchRow(): ?array
	{
		return $this->result->fetch_assoc();
	}
}
