<?php

namespace EduDB;

class Parser{
    private $table_rows;
    private $fields;

    public function __construct($table_ascii){
        $this->table_ascii = $table_ascii;
    }

    public function parse(){
        $table_rows = $this->get_table_rows();
        $fields = $this->fields_from_table_header($table_rows);
        $raw_data = $this->get_raw_table_data($table_rows, $fields);

        $db = [
            'fields' => $fields,
            'raw_data' => $raw_data
        ];
        return $db;
    }


    private function fields_from_table_header($table_rows){
        return $table_rows[0];
    }

    private function get_raw_table_data($table_rows, $fields){
        $data_rows = array_slice($table_rows, 1);
        $data = [];
        foreach($data_rows as $row){
            $this_row = [];
            foreach($row as $i => $value){
                $field = $fields[$i];
                $this_row[$field] = $value;
            }
            $data[]=$this_row;
        }
        return $data;
    }

    // ===============================================================
    // Helpers
    // ===============================================================

    /*
        Look for => +----+----------+
    */
    private function is_table_divider($line){
        return strlen($line) && $line[0] == '+';
    }

    private function get_single_row_values($line){
        $row_sections = explode('|', $line);
        $raw_trimmed_values = array_map('trim', $row_sections);
        $values = array_values(array_filter($raw_trimmed_values));
        return $values;
    }

    private function get_table_rows(){
        $table_lines = explode("\n", $this->table_ascii);
        $rows = array_filter($table_lines, function($line){
            $line = trim($line);
            return strlen($line) && !$this->is_table_divider($line);
        });

        $rows_with_values = array_map(function($row){
            return $this->get_single_row_values($row);
        }, $rows);

        // array_values used to reindex element indexes
        $rows_with_values = array_values($rows_with_values);

        return $rows_with_values;
    }
}

?>
