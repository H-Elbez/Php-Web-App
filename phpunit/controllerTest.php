<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/30/17
 * Time: 6:44 PM
 */
class controllerTest extends PHPUnit\Framework\TestCase
{
    // test getting data from the remote address
    public function testGetdata()
    {
        {
            $data = file_get_contents("http://pastebin.com/raw/943PQQ0n");
            $this->assertNotEmpty($data);
        }
    }
}
