<?php

namespace EduDB;

class Parser{
    public function parse($table_ascii){
        return 0;
    }

    /*
        +----+----------+
        | id | username | => ['id', 'username']
        +----+----------+
     */
    public function fields_from_table_header($table_ascii){
        $lines = explode("\n", $table_ascii);
        $header_row = NULL;
        foreach($lines as $i => $line){
            /*
                Get the line **after** the column ASCII starts

                Look for =>     +----+----------+
                What we want => | id | username |
                                +----+----------+
             */
            $line = trim($line);
            if(strlen($line) && $line[0] == '+'){
                // "| id | username |"
                $header_row = $lines[$i+1];
                break;
            }
        }

        $header_sections = explode('|', $header_row);
        $headers = [];
        foreach($header_sections as $h){
            $h = trim($h);
            if(!empty($h)){
                $headers[] = $h;
            }
        }

        return $headers;
    }
}

?>
