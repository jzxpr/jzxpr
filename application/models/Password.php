<?php
/**
 * jzxpr
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
    
    /**
     * Decrypt by ID 
     * 
     * @param   int     $id
     * @return  string
    */
    public function decryptById( $id )
    {
        $data = $this->getById( $id );
        if( !empty( $data ) ) {
            
        }
    }
    
    /**
     * Insert
     *
     * @param   array	$data
     * @return  mixed
    */
    public function insert( $data = array() )
    {
        if( empty( $data ) ) {
            return false;
        }
    
        // get column names for filtering
        $columnNames = fetchColumns( $this->tableName );
    
        // filter
        foreach( $data AS $key => $value ) {
            if( !in_array( $key, $columnNames ) ) {
                unset( $data[$key] );
            }
        }
    
        // check after filtering
        if( empty( $data ) ) {
            return false;
        }
        
        // START:   Password Encryption
        if( isset( $data['password'] ) ) {          
            $encryptedPassword  = encrypt_openssl( $data['password'], SITE_PUBLIC_KEY_PATH );
            $data['password']   = $encryptedPassword;
        }
        // END:     Password Encryption
        
        if( !strlen( trim( $data['description'] ) ) ) {
            unset( $data['description'] );    
        }
        
        if( !strlen( trim( $data['comment'] ) ) ) {
            unset( $data['comment'] );
        }
        
        // date added
        $data['date_added'] = time();
    
        $count	= count( $data );
        $i		= 0;
    
        // start the query
        $sql = "INSERT INTO `".$this->tableName."` ( ";
    
        foreach( $data AS $key => $value ) {
            $i++;
            $comma = ( $i < $count ) ? ', ' : ' ';
            $key = mysqli_real_escape_string( $this->db, $key );
            $sql .= "`".mysqli_real_escape_string( $this->db, $key )."` ".$comma;
        }
    
        $sql .= " ) VALUES ( ";
    
        $i = 0;
        foreach( $data AS $key => $value ) {
            $i++;
            $comma = ( $i < $count ) ? ', ' : ' ';
            $value = mysqli_real_escape_string( $this->db, $value );
            $sql .= "'".mysqli_real_escape_string( $this->db, $value )."' ".$comma;
        }
    
        $sql .= ");";
        $res = mysqli_query( $this->db, $sql ) OR die( '<pre>SQL Error:  '.mysqli_error( $this->db ).'<br>SQL:  '.$sql.'<br>File:  '.__FILE__.'<br>Line:  '.__LINE__ );
    
        return mysqli_insert_id( $this->db );
    }    
	
    // END OF THIS CLASS
}