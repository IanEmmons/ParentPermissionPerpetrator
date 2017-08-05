drop database ParentPermissionPerpetrator; create database ParentPermissionPerpetrator;




select distinct s.id, s.name, d.headingInSchoolList
from Team tm
inner join School s on tm.schoolId = s.id
inner join Division d on tm.divisionId = d.id
left outer join Tournament tr on tm.tournamentId = tr.id
where tr.tournamentStatusId is null || tr.tournamentStatusId <> 'frozen'
order by d.id, s.name
