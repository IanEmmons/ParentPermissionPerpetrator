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

function getSchoolListForStudentEntryForm(): ?array
{
	$schoolList = [];
	try
	{
		$conn = new DbConnection();
		$stmt = $conn->prepare('
select distinct s.id, s.name, d.headingInSchoolList
from Team tm
inner join School s on tm.schoolId = s.id
inner join Division d on tm.divisionId = d.id
left outer join Tournament tr on tm.tournamentId = tr.id
where tr.tournamentStatusId is null || tr.tournamentStatusId <> \'frozen\'
order by d.id, s.name');
		$result = $stmt->executeAndGetResult();
		while ($row = $result->fetchRow())
		{
			$schoolList[] = array($row["id"], $row["name"], $row["headingInSchoolList"]);
		}
		return $schoolList;
	}
	catch (Throwable $ex)
	{
		echo "<p>DB failure: " . $ex->getMessage() . "</p>";
		return null;
	}
}
