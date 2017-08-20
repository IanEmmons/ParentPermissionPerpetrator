<?php

const YES_ONLY_RADIO_BTN_VALUES = array('yes' => 'Yes');
const YES_NO_RADIO_BTN_VALUES = array('yes' => 'Yes', 'no' => 'No');
const STUDENT_GRADE_RADIO_BTN_VALUES = keyAndValueRange(5, 12);
const NUM_YEARS_RADIO_BTN_VALUES = keyAndValueRange(1, 10);
const MAX_TEXT_INOUT_FIELD_LENGTH = 1024;
const EMAIL_REGEX = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';

/*
 * Email validation: Strip line breaks and leading and trailing whitespace
 * from the value.  Then match against this regex:
 *
 * /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
 */
