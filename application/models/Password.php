<?php
/**
 * BizLogic Base Framework
 * Password Model
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2013 - 2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link        http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since       Thursday, May 07, 2015, 02:08 PM GMT+1 mknox
 * @edited      $Date: 2014-04-29 16:28:16 -0700 (Tue, 29 Apr 2014) $ $Author: hire@bizlogicdev.com $
 * @version     $Id: Phrases.php 38 2014-04-29 23:28:16Z hire@bizlogicdev.com $
*/

class Password extends Db
{
    public function __construct()
    {     
        $this->tableName = DB_TABLE_PREFIX.'password';
        parent::__construct( $this->tableName );
    }
	
    // END OF THIS CLASS
}