<?php
/**
 * jzxpr
 * Password Controller
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2012 - 2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link        http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since  	    Thursday, May 07, 2015, 03:48 PM GMT+1
 * @modified    $Date$ $Author$
 * @version     $Id$
 *
 * @category    Controllers
 * @package     jzxpr
*/

class PasswordController extends Zend_Controller_Action
{	
    private $_Password;
    
    public function init() 
    {
        $this->_Password = new Password;
    }
    
    public function indexAction() {}
    
    public function addAction() 
    {
        $Password_Category = new Password_Category;
        $category = $Password_Category->getAll();
        
        $this->view->category = $category;        
    }
    
    public function ajaxAction()
    {
        $this->_helper->viewRenderer->setNoRender( true );
    
        if( !empty( $_POST ) ) {
            header('Content-Type: application/json');
            	
            $method = $_POST['method'];
            $json	= array();
            	
            switch( $method ) {
                case 'passwordDecrypt':
                    $result	= (int)$this->_Password->decryptById( $_POST['id'] );
                    
                    if( $result > 0 ) {
                        $json['status'] = 'OK';
                    } else {
                        $json['status'] = 'ERROR';
                        $json['error']	= $result;
                    }
                    
                    break;
                    
                case 'passwordAdd':
                    $result	= (int)$this->_Password->insert( $_POST['data'] );
    
                    if( $result > 0 ) {
                        $json['status'] = 'OK';
                    } else {
                        $json['status'] = 'ERROR';
                        $json['error']	= $result;
                    }
                    
                    break;
    
                default:
                    $json['status'] = 'ERROR';
                    $json['error']	= 'UNHANDLED_EXCEPTION';
            }
            	
            exit( json_encode( $json ) );
        } else {
            header( 'Location: '.BASEURL.'');
        }
    }
}