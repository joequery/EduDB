<?php
use EduDB\Parser;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function test_parse_columns(){
        $obj = new Parser();
        $this->assertEquals(1, $obj->parse("h"));
    }
}

?>
