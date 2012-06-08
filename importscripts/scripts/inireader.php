<?php

class IniReader {
    static private $filename="";
    static private $section="";
    static private $ini = NULL; // contents of file read using parse_ini_file
    
    public function __construct($filename=NULL)
    {
        if (self::$ini != NULL)
        {
            return; // already read.
        }
        
        if ($filename == NULL)
        {
            $thisdir = realpath(dirname(__FILE__));
            self::$filename = $thisdir . '/../configs/application.ini';
        }
        else
        {
            self::$filename = $filename;
        }
        
        self::$section = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production';
        
        self::$ini = parse_ini_file(self::$filename, true);
        
    }
    
    public function getValue($paramName)
    {
        return self::$ini[self::$section][$paramName];
    }
}

?>