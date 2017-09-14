<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/29/17
 * Time: 9:43 PM
 * Description: Parent controller
 */
class controller
{
    private $Link = "http://pastebin.com/raw/943PQQ0n";

    // Load view and pass data if exist
    protected function LoadView($View, $data = [])
    {
        // check if we got data from the remote address
        if ($View === "data" && empty($data)) {
            // show error message and go back to home
            require_once __DIR__ . '/../views/main.html';
            echo '<div class="alert alert-danger" role="alert">Something wrong happened ...</div>';
            header("refresh:2;url=..");
        } else {
            // load data into view ( if exists )
            extract($data);
            require_once __DIR__ . '/../views/' . $View . '.html';
        }
    }


    // Getting and extracting data
    protected function GetData()
    {
        $d = array();
        try {
            // getting data from the remote source
            $data = file_get_contents($this->Link);
            // getting array by exploding $data by \n as delimiter
            $convert = explode("\n", $data);
            // variable used to know when should we start getting the actual data we need
            $start = false;
            $i = 0;
            // we can see that the actual data is between two empty lines so we can use that to extract just
            // what we need
            while ($i < count($convert) && (trim($convert[$i]) !== "" || $start === false)) {
                if (trim($convert[$i]) === "") {
                    $start = !$start;
                }
                if ($start === true && strlen($convert[$i]) > 2) {
                    $d[] = array(explode(" ", $convert[$i])[0], substr($convert[$i], strlen(explode(" ", $convert[$i])[0])));
                }
                $i++;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $d;
    }
}