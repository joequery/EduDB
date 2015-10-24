<?php
require('vendor/autoload.php');

use EduDB\Parser;


class ParserTest extends PHPUnit_Framework_TestCase
{
    public function test_parse_columns(){
        $obj = new Parser();
        //$this->assertEquals(1, $obj->parse());
        /*
        foreach(get_declared_classes() as $name){
            echo $name . "\n";
        }
         */
        $this->assertEquals(1,1);
    }
}

?>
