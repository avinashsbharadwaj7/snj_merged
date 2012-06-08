var j = jQuery.noConflict();

var doc1;

var secondcarrieradd =
{
whattoshow:['#act1','#rbs','#rnc','#Div_rnc_script1_Container','#Div_rnc_script2_Container','#Div_rnc_script3_Container',
'#Div_rbs_script1_Container','#Div_rbs_script2_Container','#Div_rbs_script3_Container'],
notshow:[]
}

var secondcarrier_status =
    {
    
   nonOss:['#rnc_script1','#rnc_script2','#rnc_script3','#rbs_script1','#rbs_script2','#rbs_script3'],
   Oss:[]
    }
var splitpower =
{
whattoshow:['#act2','#rbs','#rnc','#fback','#Div_rnc_script3_Container','#Div_rnc_script4_Container',
'#Div_rbs_script1_Container','#Div_rbs_script2_Container','#Div_rbs_script3_Container',
'#Div_fback_script1_Container'
],
notshow:[]
}

var splitpower_status =
    {
        nonOss:['#rnc_script3','#rnc_script4','#rbs_script1','#rbs_script2','#rbs_script3','#fback_script1'],
        Oss:[]
    }


var atm_hybrid =
{
whattoshow:['#act3','#rbs','#rnc','#fback','#Div_rnc_script5_Container',
'#Div_rbs_script4_Container','#Div_rbs_script5_Container','#Div_rbs_script6_Container','#Div_rbs_script7_Container','#Div_rbs_script8_Container',
'#Div_fback_script2_Container','#Div_fback_script3_Container','#Div_fback_script4_Container','#Div_fback_script5_Container','#Div_fback_script6_Container','#Div_fback_script7_Container'
],
notshow:[]
}

var atm_hybrid_status =
    {
        nonOss:['#rnc_script5','#rbs_script4','#rbs_script5','#rbs_script6','#rbs_script7','#rbs_script8',
            '#fback_script2','#fback_script3','#fback_script4','#fback_script5','#fback_script6','#fback_script7'],
        Oss:[]
        
    }

var hybrid_ip =
{
whattoshow:['#act4','#rbs','#rnc','#fback','#Div_rnc_script6_Container','#Div_rnc_script7_Container',
'#Div_rbs_script9_Container','#Div_rbs_script10_Container','#Div_rbs_script11_Container','#Div_rbs_script12_Container','#Div_rbs_script13_Container','#Div_rbs_script14_Container',
'#Div_fback_script8_Container','#Div_fback_script9_Container','#Div_fback_script10_Container','#Div_fback_script11_Container','#Div_fback_script12_Container','#Div_fback_script13_Container','#Div_fback_script14_Container',
],
notshow:[]

}

var hybrid_ip_status =
    {
        nonOss:['#rnc_script6','#rnc_script7','#rbs_script9','#rbs_script10','#rbs_script11','#rbs_script12','#rbs_script13','#rbs_script14',
            '#fback_script8','#fback_script9','#fback_script10','#fback_script11','#fback_script12','#fback_script13','#fback_script14'],
        Oss:[]
        
    }
var rip_replace =
{

whattoshow:['#act5','#rbs','#rnc','#fback','#Div_rnc_script1_Container','#Div_rnc_script3_Container','#Div_rnc_script8_Container','#Div_rnc_script9_Container',
'#Div_rbs_script1_Container','#Div_rbs_script2_Container','#Div_rbs_script3_Container','#Div_rbs_script15_Container','#Div_rbs_script16_Container',
'#Div_fback_script15_Container',
],
notshow:[]

}


var rip_replace_status =
    {
        nonOss:['#rnc_script1','#rnc_script3','#rbs_script8','#rbs_script9','#rbs_script1','#rbs_script2','#rbs_script3','#rbs_script15','#rbs_script16',
            '#fback_script15'],
        Oss:[]
        
    }

var newsiteadd =
{
whattoshow:['#act6','#rbs','#rnc','#oss','#Div_rnc_script10_Container','#Div_rnc_script11_Container',
'#Div_rbs_script17_Container','#Div_rbs_script18_Container','#Div_rbs_script19_Container',
'#Div_oss_script1_Container','#Div_oss_script2_Container','#Div_oss_script3_Container','#Div_oss_script4_Container','#Div_oss_script5_Container'
],
notshow:[]
}

var newsiteadd_status =
    {
        nonOss:['#rnc_script10','#rnc_script11','#rbs_script17','#rbs_script18','#rbs_script19'],
        Oss:['#oss_script1','#oss_script2','#oss_script3','#oss_script4','#oss_script5']
        
    }
    
 function showUploader(triggerID, destID, associationIndex, model) {
     
                alert("hi");
		j(destID).replaceWith("<input type='file' name='data[" + model + "][" + associationIndex + "][file]' id='" + destID +"' />");
		j(triggerID).remove();
	}   
j(document).ready(function() {

switch(j('#doc_type').val())
{
    case 'addsl':
        showrequired();
        break;
    case 'modifysl':
        showrequired();
        break;
    default :
        break;
}



});
function showrequired()
{
worklocationChanged();
accessmethodChanged();
regionChanged();
mopused();
mop_problem_check();
alarmShow();
precheckcommentsShow();
postcheckcommentsShow();
activityselect();
//showScriptfields();

}

function regionChanged()
{
      
    var reg=jQuery.trim(j('#region').val());                
    if(reg == 'North West' || reg == 'South West')
    {
        j('#tcm_west').show();
        j('#tcm_east').hide();
        j('#tcm_central').hide();
    }
    else if(reg == 'North East' || reg == 'South East')
    {
        j('#tcm_west').hide();
        j('#tcm_east').show();
        j('#tcm_central').hide();
    }
    else if(reg == 'North Central' || reg == 'South Central')
    {
        j('#tcm_west').hide();
        j('#tcm_east').hide();
        j('#tcm_central').show();
    }
    else
    {
        j('#tcm_west').hide();
        j('#tcm_east').hide();
        j('#tcm_central').hide();
    }
				
				
    var tempC=jQuery.trim(j('#tcm_name_signum_C').val());
    var tempE=jQuery.trim(j('#tcm_name_signum_E').val());
    var tempW=jQuery.trim(j('#tcm_name_signum_W').val());
    if(tempC != "")
        j('#tcm_name_signum').val(tempC);  				
    else if(tempE != "")                        
        j('#tcm_name_signum').val(tempE);  
    else if(tempW != "")    
        j('#tcm_name_signum').val(tempW);

    
}


function valuechangedOSS(container){

var oss_res=null;
var containertoshow=null;

var contid = j(container).attr("id");
var contval = j(container).is(':checked');


var oss_patt = 'oss_script([0-9]+)';


oss_res = contid.match(oss_patt);

if(oss_res!=null)
{
    containertoshow = "#Div_oss_script"+oss_res[1]+"_status";

}

switch(contval)
{
    case true:
        j(containertoshow).show();

        break;

    default:
        j(containertoshow).hide();

        break;

}


}


function hideFields()
{
j('#alarmcomments_tmo').hide();
j('#postcheckcomments_tmo').hide();
j('#precheckcomments_tmo').hide();
j('#Div_IssueOwner').hide();
j('#Div_MOPProblem_Desc').hide();
j('#Div_Activity_Other').hide();
j('#Div_TmobileWorkLocation_Other ').hide();
j('#Div_AccessMethod_Sonar').hide();
j('#Div_MOPUsed_Version').hide();

}
function activityChanged(container)
{


switch(jQuery.trim(j(container).val()))
{
    case 'Successful with issues - Follow-up Required':
        j('#Div_IssueOwner').show();
        break;

    default:

        j('#Div_IssueOwner').hide();

        break;
}

}
function alarmShow()
{

var contval = j('#alarms_tmo').is(':checked');

if(contval==true)
{
    j('#alarmcomments_tmo').show();

}
else
    j('#alarmcomments_tmo').hide();
}

function precheckcommentsShow()
{
var contval = j('#pre_check_tmo').is(':checked');
if(contval==true)
{
    j('#precheckcomments_tmo').show();

}
else
    j('#precheckcomments_tmo').hide();
}

function postcheckcommentsShow()
{
var contval = j('#post_check_tmo').is(':checked');
if(contval==true)
{
    j('#postcheckcomments_tmo').show();

}
else
    j('#postcheckcomments_tmo').hide();
}
function mop_problem_check(){

switch(jQuery.trim(j('#mop_problem').val()))
{

    case 'Yes':

        j('#Div_MOPProblem_Desc').show();
        break;

    default:

        j('#Div_MOPProblem_Desc').hide();
        break;
}
}
function hideall(){

j(".tohide").hide();


}
function selection_changed(container)
{
var rnc_res =null,rbs_res=null,fback_res=null;
var contid = j(container).attr("id");
var containertoshow = null;
var contval = jQuery.trim(j(container).val());
var rnc_patt = 'rnc_script([0-9]+)_status';
var rbs_patt = 'rbs_script([0-9]+)_status';
var fback_patt = 'fback_script([0-9]+)_status';

rnc_res = contid.match(rnc_patt);
rbs_res = contid.match(rbs_patt);
fback_res = contid.match(fback_patt);



if(rnc_res!=null)
{
    containertoshow = "#Div_rnc_script"+rnc_res[1]+"_status_Fail";

}
else if(rbs_res!=null)
{
    containertoshow = "#Div_rbs_script"+rbs_res[1]+"_status_Fail";


}
else if(fback_res!=null)
{
    containertoshow = "#Div_fback_script"+fback_res[1]+"_status_Fail";


}

switch(contval)
{
    case 'Not Loaded Successfully' :
        j(containertoshow).show();
        break;

    default:
        j(containertoshow).hide();
        break;
}

}
function valuechanged(container)
{

var rnc_res =null,rbs_res=null,fback_res=null,oss_res=null;
var containertoshow=null;
var commentsfield=null;
var contid = j(container).attr("id");
var contval = j(container).is(':checked');

var rnc_patt = 'rnc_script([0-9]+)';
var rbs_patt = 'rbs_script([0-9]+)';
var fback_patt = 'fback_script([0-9]+)';


rnc_res = contid.match(rnc_patt);
rbs_res = contid.match(rbs_patt);
fback_res = contid.match(fback_patt);

if(rnc_res!=null)
{
  
    containertoshow = "#Div_rnc_script"+rnc_res[1]+"_status";
    commentsfield = "#Div_rnc_script"+rnc_res[1]+"_status_Fail";

}
else if(rbs_res!=null)
{
    
    containertoshow = "#Div_rbs_script"+rbs_res[1]+"_status";
    commentsfield = "#Div_rbs_script"+rbs_res[1]+"_status_Fail";

}
else if(fback_res!=null)
{
    containertoshow = "#Div_fback_script"+fback_res[1]+"_status";
    commentsfield = "#Div_fback_script"+fback_res[1]+"_status_Fail";

}
else if(oss_res!=null)
{
    containertoshow = "#Div_oss_script"+oss_res[1]+"_status";

}


switch(contval)
{
    case true:
        j(containertoshow).show();

        j(commentsfield).hide();
        break;

    case false:
        j(containertoshow).hide();

        j(commentsfield).hide();
        break;



}

}

function activityselect()
{

switch(jQuery.trim(j('#activity_type').val()))
{

    case '2nd Carrier Add':

        hideall();

        for(var i=0;i<secondcarrieradd.whattoshow.length;i++)
        {
            j(secondcarrieradd.whattoshow[i]).show();
        }
        for(var i =0;i < secondcarrier_status.nonOss.length;i++)
        {

            valuechanged(secondcarrier_status.nonOss[i]);
            selection_changed(secondcarrier_status.nonOss[i]+'_status');
        }
        
        break;
    case 'Split Power-2nd Carrier Add':
        hideall();
        for(var i=0;i<splitpower.whattoshow.length;i++)
        {
            j(splitpower.whattoshow[i]).show();
        }
        
        for(var i=0;i<splitpower_status.nonOss.length;i++)
        {
            valuechanged(splitpower_status.nonOss[i]);
            selection_changed(splitpower_status.nonOss[i]+'_status');
        }
        break;

    case 'ATM to Hybrid':
        hideall();
        for(var i=0;i<atm_hybrid.whattoshow.length;i++)
        {
            j(atm_hybrid.whattoshow[i]).show();
        }
        for(var i=0;i<atm_hybrid_status.nonOss.length;i++)
        {
            valuechanged(atm_hybrid_status.nonOss[i]);
            selection_changed(atm_hybrid_status.nonOss[i]+'_status');
        }

        break;
    case 'Hybrid to IP Migration':
        hideall();
        for(var i=0;i<hybrid_ip.whattoshow.length;i++)
        {
            j(hybrid_ip.whattoshow[i]).show();
        }
        
        for(var i=0;i<hybrid_ip_status.nonOss.length;i++)
        {
            valuechanged(hybrid_ip_status.nonOss[i]);
            selection_changed(hybrid_ip_status.nonOss[i]+'_status');
        }
        break;

    case 'Rip and Replace':

        hideall();
        for(var i=0;i<rip_replace.whattoshow.length;i++)
        {
            j(rip_replace.whattoshow[i]).show();
        }
        for(var i=0;rip_replace_status.nonOss.length;i++)
        {
            valuechanged(rip_replace_status.nonOss[i]);
            selection_changed(rip_replace_status.nonOss[i]+'_status');
        }
        break;

    case 'New Site Add' :

        hideall();
        for(var i=0;i<newsiteadd.whattoshow.length;i++)
        {
            j(newsiteadd.whattoshow[i]).show();
        }
        for(var i=0;i< newsiteadd_status.nonOss.length;i++)
        {
            valuechanged(newsiteadd_status.nonOss[i]);
            selection_changed(newsiteadd_status.nonOss[i]+'_status');
        }
        for(var i=0;i< newsiteadd_status.Oss.length;i++)
        {
            valuechangedOSS(newsiteadd_status.Oss[i]);
            ossSelectionchanged(newsiteadd_status.Oss[i]+'_status');
        }
        
        break;

    case 'Other':
        hideall();
        j('#Div_Activity_Other').show();
        break;

    default:
        hideall();
        break;
}

}

function worklocationChanged()
{


switch(jQuery.trim(j('#work_location_tmobile').val()))
{

    case 'Remote':

        j('#Div_TmobileWorkLocation_Other').show();
        break;
    case 'Onsite(Customer)':

        j('#Div_TmobileWorkLocation_Other').show();
        break;
    case 'Other':

        j('#Div_TmobileWorkLocation_Other').show();
        break;
    default:

        j('#Div_TmobileWorkLocation_Other ').hide();
        break;
}

}

function accessmethodChanged()
{

switch(jQuery.trim(j('#access_method').val()))
{

    case 'Sonar':

        j('#Div_AccessMethod_Sonar').show();
        break;

    default:

        j('#Div_AccessMethod_Sonar').hide();
        break;
}


}

function mopused()
{

switch(jQuery.trim(j('#mop_used').val()))
{
    case 'Yes':
        j('#Div_MOPUsed_Version').show();
        j('#mop_problem').show();
        break;

    default:

        j('#Div_MOPUsed_Version').hide()
        j('#mop_problem').hide();
        break;
}

}
function ossSelectionchanged(container)
{
var oss_res =null;
var containertoshow = null;
var contid = j(container).attr("id");

var contval = jQuery.trim(j(container).val());

var oss_patt = 'oss_script([0-9]+)';

oss_res = contid.match(oss_patt);

if(oss_res!=null)
{
    containertoshow = "#Div_oss_script"+oss_res[1]+"_status_Fail";
}

switch(contval)
{
    case 'Partially Imported and Activation Successful':
        j(containertoshow).show();
        break;
    case 'Imported Successfully and Activation Not Successful':
        j(containertoshow).show();
        break;
    case 'Partially Imported and Activation Not Successful':
        j(containertoshow).show();
        break;
    case 'Not Imported Successfully and No Activation':
        j(containertoshow).show();
        break;
    default:
        j(containertoshow).hide();
}
}
