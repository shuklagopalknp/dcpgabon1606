<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function timeAgo($time_ago)
			{				
				$time_ago = strtotime($time_ago);
				$cur_time   = time();
				$time_elapsed   = $cur_time - $time_ago;
				$seconds    = $time_elapsed ;
				$minutes    = round($time_elapsed / 60 );
				$hours      = round($time_elapsed / 3600);
				$days       = round($time_elapsed / 86400 );
				$weeks      = round($time_elapsed / 604800);
				$months     = round($time_elapsed / 2600640 );
				$years      = round($time_elapsed / 31207680 );
				
				if($seconds <= 60){
					return "just now";
				}
				else if($minutes <=60){
					if($minutes==1){
						return "1 minute";
					}
					else{
						return $minutes."minutes";
					}
				}
				else if($hours <=24){
				    if($hours==1){
				        return "1 H";
				    }else{				    	
				    	return $hours."H";
				    }
				}
				//Days
				else if($days <= 7){
				    if($days==1){
				        return $hours ."H";
				    }else{
				    	
				        	return $hours ."H";
				    	
				        
				    }
				}
				//Weeks
				else if($weeks <= 4.3){
				    if($weeks==1){
				        return "1 week";
				    }else{
				        return $weeks."weeks";
				    }
				}
				//Months
				else if($months <=12){
				    if($months==1){
				        return "1 month";
				    }else{
				        return $months."months";
				    }
				}
				//Years
				else{
				    if($years==1){
				        return "1 Y";
				    }else{
				        return $years." Y";
				    }
				}
			}

			function timeAgo2($time_ago)
			{				
				$time_ago = strtotime($time_ago);
				$cur_time   = time();
				$time_elapsed   = $cur_time - $time_ago;
				$seconds    = $time_elapsed ;
				$minutes    = round($time_elapsed / 60 );
				$hours      = round($time_elapsed / 3600);
				$days       = round($time_elapsed / 86400 );
				$weeks      = round($time_elapsed / 604800);
				$months     = round($time_elapsed / 2600640 );
				$years      = round($time_elapsed / 31207680 );
				
				if($seconds <= 60){
					return "just now";
				}
				else if($minutes <=60){
					if($minutes==1){
						return "1 minute";
					}
					else{
						return $minutes."minutes";
					}
				}
				else if($hours <=24){
				    if($hours==1){
				        return "1 H";
				    }else{				    	
				    	return $hours."H";
				    }
				}
				//Days
				else if($days <= 7){
				    if($days==1){
				        return $hours ."H";
				    }else{
				    	
				        	return $hours ."H";
				    	
				        
				    }
				}
				//Weeks
				else if($weeks <= 4.3){
				    if($weeks==1){
				        return "1 week";
				    }else{
				        return $weeks."weeks";
				    }
				}
				//Months
				else if($months <=12){
				    if($months==1){
				        return "1 ";
				    }else{
				        return $months."";
				    }
				}
				//Years
				else{
				    if($years==1){
				        return "12";
				    }else{
				        return $years*12;
				    }
				}
			}
			
			function timeAgo3($time_ago,$compareDate)
			{				
				$time_ago = strtotime($time_ago);
				$cur_time   = strtotime($compareDate);
				$time_elapsed   = $cur_time - $time_ago;
				$seconds    = $time_elapsed ;
				$minutes    = round($time_elapsed / 60 );
				$hours      = round($time_elapsed / 3600);
				$days       = round($time_elapsed / 86400 );
				$weeks      = round($time_elapsed / 604800);
				$months     = round($time_elapsed / 2600640 );
				$years      = round($time_elapsed / 31207680 );
				
				$from=$minutes-60;
				
				if (!$from) return '0 minutes';
    $periods = array('year' => 525600,
                     'month' => 43800,
                     'week' => 10080,
                     'day' => 1440,
                     'hour' => 60,
                     'minute' => 1);
    $output = array();
    foreach ($periods as $period_name => $period) {
        $num_periods = floor($from / $period);
        if ($num_periods > 1) {
            $output[] = "$num_periods {$period_name}s";
        }
        elseif ($num_periods > 0) {
            $output[] = "$num_periods {$period_name}";
        }
        $from -= $num_periods * $period;
    }
    return implode(' : ', $output);
    
    
				
				if($seconds <= 60){
					return "just now";
				}
				else if($minutes <=60){
					if($minutes==1){
						return "1 minute";
					}
					else{
						return $minutes."minutes";
					}
				}
				else if($hours <=24){
				    if($hours==1){
				        return "1 H";
				    }else{				    	
				    	return $hours."H";
				    }
				}
				//Days
				else if($days <= 7){
				    if($days==1){
				        return $hours ."H";
				    }else{
				    	
				        	return $hours ."H";
				    	
				        
				    }
				}
				//Weeks
				else if($weeks <= 4.3){
				    if($weeks==1){
				        return "1 week";
				    }else{
				        return $weeks."weeks";
				    }
				}
				//Months
				else if($months <=12){
				    if($months==1){
				        return "1 ";
				    }else{
				        return $months."";
				    }
				}
				//Years
				else{
				    if($years==1){
				        return "12";
				    }else{
				        return $years*12;
				    }
				}
			}
			
						function timeAgo4($time_ago,$compareDate)
			{				
				$time_ago = strtotime($time_ago);
				$cur_time   = strtotime($compareDate);
				$time_elapsed   = $cur_time - $time_ago;
				$seconds    = $time_elapsed ;
				$minutes    = round($time_elapsed / 60 );
				$hours      = round($time_elapsed / 3600);
				$days       = round($time_elapsed / 86400 );
				$weeks      = round($time_elapsed / 604800);
				$months     = round($time_elapsed / 2600640 );
				$years      = round($time_elapsed / 31207680 );
				
				$from=$minutes-120;
				
				if (!$from) return '0 minutes';
    $periods = array('year' => 525600,
                     'month' => 43800,
                     'week' => 10080,
                     'day' => 1440,
                     'hour' => 60,
                     'minute' => 1);
    $output = array();
    foreach ($periods as $period_name => $period) {
        $num_periods = floor($from / $period);
        if ($num_periods > 1) {
            $output[] = "$num_periods {$period_name}s";
        }
        elseif ($num_periods > 0) {
            $output[] = "$num_periods {$period_name}";
        }
        $from -= $num_periods * $period;
    }
    return implode(' : ', $output);
    
    
				
				
			}