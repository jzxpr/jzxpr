<?php
/**
 * jzxpr
 * Password
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link        http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since  	    Thursday, May 07, 2015, 04:42 PM GMT+1
 * @modified    $Date: 2014-10-13 11:46:37 +0200 (Mon, 13 Oct 2014) $ $Author: hire@bizlogicdev.com $
 * @version     $Id: IndexController.php 109 2014-10-13 09:46:37Z hire@bizlogicdev.com $
 *
 * @category    Controllers
 * @package     jzxpr
*/

class Password
{	   
    /**
     * Encrypt a string
     * 
     * @param   string  $key
     * @param   string  $string
     * @return  string
    */ 
    public function encrypt( $key, $string ) 
    {
        $encrypted = mcrypt_encrypt( 
            MCRYPT_RIJNDAEL_256, 
            $key, 
            $text, 
            MCRYPT_MODE_ECB 
        );

        return $encrypted;
    }
    
    /**
     * Decrypt a string
     *
     * @param   string  $key
     * @param   string  $string
     * @return  string
    */    
    public function decrypt( $key, $string )
    {
        $decrypted = mcrypt_decrypt( 
            MCRYPT_RIJNDAEL_256, 
            $key, 
            $string, 
            MCRYPT_MODE_ECB
        );

        return $decrypted;
    }
}