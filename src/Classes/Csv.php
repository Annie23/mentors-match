<?php

namespace Src\Classes;


use Src\Contracts\CsvInterface;

class Csv implements CsvInterface
{

    public $extensions = ['csv', 'xls'];

    /**
     * @param $request
     * @return mixed|string|null
     */
    public function getData($request)
    {
        if ($request['csv_file']['name']) {
            $fileName = explode(".", $request['csv_file']['name']);

            if (in_array(end($fileName), $this->extensions)) {
                $fileData = fopen($request['csv_file']['tmp_name'], 'r');
                $data = [];

                while ($row = fgetcsv($fileData)) {
                    $row['matches_indexes'] = [];
                    $data[] = $row;
                }

                fclose($fileData);

                return (count($data) > 0 && array_shift($data)) ? $data : \MESSAGES::NO_EMPLOYERS;
            }

            return \MESSAGES::INCORRECT_FORMAT;
        }
    }
}