<?php
	// require_once"db_hepler.php";
require_once"db_helper.php";

	final class db_project extends db_helper{

		function get_library($user_id)
		{
			return self::select("lib_id,lib_name,lib_time","library","log_id='$user_id'");
		}
		function get_group($user_id)
		{
			return self:: select("grp_id, grp_name, grp_time","lg_group","log_id='$user_id'");
		}
		function get_contact($user_id)
		{
			return self::select("cont_id,cont_name, cont_no,cont_group","contact","log_id='$user_id'");
		}

		function library_wise_data($id)
		{
			return self::select("msg_id,lbr_id,msg_name","message"," lbr_id='$id'");

		}

		function group_wise_data($id)
		{
			return self::select("grp_id,grp_name","lg_group","grp_id='$id'");
		}

		function contact_wise_data($user_id)
		{
			return self::select("cont_id,cont_name, cont_no,cont_group,log_id","contact", "log_id='$user_id'");
		}

		function contact_wise_dataa($user_id)
		{
			return self::select("cont_id,cont_name, cont_no,cont_group,log_id","contact", "cont_id='$user_id'");
		}



		function contactgrp_wise_data($grpid)
		{
			return self::select("cont_id,cont_name, cont_no,cont_group,log_id,grpid","contact", "grpid='$grpid'");
		}

		function get_message($msg_id)
		{
			return self::select("msg_id, lbr_id, msg_name, log_id","message","msg_id='$msg_id'");
		}

		function get_messages($user_id)
		{
			return self::select("msg_id, lbr_id, msg_name, log_id","message","log_id='$user_id'");
		}
	
	}
	$obj = new db_project();
?>
