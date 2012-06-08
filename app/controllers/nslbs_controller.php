<?php
class NslbsController extends AppController {
    
	var $name = 'Nslb';
	var $uses = array('Nslb');
    var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker','Paginator','databaseFields','javascript','ntpdropdownLogics');
    var $components = array('Session', 'Email', 'RequestHandler');
	
        function index() {
	}
}