<?php
namespace Libs;

use PDO;

class Main {

    public $db;
    public $db_rd;

	public function dbconnect(){        
		if(!$this->db){		
			try {
        		if(isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
                    $dsn = getenv('PROD_DSN');
                    $user = getenv('PROD_USER');
                    $password = getenv('PROD_PASSWORD');
                    $dsn_rd = getenv('PRODRD_DSN');
                    $user_rd = getenv('PRODRD_USER');
                    $password_rd = getenv('PRODRD_PASSWORD');
                }else{
                    $dsn = getenv('DEV_DSN');
                    $user = getenv('DEV_USER');
                    $password = getenv('DEV_PASSWORD');
                    $dsn_rd = $dsn;
                    $user_rd = $user;
                    $password_rd = $password;
                }
				$this->db = new PDO($dsn, $user, $password);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//$this->db_rd = new PDO($dsn_rd, $user_rd, $password_rd);
				//$this->db_rd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db_rd = $this->db;
			} catch (PDOException $e) {
				die('DB Connection Failure.');
				//die('Connection failed: '.$conn_env.' ' . $e->getMessage());
			}
		};
	}

	public function fetchAll($sql_cnt,$sql,$filters,$vals,$page,$rows,$sortField,$sortOrder){
        try {  
		    $this->dbconnect();

			$page = (isset($page))?$page:1;
			$pagesize = (isset($rows))?$rows:25;
			$start = ($page-1) * $pagesize;

			$filters = json_decode($filters);
			$filter = '';
			if(count($filters)>0){
				foreach( $filters as $key=>$val){
					switch(@$val->o) {
						case 'contains':
							$value = $this->db->quote('%'.$val->v.'%');
							$filter.= " AND ".$val->f." LIKE $value";
							break;
						case 'begins with':
							$value = $this->db->quote($val->v.'%');
							$filter.= " AND ".$val->f." LIKE $value";
							break;
						case 'ends with':
							$value = $this->db->quote('%'.$val->v);
							$filter.= " AND ".$val->f." LIKE $value";
							break;
						default:
							$value = $this->db->quote($val->v);
							$filter.= " AND ".$val->f." ".$val->o." $value";
					}
				}
			};
			$filter = str_replace(';','',$filter);
			//die($filter);
			if($sortField!='undefined' && $sortField!=''){
				$sortOrder = (@$sortOrder=='1')?'ASC':'DESC';
				$order = ' ORDER BY `'.$sortField.'` '.$sortOrder;
			}else{
				$order = '';
			}
			if($rows>=0){
				$limit = ' LIMIT '.$start.','.$rows;
			}else{
				$limit = '';
			}
			//die($sql.$filter.$order.$limit);
			$rs = $this->db->prepare($sql_cnt.$filter);
			$rs->execute($vals);
			$row_rs = $rs->fetch(PDO::FETCH_ASSOC);
			$rs_totalRows = $row_rs['cnt'];

			$rs = $this->db->prepare($sql.$filter.$order.$limit);
			$rs->execute($vals);
			$rs_cnt = $rs->rowCount();
			$rows = array();

			while($r = $rs->fetch(PDO::FETCH_ASSOC) ) {
				$rows[] = $r;
			}

			$embedded = explode('/api/',$_SERVER['REQUEST_URI']);
			$embedded = $embedded[1];
			$embedded = explode('?',$embedded);
			$embedded = $embedded[0];
			$ret = array(
                '_embedded' => array(
                    $embedded => $rows
                ),
				'page' => (int) $page,
				'page_count' => (int) ceil($rs_totalRows/$pagesize),
				'page_size' => (int) $pagesize,			
				'total_items' => (int) $rs_totalRows
            );

			return $ret;			

        } catch (\PDOException $e) {
            return $e;
		}
	}

	public function PDOerror($e) {
		$errorInfo = explode(':',$e->getMessage());
		$err = array(
			'title' => $errorInfo[1]
			,'detail' => $errorInfo[2]
			,'status' => 405
		);
		return json_encode($err);		
	}    

   public function method1($request, $response, $args) {
        /*if (authorizedUser()) {
        echo '<p>Welcome authorized user</p>';
        syslog(LOG_INFO, 'Authorized access');
        } else {
        echo 'Go away unauthorized user<p />';
        syslog(LOG_WARNING, "Unauthorized access");
        }*/
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method1';
   }
   
   public function method2($request, $response, $args) {
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method2';
   }
      
   public function method3($request, $response, $args) {
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method3';
   }
}
