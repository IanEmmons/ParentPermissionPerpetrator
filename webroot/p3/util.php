<?php
declare(strict_types = 1);
require_once('DbConnection.php');
require_once('DbStatement.php');
require_once('DbResult.php');

const POST_FWD_KEY = 'post-forward';

function forwardPostFields(): void
{
	$_SESSION[POST_FWD_KEY] = $_POST;
}

function restoreForwardedPostFields(): void
{
	if (array_key_exists(POST_FWD_KEY, $_SESSION))
	{
		foreach ($_SESSION[POST_FWD_KEY] as $key => $value)
		{
			$_POST[$key] = $value;
		}
	}
}

function dumpPostFields(): void
{
	if (count($_POST) > 0)
	{
		printf('<p>Post fields:</p><ul>' . PHP_EOL);
	}
	else
	{
		printf('<p>No post fields are present.</p>' . PHP_EOL);
	}
	foreach($_POST as $key => $value)
	{
		printf('<li>"%1$s" =&gt; "%2$s"</li>' . PHP_EOL, $key, $value);
	}
	if (count($_POST) > 0)
	{
		printf('</ul>' . PHP_EOL);
	}
}

function isFieldMissing(string $fieldName, bool $isRequired, array $errorMsgs): bool
{
	if (!array_key_exists($fieldName, $_POST) || !isset($_POST[$fieldName])
		|| (is_string($_POST[$fieldName]) && empty(trim($_POST[$fieldName]))))
	{
		if ($isRequired)
		{
			$errorMsgs[] = 'Missing value for field ' . $fieldName;
		}
		return true;
	}
	return false;
}

function validateTextField(string $fieldName, bool $isRequired, int $maxLength,
	array $errorMsgs): void
{
	if (isFieldMissing($fieldName, $isRequired, $errorMsgs))
	{
		return;
	}
	$actualValue = trim(strval($_POST[$fieldName]));
	if ($maxLength > 0 && strlen($actualValue) > $maxLength)
	{
		$errorMsgs[] = 'Field ' . $fieldName . ' must be no longer than '
			. str($maxLength) . ' characters';
	}
}

function validateEmailField(string $fieldName, bool $isRequired, int $maxLength,
	array $errorMsgs): void
{
	if (isFieldMissing($fieldName, $isRequired, $errorMsgs))
	{
		return;
	}
	$actualValue = trim(strval($_POST[$fieldName]));
	if ($maxLength > 0 && strlen($actualValue) > $maxLength)
	{
		$errorMsgs[] = 'Field ' . $fieldName . ' must be no longer than '
			. str($maxLength) . ' characters';
	}
	$actualValue = strtr($actualValue , array("\r" => '', "\n" => ''));
	if (!preg_match(EMAIL_REGEX, $actualValue))
	{
		$errorMsgs[] = 'Field ' . $fieldName . ' does not match the required format';
	}
}

function validateTableIdField(string $fieldName, string $tableName, bool $isRequired,
	array $errorMsgs): void
{
	if (isFieldMissing($fieldName, $isRequired, $errorMsgs))
	{
		return;
	}
	$idValue = strval($_POST[$fieldName]);
	$conn = new DbConnection();
	$stmt = $conn->prepare("select distinct id from " . $tableName);
	$result = $stmt->executeAndGetResult();
	while ($row = $result->fetchRow())
	{
		if ($idValue === strval($row["id"]))
		{
			return;
		}
	}
	$errorMsgs[] = 'Invalid value in field ' . $fieldName;
}

function validateRadioBtnField(string $fieldName, array $validValues, bool $isRequired,
	array $errorMsgs): void
{
	if (isFieldMissing($fieldName, $isRequired, $errorMsgs))
	{
		return;
	}
	$actualValue = strval($_POST[$fieldName]);
	foreach ($validValues as $validValue)
	{
		if ($actualValue === strval($validValue))
		{
			return;
		}
	}
	$errorMsgs[] = 'Invalid value in field ' . $fieldName;
}
