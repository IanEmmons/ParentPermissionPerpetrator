<?php
declare(strict_types = 1);
require_once('DbConnection.php');
require_once('DbStatement.php');
require_once('DbResult.php');

function getRefData(string $tableName): ?array
{
	$refData = [];
	$conn = new DbConnection();
	$stmt = $conn->prepare("select distinct id, name from " . $tableName . " order by id");
	$result = $stmt->executeAndGetResult();
	while ($row = $result->fetchRow())
	{
		$refData[$row["id"]] = $row["name"];
	}
	return $refData;
}

function getSchoolListForStudentEntryForm(): ?array
{
	$schoolList = [];
	$conn = new DbConnection();
	$stmt = $conn->prepare('
select distinct s.id, s.name, d.headingInSchoolList,
group_concat(distinct tr.tournamentStatusId separator \'|\') as tournamentStatus
from Team tm
inner join School s on tm.schoolId = s.id
inner join Division d on tm.divisionId = d.id
left outer join Tournament tr on tm.tournamentId = tr.id
group by s.id, s.name, d.headingInSchoolList
order by d.id, s.name');
	$result = $stmt->executeAndGetResult();
	while ($row = $result->fetchRow())
	{
		// If tournament status is null or contains a value that is not 'frozen',
		// then the school is not disabled:
		$tournamentStatusList = $row["tournamentStatus"];
		$isDisabled = FALSE;
		if ($tournamentStatusList != null && $tournamentStatusList === 'frozen')
		{
			$isDisabled = TRUE;
		}
		$schoolList[] = array($row["id"], $row["name"], $row["headingInSchoolList"],
			$isDisabled);
	}
	return $schoolList;
}
