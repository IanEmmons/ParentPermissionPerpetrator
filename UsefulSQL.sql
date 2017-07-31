drop database ParentPermissionPerpetrator

create database ParentPermissionPerpetrator

INSERT INTO `ParentPermissionPerpetrator`.`Division` (`id`, `name`, `headingInSchoolList`) VALUES ('divB', 'Division B', 'Elementary, Middle, and Junior High Schools (Division B):');
INSERT INTO `ParentPermissionPerpetrator`.`Division` (`id`, `name`, `headingInSchoolList`) VALUES ('divC', 'Division C', 'High Schools (Division C):');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('amerNative', 'American Indian or Alaskan Native');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('asian', 'Asian');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('pacIslander', 'Pacific Islander');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('white', 'White');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('hispanic', 'Hispanic or Latino');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('black', 'Black or African American');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('zOther', 'Other');
INSERT INTO `ParentPermissionPerpetrator`.`Ethnicity` (`id`, `name`) VALUES ('zzNoAnswer', 'Decline to Participate');
INSERT INTO `ParentPermissionPerpetrator`.`GenderIdentity` (`id`, `name`) VALUES ('female', 'Female');
INSERT INTO `ParentPermissionPerpetrator`.`GenderIdentity` (`id`, `name`) VALUES ('male', 'Male');
INSERT INTO `ParentPermissionPerpetrator`.`GenderIdentity` (`id`, `name`) VALUES ('zzNoAnswer', 'Decline to Participate');
INSERT INTO `ParentPermissionPerpetrator`.`LegalGuardianStatus` (`id`, `name`) VALUES ('guardian', 'I am the legal guardian of the competitor, and thus legally authorized to give these permissions.');
INSERT INTO `ParentPermissionPerpetrator`.`LegalGuardianStatus` (`id`, `name`) VALUES ('self', 'I am 18 years of age, and thus legally authorized to give these permissions for myself.');
INSERT INTO `ParentPermissionPerpetrator`.`LegalGuardianStatus` (`id`, `name`) VALUES ('zNotAuthorized', 'Neither of the above &mdash; please refer this to the appropriate person.  Registration will not be accepted otherwise.');
INSERT INTO `ParentPermissionPerpetrator`.`StudentEntryDisposition` (`id`, `name`, `userAccountTypeId`) VALUES ('coachDup', 'Duplicate student entry', '1');
INSERT INTO `ParentPermissionPerpetrator`.`StudentEntryDisposition` (`id`, `name`, `userAccountTypeId`) VALUES ('adminDup', 'Duplicate student entry (verified)', '0');
INSERT INTO `ParentPermissionPerpetrator`.`StudentEntryDisposition` (`id`, `name`, `userAccountTypeId`) VALUES ('coachBadEntry', 'Improperly completed student entry', '1');
INSERT INTO `ParentPermissionPerpetrator`.`StudentEntryDisposition` (`id`, `name`, `userAccountTypeId`) VALUES ('adminBadEntry', 'Improperly completed student entry (verified)', '0');
INSERT INTO `ParentPermissionPerpetrator`.`StudentEntryDisposition` (`id`, `name`, `userAccountTypeId`) VALUES ('coachNotMySchool', 'This student entry is not for my school', '1');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentStatus` (`id`, `name`) VALUES ('frozen', 'Frozen to all changes');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentStatus` (`id`, `name`) VALUES ('frozenToCoachesNotParents', 'Frozen to coaches but not parents');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentStatus` (`id`, `name`) VALUES ('teamNamesFrozen', 'Frozen to team name changes');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentStatus` (`id`, `name`) VALUES ('open', 'Open to all changes');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentType` (`id`, `name`) VALUES ('regional', 'Regional');
INSERT INTO `ParentPermissionPerpetrator`.`TournamentType` (`id`, `name`) VALUES ('state', 'State');
INSERT INTO `ParentPermissionPerpetrator`.`UserAccountType` (`id`, `name`) VALUES ('admin', 'Admin');
INSERT INTO `ParentPermissionPerpetrator`.`UserAccountType` (`id`, `name`) VALUES ('coach', 'Coach');
