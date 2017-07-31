<?php
declare(strict_types=1);
require_once('RefData.php');
require_once('FormFieldGenerator.php');

try
{
	$gen = new FormFieldGenerator();
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Coaches and school officials are welcome to contact us with questions."/>
	<meta name="keywords" content="VASO,Virginia Science Olympiad,Science Olympiad,Virginia,va,science,competition,tournaments,events,regional,state,stem,technology,engineering,mathematics,team,contact,contact us,get in touch"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<title>Parent/Guardian Permissions | Virginia Science Olympiad</title>

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="p3.css" media="all"/>
	<?php @include("includes/head.html") ?>
	<?php @include("includes/google_analytics.html") ?>
	<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#commentform").validate();
		});
	</script>
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

	<p><span class="required">* Response required</span></p>

	<form method="post" action="">
		<fieldset>
			<!-- <legend>Student Entry</legend> -->
<?php
$gen->generateTextField('parentName', TRUE,
	'Full Name of Person signing up Student',
	'Unless the student is 18, this person must be the parent/legal guardian of the student.',
	'Enter full name',
	'');
$gen->generateEmailField('parentEmail', TRUE,
	'Email of Person signing up the Student',
	'',
	'',
	'');
$gen->generateTextField('legalFirstName', TRUE,
	'Student\'s Legal First Name',
	'You may only sign up one student at a time. Please complete a new signup for each student.',
	'Enter student\'s legal first name',
	'');
$gen->generateTextField('nickName', FALSE,
	'Student\'s Nickname',
	'Only if different from the student\'s first name.',
	'Enter student\'s nickname, if applicable',
	'');
$gen->generateTextField('legalLastName', TRUE,
	'Student\'s Legal Last Name',
	'',
	'Enter student\'s legal last name',
	'');
?>
			<div class="input">
				<p class="label"><label for="school">Student's School <span class="required">*</span></label></p>
				<p class="explanatory">It is <i>vital</i> that you record your student's school
				correctly.  Otherwise your student will not appear on the school roster.
				If the school that your student attends is not on the list, then the coach
				probably has not registered the school with VASO yet.</p>
				<div style="column-count: 2; margin-top: 3ex;">
					<p class="columnHeading">Elementary, Middle, and Junior High Schools (Division B):</p>
					<p class="radioBtn"><input type="radio" name="school" value="Belmont Ridge MS" required aria-required="true"> Belmont Ridge MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Eagle Ridge MS" required aria-required="true"> Eagle Ridge MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Longfellow MS" required aria-required="true"> Longfellow MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Luther Jackson MS" required aria-required="true"> Luther Jackson MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Mark Twain MS" required aria-required="true"> Mark Twain MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Middleburg Academy" required aria-required="true"> Middleburg Academy</p>
					<p class="radioBtn"><input type="radio" name="school" value="Nysmith School" required aria-required="true"> Nysmith School</p>
					<p class="radioBtn"><input type="radio" name="school" value="Oakcrest School" required aria-required="true"> Oakcrest School</p>
					<p class="radioBtn"><input type="radio" name="school" value="Providence ES" required aria-required="true"> Providence ES</p>
					<p class="radioBtn"><input type="radio" name="school" value="Robert Frost MS" required aria-required="true"> Robert Frost MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Rocky Run MS" required aria-required="true"> Rocky Run MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Seneca Ridge MS" required aria-required="true"> Seneca Ridge MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="South County MS" required aria-required="true"> South County MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Trailside MS" required aria-required="true"> Trailside MS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Westminster School" required aria-required="true"> Westminster School</p>
					<p class="columnHeading columnBreakBefore">High Schools (Division C):</p>
					<p class="radioBtn"><input type="radio" name="school" value="Centreville HS" required aria-required="true"> Centreville HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Hayfield SS" required aria-required="true"> Hayfield SS</p>
					<p class="radioBtn"><input type="radio" name="school" value="JEB Stuart HS" required aria-required="true"> JEB Stuart HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="John Champe HS" required aria-required="true"> John Champe HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Lake Braddock HS" required aria-required="true"> Lake Braddock HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Langley HS" required aria-required="true"> Langley HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Robinson SS" required aria-required="true"> Robinson SS</p>
					<p class="radioBtn"><input type="radio" name="school" value="South County HS" required aria-required="true"> South County HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="South Lakes HS" required aria-required="true"> South Lakes HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Thomas Edison HS" required aria-required="true"> Thomas Edison HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="TJHSST" required aria-required="true"> TJHSST</p>
					<p class="radioBtn"><input type="radio" name="school" value="West Springfield HS" required aria-required="true"> West Springfield HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Westfield HS" required aria-required="true"> Westfield HS</p>
					<p class="radioBtn"><input type="radio" name="school" value="Woodberry Forest School" required aria-required="true"> Woodberry Forest School</p>
				</div>
			</div>
<?php
$gen->generateRadioBtnField('grade', TRUE, 2, 'Student\'s Grade', '', '', range(5, 12));
$gen->generateRadioBtnField('gender', TRUE, 1, 'Student\'s Gender',
	'', '', getRefData('GenderIdentity'));
$gen->generateEmailField('studentEmail', FALSE,
	'Student\'s Email',
	'Optional &mdash; we will only use it to send emergency communications regarding tournaments.  It will be discarded after the tournament season.',
	'', '');
$gen->generateRadioBtnField('ethnicity', TRUE, 2, 'Student\'s Ethnicity',
	'Optional, but please consider helping us as we work on educational grants and with various agencies.',
	'', getRefData('Ethnicity'));
$gen->generateRadioBtnField('numYearsParticipating', TRUE, 2,
	'How many years has the student been participating in Science Olympiad?',
	'Include this year, include all divisions.',
	'', range(1, 10));
$gen->generateRadioBtnField('legalGuardian', TRUE, 1, 'I certify that:',
	'', '', getRefData('LegalGuardianStatus'));
?>
			<div><input type="submit" value="Continue »"/></div>
		</fieldset>
	</form>
</body>

</html>
<?php
}
catch (Throwable $ex)
{
	printf("<p>DB failure: %1$s</p>", $ex->getMessage());
}
