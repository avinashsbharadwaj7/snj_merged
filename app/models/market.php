<?php
class Market extends AppModel {
    public $name = 'Market';
    var $useTable = false;
    
    /*
    public $useDbConfig = 'array';

    public $records = array(
        array()
    );
    
    */
	
	
	public function getMarkets()
	{
       return array(  '0' => '--Select--'
                    , 'Indy' => 'Indy'
                    , 'Chicago' => 'Pittsburg'
                    , 'Texas' => 'Texas'
                    , 'Oklahoma' => 'Oklahoma'
                    , 'Arkansas' => 'Arkansas'
                    , 'Indy' => 'Indy'
                    , 'Chicago' => 'Chicago'
                    , 'Pittsburgh' => 'Pittsburgh'
                    , 'Texas' => 'Texas'
                    , 'Oklahoma' => 'Oklahoma'
                    , 'Arkansas' => 'Arkansas'
                    , 'Boston' => 'Boston'
                    , 'BridgePort' => 'BridgePort'
                    , 'Boston' => 'Boston'
                    , 'Virginia' => 'Virginia'
                    , 'Middletown' => 'Middletown'
                    , 'Vermont' => 'Vermont'
                    , 'Westbrook' => 'Westbrook'
                    , 'Atlanta' => 'Atlanta'
                    , 'Alabama' => 'Alabama'
                    , 'Jackson' => 'Jackson'
                    , 'Louisiana' => 'Louisiana'
                    , 'North Florida' => 'North Florida'
                    , 'Tennessee Kentucky' => 'Tennessee Kentucky'
                    , 'South Florida' => 'South Florida'
                    , 'Carolina' => 'Carolina'
                    , 'Bay Area' => 'Bay Area'
                    , 'Bali' => 'Bali'
                    , 'Alaska' => 'Alaska'
                    , 'Los Angeles' => 'Los Angeles'
                    , 'Sandiego' => 'Sandiego'
                    , 'Hawaii' => 'Hawaii'
                    , 'Wyoming' => 'Wyoming'
                   );
    }
}


