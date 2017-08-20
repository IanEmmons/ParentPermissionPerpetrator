drop database ParentPermissionPerpetrator; create database ScienceOlympiadRosterTracker;




select distinct s.id, s.name, d.headingInSchoolList,
group_concat(distinct tr.tournamentStatusId separator '|') as tournamentStatus
from Team tm
inner join School s on tm.schoolId = s.id
inner join Division d on tm.divisionId = d.id
left outer join Tournament tr on tm.tournamentId = tr.id
group by s.id, s.name, d.headingInSchoolList
order by d.id, s.name




select distinct id from <table-name>






insert into StudentEntry (
	ethnicityId, legalFirstName, legalLastName,
	nickName, genderIdentityId, legalGuardianStatusId,
	schoolId, grade, hasMadeParentPledge,
	hasMadeStudentPledge, hasMediaRelease, hasPermissionToParticipate,
	numYearsOfSOParticipation, parentEmail, parentName,
	studentEmail
) values (
	null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null
);
