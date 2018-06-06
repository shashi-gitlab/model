<?php
	require_once"db_connect.php";

	abstract class db_helper extends db_connect{

		function insert($table, $col, $values)
		{
			$str="insert into $table ($col) values($values)";

			$result=mysqli_query($this->conn,$str) or die(mysqli_error($this->conn));
			// var_dump($result);
		}
		
		function update($table, $record, $cond)
		{
			$str ="update $table set $record where $cond";
			$result= mysqli_query($this->conn, $str) or die(mysqli_error($this->conn));
		}
		
		function delete($table, $cond)
		{
			$str="delete from $table where $cond";
			$result= mysqli_query($this->conn, $str) or die(mysqli_error($this->conn));
		}
		
		function select($col,$table,$condition)
		{

			$str = "select $col from $table where $condition";
			// echo $str;
			$result=mysqli_query($this->conn,$str) or die(mysqli_error($this->conn));
			// var_dump($result);
			// pre($result);

			if ($result->num_rows>0) 
			{
				//fetch_array() = MYSQL_BOTH,MYSQL_NUM,MYSQL_ASSOC
				// while($ans = $result->fetch_array(MYSQL_NUM))
				while($ans = $result->fetch_object())
				{
					// pre($ans);
					$data[] = $ans;
				}
				return $data;
			}
			else
			{
				return "No data found";
			}

		}
		
		function cnt($table, $cond)
		{
			$ans = $this->select("count(*) as cnt",$table,$cond);
			// pre($ans);
			return $ans[0]->cnt;
		}
	}

?>
