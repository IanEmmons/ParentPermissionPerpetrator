<?php
declare(strict_types = 1);
require_once('DbStatement.php');

class DbConnection
{
	private $serverName = "localhost";
	private $userName = "root";
	private $password = "root";
	private $dbName = "ScienceOlympiadRosterTracker";
	private $port = 8889;
	private $conn = null;

	function __construct()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$this->conn = new mysqli('p:' . $this->serverName, $this->userName,
			$this->password, $this->dbName, $this->port);
	}

	function __destruct()
	{
		isset($this->conn) ? $this->conn->close() : null;
	}

	function prepare(string $queryStr): DbStatement
	{
		return new DbStatement($this, $this->conn->prepare($queryStr));
	}
}
