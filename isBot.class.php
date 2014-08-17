<?php 
class isBot{
	function __construct(){
		$this->why = '';
		$this->answer = self::isBot();
	}
	function isBot(){
        if(!empty($_SERVER['VIA'])):
			$this->why = 'VIA is Set.';
            return true;
        endif;
        if(!empty($_SERVER['REMOTE_PORT']) && in_array($_SERVER['REMOTE_PORT'], array(8080,80,6588,8000,3128,553,554))):
			$this->why = 'Connecting via Remote Port ' . $_SERVER['REMOTE_PORT'] . ' Only 8080,80,6588,8000,3128,553,554 Should be Used.';
            return true;
        endif;
        //if(!empty($_SERVER['REMOTE_ADDR']) && fsockopen($_SERVER['REMOTE_ADDR'], 80, $errno, $errstr, 30)): // this Causes Lag...
           // return false;
        //endif;
        if(empty($_SERVER['HTTP_ACCEPT_ENCODING'])):
			$this->why = 'Does not Accept Encoding.';
            return true;
        endif;
		if(empty($_SERVER['HTTP_CONNECTION'])):
			$this->why = 'Not an HTTP Connection';
			return true;
		endif;
        if(!empty($_SERVER['HTTP_VIA'])):
			$this->why = 'HTTP_VIA is Set to ' . $_SERVER['HTTP_VIA'];
            return true;
        endif;
        if(!empty($_SERVER['FORWARDED'])):
			$this->why = 'FORWARDED is Set to ' . $_SERVER['FORWARDED'];
            return true;
        endif;
        if(!empty($_SERVER['USERAGENT_VIA'])):
			$this->why = 'USERAGENT_VIA is set to' . $_SERVER['USERAGENT_VIA'];
            return true;
        endif;
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
			$this->why = 'HTTP_X_FORWARDED_FOR is set to' . $_SERVER['HTTP_X_FORWARDED_FOR'];
            return true;
        endif;
        if(!empty($_SERVER['HTTP_X_FORWARDED_HOST'])):
			$this->why = 'HTTP_X_FORWARDED_HOST is set to' . $_SERVER['HTTP_X_FORWARDED_HOST'];
            return true;
        endif;
        if(!empty($_SERVER['HTTP_X_FORWARDED_SERVER'])):
			$this->why = 'HTTP_X_FORWARDED_SERVER is set to' . $_SERVER['HTTP_X_FORWARDED_SERVER'];
            return true;
        endif;
        if(!empty($_SERVER['PROXY_CONNECTION'])):
			$this->why = 'PROXY_CONNECTION is set to' . $_SERVER['PROXY_CONNECTION'];
            return true;
        endif;
        if(!empty($_SERVER['XPROXY_CONNECTION'])):
			$this->why = 'XPROXY_CONNECTION is set to' . $_SERVER['XPROXY_CONNECTION'];
            return true;
        endif;
        if(!empty($_SERVER['HTTP_PC_REMOTE_ADDR'])):
			$this->why = 'HTTP_PC_REMOTE_ADDR is set to' . $_SERVER['HTTP_PC_REMOTE_ADDR'];
            return true;
        endif;
        if(!empty($_SERVER['HTTP_CLIENT_IP'])):
			$this->why = 'HTTP_CLIENT_IP is set to' . $_SERVER['HTTP_CLIENT_IP'];
            return true;
        endif;
        //Filter Facebook Bot.
        if(strpos($_SERVER['HTTP_USER_AGENT'],'+http://www.facebook.com/externalhit_uatext.php')):
			$this->why = 'Facebook Bot';
            return true;
        endif;
        //Filter Google+ Snippet.
        if(strpos($_SERVER['HTTP_USER_AGENT'],'+https://developers.google.com/+/web/snippet/')):
			$this->why = 'Google Snippet Bot';
            return true;
        endif;
        //Filter Google Bot - Initiates after successful share.
        if(strpos($_SERVER['HTTP_USER_AGENT'],'+http://www.google.com/bot.html')):
			$this->why = 'Google Bot';
            return true;
        endif;
        //Filter Pinterest Bot.
        if(strpos($_SERVER['HTTP_USER_AGENT'],'+http://pinterest.com/')):
			$this->why = 'Google Bot';
            return true;
        endif;
        //Allow only Mozilla and Opera Based Browsers.
        if(!preg_match( '/^(Mozilla|Opera)/', $_SERVER['HTTP_USER_AGENT'])):
			$this->why = 'Not an acceptable User Agent. Yours is ' . $_SERVER['HTTP_USER_AGENT'];
            return true;
        endif;
        return false;
	}	
}
