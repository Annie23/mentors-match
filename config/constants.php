<?php

class COLUMNS
{
    const NAME       = 0;
    const EMAIL      = 1;
    const DIVISION   = 2;
    const AGE        = 3;
    const UTC_OFFSET = 4;
}

class MESSAGES
{
    const INCORRECT_FORMAT = 'Please select right format file';
    const NO_EMPLOYERS = 'There is no data for match';
    const NO_SELECTED_FILES = 'Please select file';
    const NO_MATCHES = 'No matches';
}

class SCORING_PERCENTS
{
    const SAME_DIVISION = 30;
    const SAME_RANGE_AGE = 30;
    const SAME_TIMEZONE = 40;
}