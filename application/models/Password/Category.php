<?php
/**
 * jzxpr
 * Password Category Model
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2013 - 2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link        http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since       Friday, May 08, 2015, 09:22 AM GMT+1 mknox
 * @edited      $Date$ $Author$
 * @version     $Id$
*/

class Password_Category extends Db
{
    public function __construct()
    {     
        $this->tableName = DB_TABLE_PREFIX.'password_category';
        parent::__construct( $this->tableName );
    }
	
    // END OF THIS CLASS
}