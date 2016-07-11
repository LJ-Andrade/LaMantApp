<?php
function maxValueInArray($array, $keyToSearch) {
    $currentMax = NULL;
    foreach($array as $arr)
    {
        foreach($arr as $key => $value)
        {
            if ($key == $keyToSearch && ($value >= $currentMax))
            {
                $currentMax = $value;
            }
        }
    }

    return $currentMax;
}

// maxNumberInArray
// $value = maxValueInArray($value, "league_id");
