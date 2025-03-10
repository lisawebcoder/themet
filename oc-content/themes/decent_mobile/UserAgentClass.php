<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com).
	*
	*/
?>

<?php

    /**
     * Description of UserAgentClass
     */
    class UserAgent {
        
        private $user_agent       = null;
        private $mobile_platforms = array();
        
        private $is_mobile        = false;
        
        public function __construct( )
        {
            $this->_load_data( );
            
            if ( !is_null($this->user_agent) ) {
                $this->_set_platform( ) ;
            }
        }
        
        /* Private */
        private function _load_data( )
        {
            include dirname( osc_plugin_path(__FILE__) ) . '/user_agents.php' ;
            
            if ( isset($_SERVER['HTTP_USER_AGENT']) ) {
                $this->user_agent = trim($_SERVER['HTTP_USER_AGENT']) ;
            }
            
            if ( !is_null($this->user_agent) ) {
                $this->mobile_platforms = $mobiles ;
                unset($mobiles) ;
            }
        }
        
        private function _set_platform( )
        {
            if (is_array($this->mobile_platforms) AND count($this->mobile_platforms) > 0) {
                foreach ($this->mobile_platforms as $key => $val) {
                    if (false !== (strpos(strtolower($this->user_agent), $key))) {
                        $this->is_mobile = true ;
                    }
                }
            }
        }
        
        /* Public */
        public function is_mobile( )
        {
            return $this->is_mobile ;
        }
    }

?>