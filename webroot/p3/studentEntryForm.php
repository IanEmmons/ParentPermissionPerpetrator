<?php
declare(strict_types=1);
require_once 'RefData.php';
require_once 'FormFieldGenerator.php';
require_once 'util.php';
require_once 'constants.php';

const FIELDS_FROM_PAGE_2 = array('legalGuardian',
	'consentToParticipate',
	'parentPledge',
	'studentPledge',
	'mediaRelease');

try
{
	//session_start();
	//restoreForwardedPostFields();

	$gen = new FormFieldGenerator();
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Coaches and school officials are welcome to contact us with questions."/>
	<meta name="keywords" content="VASO,Virginia Science Olympiad,Science Olympiad,Virginia,va,science,competition,tournaments"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<title>Parent/Guardian Permissions | Virginia Science Olympiad</title>

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="p3.css" media="all"/>
	<?php @include("includes/head.html") ?>
	<?php @include("includes/google_analytics.html") ?>
</head>

<body>
	<h1>Parent/Guardian Permissions</h1>
	<h2>Virginia Science Olympiad (VASO)</h2>
	<h2>2017-2018 School Year</h2>

	<p>For students to participate as part of their school Science Olympiad team, their
		parent/legal guardian must fill out this form (which includes the waivers online).
		If this signup is not completed, the student will not be allowed to compete on
		tournament day.</p>

	<p>Unless a student is 18 years of age, this form must be completed by the
		parent/legal guardian; it is not valid if completed by the student.</p>

	<p>IMPORTANT NOTE: Completion of this form does not guarantee that the student will
		compete on the school team; actual competitors are chosen by the coach of the
		school team.  Contact your coach with questions.</p>

<?php dumpPostFields(); ?>

	<p><span class="required">* Response required</span></p>

	<form method="post" action="studentEntryForm2.php">
		<fieldset>
			<!-- <legend>Student Entry</legend> -->
<?php
$gen->generateHiddenFields(FIELDS_FROM_PAGE_2);
$gen->generateTextField('parentName', true,
	'Full Name of Person signing up Student',
	'Unless the student is 18, this person must be the parent/legal guardian of the student.',
	'Enter full name',
	null);
$gen->generateEmailField('parentEmail', true,
	'Email of Person signing up the Student',
	'',
	'',
	null);
$gen->generateTextField('legalFirstName', true,
	'Student\'s Legal First Name',
	'You may only sign up one student at a time. Please complete a new signup for each student.',
	'Enter student\'s legal first name',
	null);
$gen->generateTextField('nickName', false,
	'Student\'s Nickname',
	'Only if different from the student\'s first name.',
	'Enter student\'s nickname, if applicable',
	null);
$gen->generateTextField('legalLastName', true,
	'Student\'s Legal Last Name',
	'',
	'Enter student\'s legal last name',
	null);
$gen->generateSchoolListField('school', true, 2, 'Student\'s School',
	'It is <i>vital</i> that you record your student\'s school correctly.  Otherwise '
	. 'your student will not appear on the school roster.  If your student\'s school '
	. 'is not on the list, then the coach probably has not registered the school with '
	. 'VASO yet.  If your student\'s school is disabled, then student sign-ups are '
	. 'not allowed at this time.',
	null, getSchoolListForStudentEntryForm());
$gen->generateRadioBtnField('grade', true, 2, 'Student\'s Grade', '', null,
	STUDENT_GRADE_RADIO_BTN_VALUES);
$gen->generateRadioBtnField('gender', true, 1, 'Student\'s Gender', '', null,
	getRefData('GenderIdentity'));
$gen->generateEmailField('studentEmail', false,
	'Student\'s Email',
	'Optional &mdash; we will only use it to send emergency communications regarding '
	. 'tournaments.  It will be discarded after the tournament season.',
	'', null);
$gen->generateRadioBtnField('ethnicity', true, 2, 'Student\'s Ethnicity',
	'Optional, but please consider helping us as we work on educational grants and '
	. 'with various agencies.',
	null, getRefData('Ethnicity'));
$gen->generateRadioBtnField('numYearsParticipating', true, 2,
	'How many years has the student been participating in Science Olympiad?',
	'Include this year, include all divisions.',
	null, NUM_YEARS_RADIO_BTN_VALUES);
?>
			<div><input type="submit" name="btnContinue" value="Continue »"/></div>
		</fieldset>
	</form>
</body>

</html>
<?php
}
catch (Throwable $ex)
{
	printf('<p>Exception at %1$s, line %2$d: %3$s</p>' . PHP_EOL, $ex->getFile(),
		$ex->getLine(), $ex->getMessage());
}
