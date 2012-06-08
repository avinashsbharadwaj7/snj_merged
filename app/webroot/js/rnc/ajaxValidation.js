/**
 * @file 		ajaxValidation.js
 * @copyright	(c)2011, Best4u Media
 * @author		@MelvinvdBout
 * @return 		Javascript Object
 * @desc 		Javascript class to validate form with AJAX and trought the CAKE MODELS
 */
var ajaxValidation = (function(){
	
	return {
		
		/* 
		 * @method	doPost
		 * @author	@MelvinvdBout
		 * @version	1.0
		 * @desc	this action is called from the view when someone clicks the submit button.
		 */
		doPost: function(settings){
			
			this.settings	= settings;
                        block_ui();
			var _this		= this;
			$.ajax({
				type: "POST",
				url: this.settings.url,
				data: this.settings.element.serialize(),
				success: function(data) {
					
					_this.readResponse(data);
					$.unblockUI();
				}
			});
		
		},
		
		/*
		 * @method	readResponse
		 * @author	@MelvinvdBout
		 * @version	1.0
		 * @desc	read the AJAX response and decide of there are any errors
		 */
		readResponse: function(data) {
			
			var data = $.parseJSON(data); // parse JSON to object
                        $('body').find('.error-message').remove();
			this.addValidation(data);
                        this.settings.callback(data);
		},
		
		/* 
		 * @method	addValidation
		 * @author	@MelvinvdBout
		 * @version 1.0
		 * @desc	foreach the object and append the error message on the right place
		 */
		addValidation: function(data) {
			
			var _this	= this;
			
			if(data.data) {
			
				$.each(data.data, function(model, fields) { 
					
					if(fields) {
						
						$.each(fields, function(field, message) { 
							
							var inputId	= '#' + _this.camelize(model+'_'+field);
							var element	= $('<div>' + message + '</div>')
											.attr({
												'class' : 'error-message'
											})
											.css ({
												display: 'none'
											});
													
							$(inputId).after(element);
							$(element).fadeIn();
							
						});
					}
					
				});
				
			}

		},
		
		/* @method	camelize
		 * @author	http://jamnite.blogspot.com/2009/05/cakephp-form-validation-with-ajax-using.html
		 * @version	1.0
		 * @desc	make from the first character and the one after every _ a capital letter
		 */
		camelize: function(string) {
			
        	var a = string.split('_'), i;
        	s = [];
        
        	for (i=0; i<a.length; i++){
            	s.push(a[i].charAt(0).toUpperCase() + a[i].substring(1));
        	}
        
        	s = s.join('');
        
        	return s;
    
		}
		
	}; 
	
});

$(document).ready(function(){

	var formId		= '#addModel';	// id of your form <form id=""
	var button		= '#submit';	// id of your submit <input id="" type="submit"
	var validate	= ajaxValidation();

	$("form").submit(function(){
                dirtyBit = false;
		var formId  = $(this).attr('id');
                if(formId.match("^LogFileAddForm")){
                    upload_files(formId);
                    return false;
                }
                formId = $("#"+formId);
                var	url = $(formId).attr('action');
		var element = $(formId);

		validate.doPost({
			url: url,
			element: element,
			callback: function(data) {
				update_message(data);
			}
		});

		return false; // prevent the browser from submitting the form the normal way
	});

});

function upload_files(formId){
    $("#"+formId).ajaxSubmit({
        beforeSubmit: function(){
            uploadDialog.dialog('close');
            block_ui();
        },
        success: function(data){
            data = $.parseJSON(data);
            if(data.error == 0){
                data.html = data.html.replace(/\\u003C/g, "<");
                data.html = data.html.replace(/\\u003E/g, ">");
                update_file_list(data);
            }
            update_message(data);
            $.unblockUI();
        }
    })
}

function block_ui(msg){
    if(msg == null)
        msg = "Saving..Please wait..";
    $.blockUI(({
        message: msg,
        css: {border: 'none', padding: '15px', backgroundColor : "#000", '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px', opacity: .5, color: '#fff'
        }
    }));
}

function update_file_list(data){
    $("#"+data.category+"_file_placeholder > .no_files").remove();
    $("#"+data.category+"_file_placeholder").append(data.html);
    
}