<?php
require_once('vendor/autoload.php');

use \Src\Classes\Csv;
use  \Src\Classes\MentorsMatch;

if (!isset($_POST['upload']))
 {
    echo '<label class="text-danger ml-3">' . MESSAGES::NO_SELECTED_FILES . '</label>';
}else
{
    $csv = new Csv();
    $employers = $csv->getData($_FILES);

    if ($employers === MESSAGES::INCORRECT_FORMAT) { echo '<label class="text-danger ml-3">' . MESSAGES::INCORRECT_FORMAT . '</label>'; return;}

    if ($employers === MESSAGES::NO_EMPLOYERS) { echo '<label class="text-danger ml-3">' . MESSAGES::NO_EMPLOYERS . '</label>'; return;}

    $mentorsMatch = new MentorsMatch();
    list($employersMatches, $averageMatch) = $mentorsMatch->getMentorsMatch($employers);

    if ($averageMatch) {
        echo '<strong><label class="text-left m-3 strong">In the case of ' . count($employers) . ' employees the highest average match score is ' .
            $averageMatch . '%</label></strong><br>';

        $matches = [];

        foreach($employersMatches as $employerMatch) {

                echo '<label class="text-left ml-3">' . $employers[$employerMatch['employeeOne']][COLUMNS::NAME] .
                ' will be matched with ' . $employers[$employerMatch['employeeTwo']][COLUMNS::NAME] . ' - ' .
                    $employerMatch['match_percent'] .
                '%</label><br>';

        }
    } else {
        echo '<label class="text-danger ml-3">' . MESSAGES::NO_MATCHES . '</label>';
    }

}



