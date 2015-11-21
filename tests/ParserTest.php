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
        | 1  | joejoe   |
        |  2 |   sally2 |
        +----+----------+
        ";
    }

    public function test_fields_from_table_header(){
        $parser = new Parser($this->table_ascii);
        $db = $parser->parse();
        $expected = ['id', 'username'];
        $this->assertEquals($db['fields'], $expected);
    }

    public function test_raw_table_data(){
        $parser = new Parser($this->table_ascii);
        $db = $parser->parse();
        $expected = [
            [
                'id' => '1',
                'username' => 'joejoe',
            ],
            [
                'id' => '2',
                'username' => 'sally2',
            ]
        ];
        $this->assertEquals($db['raw_data'], $expected);
    }
}

?>
