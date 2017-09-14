<?php
/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/30/17
 * Time: 9:46 PM
 */

use PHPUnit\Framework\TestCase;

class downloadTest extends TestCase
{
    // test csv creation data
    public function testcsv()
    {
        {
            $data = array(array("Code" => "FR", "Country" => "FRANCE"),
                array("Code" => "DZ", "Country" => "ALGERIA"),
                array("Code" => "GR", "Country" => "GERMANY"));

            $outputBuffer = fopen("php://output", 'w');
            fputcsv($outputBuffer, array("List of countries with their codes"));
            foreach ($data as $val) {
                fputcsv($outputBuffer, $val);
            }
            fclose($outputBuffer);
            $this->assertNotEmpty($outputBuffer);
        }
    }
}
