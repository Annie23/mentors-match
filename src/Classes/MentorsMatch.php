<?php

namespace Src\Classes;

use Src\Contracts\MentorsMatchInterface;

class MentorsMatch implements MentorsMatchInterface
{
    public $mentors = [];

    public $percentsSum = 0;

    public function getMentorsMatch($employers)
    {
        foreach ($employers as $key => $employer) {

            foreach ($employers as $index => $otherEmployer) {

                $keyMatch = !in_array($key, $otherEmployer['matches_indexes']);
                $indexMatch = !in_array($index, $employer['matches_indexes']);

                //INFO: check if not the same employee  and if not any match between this both employee
                if ($key !== $index && $keyMatch && $indexMatch) {

                    $matchPercent = $this->getMatchPercent($employer, $otherEmployer);

                    if ($matchPercent) {
                        $employers[$key]['matches_indexes'][] = $index;

                        $this->mentors[] = [
                            'employeeOne' => $key,
                            'employeeTwo' => $index,
                            'match_percent' => $matchPercent
                        ];
                    }
                }
            }
        }

        $averageMatch =  count($this->mentors) > 0 ?
            round($this->percentsSum / count($this->mentors), 2) :
                0;

        return [$this->mentors, $averageMatch];
    }

    public function getMatchPercent($employerOne, $employerTwo)
    {
        $percent = 0;

        if ($employerOne[\COLUMNS::DIVISION] === $employerTwo[\COLUMNS::DIVISION]) {
            $percent += \SCORING_PERCENTS::SAME_DIVISION;
        }

        if (abs($employerOne[\COLUMNS::AGE] - $employerTwo[\COLUMNS::AGE]) <= 5) {
            $percent += \SCORING_PERCENTS::SAME_RANGE_AGE;
        }

        if ($employerOne[\COLUMNS::UTC_OFFSET] === $employerTwo[\COLUMNS::UTC_OFFSET]) {
            $percent += \SCORING_PERCENTS::SAME_TIMEZONE;
        }

        $this->percentsSum += $percent;

        return $percent;
    }
}