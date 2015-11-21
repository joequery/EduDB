<?php
namespace EduDB\Test;
use EduDB\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp(){
        $this->table_ascii = "
        +----+----------+
        | id | username |
        +----+----------+
        ";
    }

    public function test_fields_from_table_header(){
        $parser = new Parser($this->table_ascii);

        $headerFields = $parser->fields_from_table_header();
        $expected = ['id', 'username'];
        $this->assertEquals($expected, $headerFields);
    }
}

?>
