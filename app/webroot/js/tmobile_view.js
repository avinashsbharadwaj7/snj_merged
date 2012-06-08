var j = jQuery.noConflict();

var doc1;

var secondcarrieradd = 
{
    whattoshow:['#rnc','#rbs','#rnc_script1_div','#rnc_script2_div','#rnc_script3_div','#rbs_script1_div','#rbs_script2_div','#rbs_script3_div'],
    notshow:[]
    
}
    
var splitpower = 
{
    whattoshow:['#rnc','#rbs','#fback','#rnc_script3_div','#rnc_script4_div','#rbs_script1_div','#rbs_script2_div','#rbs_script3_div','#fback_script1_div'],
    notshow:[]
    
}
    
var atm_hybrid = 
{
    whattoshow:['#rnc','#rbs','#fback','#rnc_script5_div','#rbs_script4_div','#rbs_script5_div','#rbs_script6_div','#rbs_script7_div','#rbs_script8_div',
    '#fback_script2_div','#fback_script3_div','#fback_script4_div','#fback_script5_div','#fback_script6_div','#fback_script7_div'],
    notshow:[]
    
}
    
var hybrid_ip = 
{
    whattoshow:['#rnc','#rbs','#fback','#rnc_script6_div','#rnc_script7_div','#rbs_script9_div','#rbs_script10_div','#rbs_script11_div','#rbs_script12_div','#rbs_script13_div','#rbs_script14_div',
    '#fback_script8_div','#fback_script9_div','#fback_script10_div','#fback_script11_div','#fback_script12_div','#fback_script13_div','#fback_script14_div'],
    notshow:[]
    
}
var rip_replace =
{
        
    whattoshow:['#rnc','#rbs','#fback','#rnc_script1_div','#rnc_script3_div','#rnc_script8_div','#rnc_script9_div','#rbs_script1_div','#rbs_script2_div','#rbs_script3_div','#rbs_script15_div','#rbs_script16_div',
    '#fback_script15_div'],
    notshow:[]
        
}

var newsiteadd =
{
    whattoshow:['#rnc','#rbs','#oss','#rnc_script10_div','#rnc_script11_div','#rbs_script17_div','#rbs_script18_div','#rbs_script19_div',
        '#oss_script1_div','#oss_script2_div','#oss_script3_div','#oss_script4_div','#oss_script5_div'],
    notshow:[]
}
    
j(document).ready(function() {
    //hideall();
    activityselect();
});
 

function hideall(){
    j(".hide_class").hide();
         
         
}     

     
function activityselect()
{
    var temp = document.getElementById("activity_type_selected");
    var save_temp = temp.innerHTML;
                   
    switch(save_temp)
    {
                                    
        case '2nd Carrier Add':
            hideall();
            for(var i=0;i<secondcarrieradd.whattoshow.length;i++)
            {
                j(secondcarrieradd.whattoshow[i]).show();
            }
                    
            break;
        case 'Split Power-2nd Carrier Add':
            hideall();
            for(var i=0;i<splitpower.whattoshow.length;i++)
            {
                j(splitpower.whattoshow[i]).show();
            }
            break;
                
        case 'ATM to Hybrid':
            hideall();
            for(var i=0;i<atm_hybrid.whattoshow.length;i++)
            {
                j(atm_hybrid.whattoshow[i]).show();
            }
                
            break;
        case 'Hybrid to IP Migration':
            hideall();	
            for(var i=0;i<hybrid_ip.whattoshow.length;i++)
            {
                j(hybrid_ip.whattoshow[i]).show();
            }
               
            break;
                
        case 'Rip and Replace':
                  
            hideall();
            for(var i=0;i<rip_replace.whattoshow.length;i++)
            {
                j(rip_replace.whattoshow[i]).show();
            }
                
            break;
        case 'New Site Add' :
         
            hideall();
            for(var i=0;i<newsiteadd.whattoshow.length;i++)
            {
                j(newsiteadd.whattoshow[i]).show();
            }
            break;
           
        case 'Other':
            hideall();
            j('#Div_Activity_Other').show();
            break;
                
        default:
            //hideall();
            break;
    }
    
}
