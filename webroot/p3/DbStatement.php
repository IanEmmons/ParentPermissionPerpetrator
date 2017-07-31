<?php
declare(strict_types = 1);
require_once('DbConnection.php');
require_once('DbResult.php');

class DbStatement
{
	private $conn = null;
	private $stmt = null;

	function __construct(DbConnection $conn, mysqli_stmt $stmt)
	{
		$this->conn = $conn;
		$this->stmt = $stmt;
	}

	function __destruct()
	{
		isset($this->stmt) ? $this->stmt->close() : null;
	}

	function executeAndGetResult(): DbResult
	{
		$this->execute();
		return new DbResult($this, $this->stmt->get_result());
	}

	function execute(): bool
	{
		return $this->stmt->execute();
	}
}
