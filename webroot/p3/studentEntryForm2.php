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

	<p><span class="required">* Response required</span></p>

	<h3>Waivers</h3>

	<form method="post" action="">
		<fieldset>
			<!-- <legend>Student Entry</legend> -->
<?php
$gen->generateRadioBtnField('legalGuardian', TRUE, 1, 'I certify that:',
	'', '', getRefData('LegalGuardianStatus'));
$gen->generateRadioBtnField('consentToParticipate', TRUE, 1,
	'Parent/Guardian Permission: I understand that participation in Virginia Science '
	. 'Olympiad (“VASO”) activities involves a certain degree of risk and can be '
	. 'physically, mentally, and emotionally demanding. I have carefully considered '
	. 'the risk involved and have given consent for myself or my child to participate '
	. 'in this activity. I also understand that participation in this activity is '
	. 'entirely voluntary and requires participants to abide by applicable rules and '
	. 'standards of conduct. I understand that this may include participation in '
	. 'tournaments, training sessions, special events, competitions, and other '
	. 'activities related to VASO. It may also include travel under the supervision '
	. 'of the team coach or their authorized team representative. I release VASO, and '
	. 'all employees, volunteers, related parties, or other organizations associated '
	. 'with the activity from any and all claims, liability or cause of action '
	. 'arising out of this participation.',
	'', '', array('yes' => 'Yes'));
$gen->generateRadioBtnField('parentPledge', TRUE, 1,
	'Parent/Guardian Pledge: I pledge to be an example for our children by: respecting '
	. 'the rules of Science Olympiad, encouraging excellence in preparation and '
	. 'investigation, supporting independence in design and production of all '
	. 'competition devices, and respecting the decisions of event supervisors and '
	. 'judges. Our examples will promote the spirit of cooperation within and among '
	. 'all our participating teams. (I have read the parent participation policy '
	. '&mdash; link in the sidebar &mdash; and understand that parents are not '
	. 'allowed to construct any piece of competition devices. All physical work is '
	. 'to be done by students on the team.)',
	'', '', array('yes' => 'Yes'));
$gen->generateRadioBtnField('studentPledge', TRUE, 1,
	'Student Pledge (to be shared with Competitor): I pledge to put forth my best '
	. 'effort in the Science Olympiad tournament and to uphold the principles of '
	. 'honest competition. In my events, I will compete with integrity, respect, and '
	. 'sportsmanship towards my fellow competitors. I will display courtesy towards '
	. 'Event Supervisors and Tournament Personnel. My actions will exemplify the '
	. 'proud spirit of my school, team, and state.',
	'', '', array('yes' => 'Yes'));
$gen->generateRadioBtnField('mediaRelease', TRUE, 1,
	'Media Release: I hereby consent and agree that VASO, and all employees, '
	. 'volunteers, related parties, or other organizations associated with the '
	. 'activity have the right to take photographs, videotape, or digital recordings '
	. 'of myself or my child and to use these in any and all media, for the purpose '
	. 'of promoting Science Olympiad and its related programs. The identity of minors '
	. 'will not be revealed without appropriate consent. I hereby release to VASO, '
	. 'its agents, and employees all rights to exhibit this work in print and '
	. 'electronic form publicly or privately and to market and sell copies. I waive '
	. 'any rights, claims, or interest I may have to control the use of my identity '
	. 'or likeness in whatever media used. I understand that there will be no '
	. 'financial or other remuneration for these rights.',
	'(This release is for pictures of students; VASO will not take pictures of '
	. 'devices. The release is optional, but encouraged; pictures are typically used '
	. 'on the Web site and on informational material.  No names are ever used.)',
	'', array('yes' => 'Yes', 'no' => 'No'));
?>
			<div><input type="submit" value="« Back"/> <input type="submit" value="Submit"/></div>
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
