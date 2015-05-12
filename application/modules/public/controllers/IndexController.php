<?php
/**
 * jzxpr
 * Index Controller
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2012 - 2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link        http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since  	    Tuesday, November 27, 2012, 04:18 PM GMT+1
 * @modified    $Date: 2014-10-13 11:46:37 +0200 (Mon, 13 Oct 2014) $ $Author: hire@bizlogicdev.com $
 * @version     $Id: IndexController.php 109 2014-10-13 09:46:37Z hire@bizlogicdev.com $
 *
 * @category    Controllers
 * @package     jzxpr
*/

class IndexController extends Zend_Controller_Action
{	
    public function init() {}
    
    public function indexAction() 
    {        
        $Password       = new Password();
        $passwordList   = $Password->get( 50 );
        
        $this->view->passwords = $passwordList;
    }
}