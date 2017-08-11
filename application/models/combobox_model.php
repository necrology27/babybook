<?php

class combobox_model extends CI_Model
{

    function getmeasurements()
    {
        $query = " SHOW COLUMNS FROM `users` LIKE 'measurement' ";
        $result = mysql_query($query) or die('error getting enum field ' . mysql_error());
        $row = mysql_fetch_array($result, MYSQL_NUM);
        // extract the values
        // the values are enclosed in single quotes
        // and separated by commas
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row[1], $enum_array);
        $measurement = $enum_array[1];
        return ($measurement);
    }
}