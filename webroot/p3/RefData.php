<?php
declare(strict_types = 1);
require_once('DbConnection.php');
require_once('DbStatement.php');
require_once('DbResult.php');

function getRefData(string $tableName): ?array
{
	$refData = [];
	try
	{
		$conn = new DbConnection();
		$stmt = $conn->prepare("select id, name from " . $tableName . " order by id");
		$result = $stmt->executeAndGetResult();
		while ($row = $result->fetchRow())
		{
			$refData[$row["id"]] = $row["name"];
		}
		return $refData;
	}
	catch (Throwable $ex)
	{
		echo "<p>DB failure: " . $ex->getMessage() . "</p>";
		return null;
	}
}
