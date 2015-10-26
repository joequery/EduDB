<?php
namespace EduDB\Test;
use EduDB\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_fields_from_table_header(){
    $parser = new Parser();

        $header = "
        +----+----------+
        | id | username |
        +----+----------+
        ";

        $headerFields = $parser->fields_from_table_header($header);
        $expected = ['id', 'username'];
        $this->assertEquals($expected, $headerFields);
    }
}

?>
