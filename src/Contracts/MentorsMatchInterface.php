<?php

namespace Src\Contracts;


interface MentorsMatchInterface
{
    public function getMentorsMatch($employers);

    public function getMatchPercent($employerOne, $employerTwo);
}