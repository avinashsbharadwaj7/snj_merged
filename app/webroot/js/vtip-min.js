/**
Vertigo Tip by www.vertigo-project.com
Requires jQuery
*/
this.vtip=function(){this.xOffset=-5;this.yOffset=15;jQuery(".vtip").unbind().hover(
    function(a){
        this.t=this.title;this.title="";
        this.top=(a.pageY+yOffset);this.left=(a.pageX+xOffset);
        jQuery("body").append('<div id="vtip"><div id="vtipArrow"></div>'+this.t+"</div>");
        //jQuery("div#vtip #vtipArrow").attr("src","../img/vtip_arrow.png");
        jQuery("div#vtip").css("top",this.top+"px").css("left",this.left+"px").fadeIn("slow")},
    function(){
        this.title=this.t;jQuery("div#vtip").fadeOut("slow").remove()
    }).mousemove(function(a){
        this.top=(a.pageY+yOffset);
        this.left=(a.pageX+xOffset);
        jQuery("div#vtip").css("top",this.top+"px").css("left",this.left+"px")})};
    jQuery(document).ready(function(a){vtip()});