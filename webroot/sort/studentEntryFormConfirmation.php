<?php
declare(strict_types = 1);
require_once 'util.php';
require_once 'constants.php';

try
{
	//session_start();
	//restoreForwardedPostFields();

	// Validate all page 1 fields:
	$errorMsgs = [];
	validateTextField('parentName', true, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateEmailField('parentEmail', true, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateTextField('legalFirstName', true, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateTextField('nickName', false, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateTextField('legalLastName', true, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateTableIdField('school', 'School', true, $errorMsgs);
	validateRadioBtnField('grade', STUDENT_GRADE_RADIO_BTN_VALUES, true, $errorMsgs);
	validateTableIdField('gender', 'GenderIdentity', true, $errorMsgs);
	validateEmailField('studentEmail', false, MAX_TEXT_INOUT_FIELD_LENGTH, $errorMsgs);
	validateTableIdField('ethnicity', 'Ethnicity', true, $errorMsgs);
	validateRadioBtnField('numYearsParticipating', NUM_YEARS_RADIO_BTN_VALUES, true, $errorMsgs);
	if (count($errorMsgs) > 0 || isset($_POST['btnBack']))
	{
		header('Location: studentEntryForm.php', true, 307);
		exit;
	}

	// Validate all page 2 fields:
	validateTableIdField('legalGuardian', 'LegalGuardianStatus', true, $errorMsgs);
	validateRadioBtnField('consentToParticipate', YES_ONLY_RADIO_BTN_VALUES, true, $errorMsgs);
	validateRadioBtnField('parentPledge', YES_ONLY_RADIO_BTN_VALUES, true, $errorMsgs);
	validateRadioBtnField('studentPledge', YES_ONLY_RADIO_BTN_VALUES, true, $errorMsgs);
	validateRadioBtnField('mediaRelease', YES_NO_RADIO_BTN_VALUES, true, $errorMsgs);
	if (count($errorMsgs) > 0)
	{
		header('Location: studentEntryForm2.php', true, 307);
		exit;
	}

	//TODO: If submit button pressed, create DB entry and display success or error message
	if (isset($_POST['btnSubmit']))
	{
	}
}
catch (Throwable $ex)
{
	printf('<p>Exception at %1$s, line %2$d: %3$s</p>' . PHP_EOL, $ex->getFile(),
		$ex->getLine(), $ex->getMessage());
}
