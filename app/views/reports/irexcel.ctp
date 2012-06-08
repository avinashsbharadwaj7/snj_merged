<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=IR_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");


        if (is_array($row[0]['IrModule'])) {
            $title_array = $row[0]['IrModule'];
            $title = null;
            /*
             * Print the title
             */
            foreach ($title_array as $key => $value) {
                echo $databaseFields->getLabel($key) . "\t";
            }
            echo "\n";
            /*
             * Print Data from the database
             */
            foreach ($row as $entry) {
                $entry = $entry['IrModule'];
                foreach($entry as $key => $value){
                    echo $value . "\t";
                }
                echo "\n";
            }
        }

	//$row = $row[0];
	////-$row_count = 0;
	////-$total_rows = count($row);
	//$target_file = "app/tmp/excel_files/IR_".date("mdy")."_".time().".xls";
	//$fp = fopen($target_file, "w");
	
	
	
	/*        if($activityTypeReport  == 'RNC Integration - FSE Report')
        {
            $title = "IR Number\tNetwork Number\tDate Entered\tDate Modified\tDate Activity Performed\tRegion\tCustomer Name\tProject Manager\tEngineer Name\tCSR Ref #\tCSR Open \tIWOS Ticket #\tMOP Version\tMOP Suggestions\tScript(s) Problems\tFTP Pingable\tNTP Pingable\tActivity Type\tActivity Result\tTotal number of issues\tIssue 1 - Issue Type\tIssue 1 - Issue Owner\tIssue 1 - Summarize Issue\tIssue 1 - Issue Impact\tIssue 2 - Issue Type\tIssue 2 - Issue Owner\tIssue 2 - Summarize Issue\tIssue 2 - Issue Impact\tIssue 3 - Issue Type\tIssue 3 - Issue Owner\tIssue 3 - Summarize Issue\tIssue 3 - Issue Impact\tIssue 4 - Issue Type\tIssue 4 - Issue Owner\tIssue 4 - Summarize Issue\tIssue 4 - Issue Impact\tIssue 5 - Issue Type\tIssue 5 - Issue Owner\tIssue 5 - Summarize Issue\tIssue 5 - Issue Impact\tEscalation Done?\tEscalation Engineer Name\tEscalation Engineer Signum\tPreCheck Issues\tPreCheck Issues Present\tCall Test Performed\tCountry\tLocation\tSite Name\tNode Name\tRelease/SW Level\tHW Level\tRNC IP Address\tRNC Username\tRNC Password\tNodeB IP Address\tNodeB Username\tNodeB Password\tTarget & Status\tWhat will happen next\tDetails for reported period\tIssues/Experieced Problems\tHours Worked\tReasons for Deviations from Budget/Cost Estimate\tLead Generation\tKnowledge Sharing\tContacts\tSignum\tSDM\tTCM Engineer\n";
        }else if($activityTypeReport  == 'NodeB Rehome'){
            $title = "IR Number\tNetwork Number\tDate Entered\tDate Modified\tDate Activity Performed\tRegion\tCustomer Name\tProject Manager\tEngineer Name\tCSR Ref #\tCSR Open \tCCB Ticket #\tIWOS Ticket #\tMOP Version\tMOP Suggestions\tScript(s) Problems\tFTP Pingable\tNTP Pingable\tActivity Type\tActivity Result\tTotal number of issues\tIssue 1 - Issue Type\tIssue 1 - Issue Owner\tIssue 1 - Summarize Issue\tIssue 1 - Issue Impact\tIssue 2 - Issue Type\tIssue 2 - Issue Owner\tIssue 2 - Summarize Issue\tIssue 2 - Issue Impact\tIssue 3 - Issue Type\tIssue 3 - Issue Owner\tIssue 3 - Summarize Issue\tIssue 3 - Issue Impact\tIssue 4 - Issue Type\tIssue 4 - Issue Owner\tIssue 4 - Summarize Issue\tIssue 4 - Issue Impact\tIssue 5 - Issue Type\tIssue 5 - Issue Owner\tIssue 5 - Summarize Issue\tIssue 5 - Issue Impact\tEscalation Done?\tEscalation Engineer Name\tEscalation Engineer Signum\tPreCheck Issues\tPreCheck Issues Present\tCall Test Performed\tTarget RNC\tSource RNC\tConcerned Nodes\tNumber of Nodes Scheduled\tNumber of Nodes Attempted\tNumber of Nodes Excluded & Reason\tNumber of Nodes Successful\tNumber of Nodes Unsuccessful & Reason\tState of Failed/Fallback Nodes\tSignum\tSDM\tTCM Engineer\tTime Deleting Relations\tTime Creating Relations\tMOs Added\n";
        }else if($activityTypeReport == 'IuCS Expansion/Add/Rehome' || $activityTypeReport == 'IuPS Expansion/Add/Rehome' || $activityTypeReport == 'Iur Expansion/Add'){
            $title = "IR Number\tNetwork Number\tDate Entered\tDate Modified\tDate Activity Performed\tRegion\tCustomer Name\tProject Manager\tEngineer Name\tCSR Ref #\tCSR Open \tCCB Ticket #\tIWOS Ticket #\tMOP Version\tMOP Suggestions\tScript(s) Problems\tFTP Pingable\tNTP Pingable\tActivity Type\tActivity Result\tTotal number of issues\tIssue 1 - Issue Type\tIssue 1 - Issue Owner\tIssue 1 - Summarize Issue\tIssue 1 - Issue Impact\tIssue 2 - Issue Type\tIssue 2 - Issue Owner\tIssue 2 - Summarize Issue\tIssue 2 - Issue Impact\tIssue 3 - Issue Type\tIssue 3 - Issue Owner\tIssue 3 - Summarize Issue\tIssue 3 - Issue Impact\tIssue 4 - Issue Type\tIssue 4 - Issue Owner\tIssue 4 - Summarize Issue\tIssue 4 - Issue Impact\tIssue 5 - Issue Type\tIssue 5 - Issue Owner\tIssue 5 - Summarize Issue\tIssue 5 - Issue Impact\tEscalation Done?\tEscalation Engineer Name\tEscalation Engineer Signum\tPreCheck Issues\tPreCheck Issues Present\tCall Test Performed\tConcerned RNCs\tNumber of RNCs Scheduled\tNumber of RNCs Attempted\tNumber of RNCs Excluded\tNumber of RNCs Successful\tNumber of RNCs Unsuccessful\tState of Failed/Fallback RNCs\tSignum\tSDM\tTCM Engineer\n";
        }else if($activityTypeReport  == "All Activities"){
            $title = "IR Number\tNetwork Number\tDate Entered\tDate Modified\tDate Activity Performed\tRegion\tCustomer Name\tProject Manager\tEngineer Name\tCSR Ref #\tCSR Open \tCCB Ticket #\tIWOS Ticket #\tMOP Version\tMOP Suggestions\tScript(s) Problems\tFTP Pingable\tNTP Pingable\tActivity Type\tOriginal IR\tSub Activity Type\tActivity Result\tTotal number of issues\tIssue 1 - Issue Type\tIssue 1 - Issue Owner\tIssue 1 - Summarize Issue\tIssue 1 - Issue Impact\tIssue 2 - Issue Type\tIssue 2 - Issue Owner\tIssue 2 - Summarize Issue\tIssue 2 - Issue Impact\tIssue 3 - Issue Type\tIssue 3 - Issue Owner\tIssue 3 - Summarize Issue\tIssue 3 - Issue Impact\tIssue 4 - Issue Type\tIssue 4 - Issue Owner\tIssue 4 - Summarize Issue\tIssue 4 - Issue Impact\tIssue 5 - Issue Type\tIssue 5 - Issue Owner\tIssue 5 - Summarize Issue\tIssue 5 - Issue Impact\tEscalation Done?\tEscalation Engineer Name\tEscalation Engineer Signum\tPreCheck Issues\tPreCheck Issues Present\tCall Test Performed\tTarget RNC\tSource RNC\tConcerned Nodes\tNumber of Nodes Scheduled\tNumber of Nodes Attempted\tNumber of Nodes Excluded & Reason\tNumber of Nodes Successful\tNumber of Nodes Unsuccessful & Reason\tState of Failed/Fallback Nodes\tSignum\tSDM\tTCM Engineer\tTime Deleting Relations\tTime Creating Relations\tMOs Added\n";
        }else{*/
         ////-   $title = "IR Number\tNetwork Number\tDate Entered\tDate Modified\tDate Activity Performed\tRegion\tCustomer Name\tProject Manager\tEngineer Name\tCSR Ref #\tCSR Open \tCCB Ticket #\tIWOS Ticket #\tMOP Version\tMOP Suggestions\tScript(s) Problems\tFTP Pingable\tNTP Pingable\tActivity Type\tOriginal IR\tSub Activity Type\tActivity Result\tTotal number of issues\tIssue 1 - Issue Type\tIssue 1 - Issue Owner\tIssue 1 - Summarize Issue\tIssue 1 - Issue Impact\tIssue 2 - Issue Type\tIssue 2 - Issue Owner\tIssue 2 - Summarize Issue\tIssue 2 - Issue Impact\tIssue 3 - Issue Type\tIssue 3 - Issue Owner\tIssue 3 - Summarize Issue\tIssue 3 - Issue Impact\tIssue 4 - Issue Type\tIssue 4 - Issue Owner\tIssue 4 - Summarize Issue\tIssue 4 - Issue Impact\tIssue 5 - Issue Type\tIssue 5 - Issue Owner\tIssue 5 - Summarize Issue\tIssue 5 - Issue Impact\tEscalation Done?\tEscalation Engineer Name\tEscalation Engineer Signum\tPreCheck Issues\tPreCheck Issues Present\tCall Test Performed\tConcerned Nodes\tNumber of Nodes Scheduled\tNumber of Nodes Attempted\tNumber of Nodes Excluded & Reason\tNumber of Nodes Successful\tNumber of Nodes Unsuccessful & Reason\tState of Failed/Fallback Nodes\tSignum\tSDM\tTCM Engineer\n";
        //}
	
	//fwrite($fp, $title);
	/*echo $title; ////-
	while(is_array($row) && $total_rows>0)
	{	
		$total_rows--;
		$result = $row[$row_count]['IrModule'];
		$row_count++;		
		$counter=0; 		

		
		
            if($result['activity_type'] == 'Other' && $result['activity_type_other'] != "")
                {
                        $result['activity_type'] .= ' - ' . $result['activity_type_other'];
                }

			$counter++;
            $row = $result['id'] ."\n";
			//fwrite($fp, $row);
			echo $row;
	}
	//fclose($fp); */
?>