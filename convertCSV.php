<?php

//Converting CSV file into an Associative Array in PHP

function read_csv($file){
    $data = array();
    $csv_file = $file['folder'] . $file['name'];
    $csvfile = fopen($csv_file, 'r');
    if(!feof($csvfile)){
        $i = 0;
        while (!feof($csvfile)) {
            $csv_data[] = fgetcsv($csvfile, 1000, ",");
            $data[] = array(
                'column1' => !empty($csv_data[$i][0])?$csv_data[$i][0]:'empty',
                'column2' => !empty($csv_data[$i][1])?$csv_data[$i][1]:'empty',
                'column3' => !empty($csv_data[$i][2])?$csv_data[$i][2]:'empty',
                'column4' => !empty($csv_data[$i][3])?$csv_data[$i][3]:'empty',
                'column5' => !empty($csv_data[$i][4])?$csv_data[$i][4]:'empty'
            );
            $i++;
        }
    }
    return $data;
}

//getData
$data = read_csv(array('folder'=>'','name'=>'file.csv')); //if csv is in same folder leave folder empty
var_dump($data);
