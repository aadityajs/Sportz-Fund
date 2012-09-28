<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Config Extended Library
*
* This class extends the config to a database. Based on class written by Tim Wood (aka codearachnid).
*
* @package       CodeIgniter
* @subpackage    Extended Libraries
* @author        Arnas Lukosevicius (aka steelaz)
* @link          http://www.arnas.net/blog/
*
*/

class MY_Config extends CI_Config

{

    /**
     * CodeIgniter instance
     *
     * @var object
     */
    private $CI = NULL;

    /**
     * Database table name
     *
     * @var string
     */

    private $table = 'settings';

    public function __construct()

    {  parent::__construct();

    }

    public function load_db_items()

    {

        if (is_null($this->CI)) $this->CI = get_instance();
        $query = $this->CI->db->get($this->table);
		$res=$query->result_array();

		foreach($res as $rec){
			$this->set_item($rec['key'],$rec['value']);
			
		}

    }


}



/* End of file MY_Config.php */

/* Location: ./application/libraries/MY_Config.php */  