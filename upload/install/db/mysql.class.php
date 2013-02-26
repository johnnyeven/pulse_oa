<?php
//include("config.php");   
if(!defined('db_host')) define('db_host','localhost');
if(!defined('db_user')) define('db_user','winxdvd_log');
if(!defined('dbpw')) define('dbpw','57M^#y;V.%(U');
if(!defined('dbname')) define('dbname','winxdvd_ad_log_201109');
if(!defined('dbcharset')) define('dbcharset','utf8');

class mysql {
    var $querynum = 0;
    var $link;

    private $dbhost = db_host;
    private $dbname = dbname;
    private $dbuser = db_user;
    private $dbpw = dbpw;
    private $dbcharset = dbcharset;

    function mysql($dbhost='', $dbuser='', $dbpw='', $dbname = '', $pconnect = 0) {
    
        $dbhost==''?$dbhost=$this->dbhost:$dbhost;
        $dbuser==''?$dbuser=$this->dbuser:$dbuser;
        $dbpw==''?$dbpw=$this->dbpw:$dbpw;
        $dbname==''?$dbname=$this->dbname:$dbname;
    
        if($pconnect) {
            if(!$this->link = @mysql_pconnect($dbhost, $dbuser, $dbpw)) {
                $this->halt('Can not connect to MySQL server');
            }
        } else {
            if(!$this->link = mysql_connect($dbhost, $dbuser, $dbpw)) {
                $this->halt('Can not connect to MySQL server');
            }
        }
        if($this->version() > '4.1') {
            if($this->dbcharset) {
                mysql_query("SET character_set_connection=$this->dbcharset, character_set_results=$this->dbcharset, character_set_client=binary", $this->link);
            }
    
            if($this->version() > '5.0.1') {
                mysql_query("SET sql_mode=''", $this->link);
            }
        }
    
        if($dbname) {
            mysql_select_db($dbname, $this->link);
        }
    }

    function select_db($dbname) {
        return mysql_select_db($dbname, $this->link);
    }

    function fetch_array($query, $result_type = MYSQL_ASSOC) {
        return mysql_fetch_array($query, $result_type);
    }

    function fetch_all($query, $result_type = MYSQL_ASSOC) {
        $result = array();
        $num = 0;
    
        while($ret = mysql_fetch_array($query, $result_type))
        {
            $result[$num++] = $ret;
        }
        return $result;
    }

    function fetch_row($query) {
        $query = mysql_fetch_row($query);
        return $query;
    }

    function result($query, $row) {
        $query = @mysql_result($query, $row);
        return $query;
    }

    function query($sql, $type = '') {
	
        $func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
            'mysql_unbuffered_query' : 'mysql_query';
        $query = mysql_query($sql, $this->link);
        if(!$query) {
        	exit($sql);
            $this->halt('MySQL Query Error: ', $sql);
        }
    	//if(defined("SQL_DEBUG")) echo $sql.'<br>';
        $this->querynum++;
        return $query;
    }

    function affected_rows() {
        return mysql_affected_rows($this->link);
    }

    function error() {
        return (($this->link) ? mysql_error($this->link) : mysql_error());
    }

    function errno() {
        return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
    }

    function num_rows($query) {
        $query = mysql_num_rows($query);
        return $query;
    }

    function num_fields($query) {
        return mysql_num_fields($query);
    }

    function free_result($query) {
        return mysql_free_result($query);
    }

    function insert_id() {
        return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
    }

    function fetch_fields($query) {
        return mysql_fetch_field($query);
    }

    function version() {
        return mysql_get_server_info($this->link);
    }

    function close() {
        return mysql_close($this->link);
    }

    function halt($message = '', $sql = '') {
        echo $message . ' ' . $sql;
        exit;
    }
}
?>