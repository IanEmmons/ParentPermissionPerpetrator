<?php
declare(strict_types = 1);

class FormFieldGenerator
{
	function __construct()
	{
	}

	function __destruct()
	{
	}

	function generateTextField(string $fieldName, bool $isRequired, string $label,
		string $explanation, string $format, string $value): void
		{
			$this->generateTextLikeField($fieldName, 'text', $isRequired, $label,
				$explanation, $format, $value);
	}

	function generateEmailField(string $fieldName, bool $isRequired, string $label,
		string $explanation, string $format, string $value): void
		{
			$this->generateTextLikeField($fieldName, 'email', $isRequired, $label,
				$explanation, $format, $value);
	}

	private function generateTextLikeField(string $fieldName, string $type, bool $isRequired,
		string $label, string $explanation, string $format, string $value): void
	{
		$reqAttrs = $this->generateFieldIntro($fieldName, $isRequired, $label, $explanation);

		$fmtId = $fieldName . 'Format';
		$descAttr = (isset($format) && $format != "") ? (' aria-describedby="' . $fmtId . '"') : '';

		printf('<input type="%1$s" id="%2$s" name="%2$s" value="%3$s"%4$s%5$s/>' . PHP_EOL,
			$type, $fieldName, $value, $reqAttrs, $descAttr);
		if (isset($format) && $format != "")
		{
			printf('<span id="%1$s" class="help">%2$s</span>' . PHP_EOL, $fmtId, $format);
		}
		$this->generateEndDiv();
	}

	function generateRadioBtnField(string $fieldName, bool $isRequired, int $numColumns,
		string $label, string $explanation, string $value, array $options): void
	{
		$reqAttrs = $this->generateFieldIntro($fieldName, $isRequired, $label, $explanation);

		if ($numColumns > 1)
		{
			printf('<div style="column-count: %1$d">' . PHP_EOL, $numColumns);
		}
		foreach($options as $id => $name)
		{
			printf('<p class="radioBtn"><input type="radio" name="%1$s" value="%2$s"%3$s> %4$s</p>' . PHP_EOL,
				$fieldName, $id, $reqAttrs, $name);
		}
		if ($numColumns > 1)
		{
			$this->generateEndDiv();
		}
		$this->generateEndDiv();
	}

	private function generateFieldIntro(string $fieldName, bool $isRequired,
		string $label, string $explanation): string
	{
		$star = $isRequired ? ' <span class="required">*</span>' : '';
		$reqAttrs = $isRequired ? ' required aria-required="true"' : '';

		printf('<div class="input">' . PHP_EOL);
		printf('<p class="label"><label for="%1$s">%2$s%3$s</label></p>' . PHP_EOL,
			$fieldName, $label, $star);
		if (isset($explanation) && $explanation != "")
		{
			printf('<p class="explanatory">%1$s</p>' . PHP_EOL, $explanation);
		}

		return $reqAttrs;
	}

	private function generateEndDiv(): void
	{
		printf('</div>' . PHP_EOL);
	}
}
