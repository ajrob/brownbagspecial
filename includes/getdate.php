<?php    
    //Get the current week date range
    function x_week_range($date) {
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    return array(date('Y-m-d', $start),
                 date('Y-m-d', strtotime('next saturday', $start)));
    }
    
    //Todays date:
    $today = date('Y-m-d');
    //Get start and dates
    list($start_date, $end_date) = x_week_range($today);
    
    //Add each subsequent working day of the week
    $mon = date('n\/j', strtotime($start_date . "+1 day"));
    $tues = date('n\/j', strtotime($start_date . "+2 day"));
    $wed = date('n\/j', strtotime($start_date . "+3 day"));
    $thurs = date('n\/j', strtotime($start_date . "+4 day"));
    $fri = date('n\/j', strtotime($start_date . "+5 day"));
    
    //Get valid db date formats
    $mon_db_date = date('Y-m-d', strtotime($start_date . "+1 day"));
    $tues_db_date = date('Y-m-d', strtotime($start_date . "+2 day"));
    $wed_db_date = date('Y-m-d', strtotime($start_date . "+3 day"));
    $thurs_db_date = date('Y-m-d', strtotime($start_date . "+4 day"));
    $fri_db_date = date('Y-m-d', strtotime($start_date . "+5 day"));
?>