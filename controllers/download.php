<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/29/17
 * Time: 11:19 PM
 * Description: download controller
 */
class download extends controller
{
    public function __construct()
    {
        $this->Startdownload();
    }

    // Getting data, create csv file launch download
    public function Startdownload()
    {
        $d = parent::GetData();
        // check if we got data from the remote address
        if (empty($d)) {
            // show error message and go back to home
            require_once __DIR__ . '/../views/main.html';
            echo '<div class="alert alert-danger" role="alert">Something wrong happened ...</div>';
            header("refresh:2;url=..");
        } else {
            $filename = "countries";
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename={$filename}.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            $outputBuffer = fopen("php://output", 'w');
            fputcsv($outputBuffer, array("List of countries with their codes"));
            foreach ($d as $val) {
                fputcsv($outputBuffer, $val);
            }
            fclose($outputBuffer);
        }
    }
}