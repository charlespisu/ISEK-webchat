<script src="speakClient.js"></script>

<?php

function get_conversation_to_display($convoArr)
{
	global $con,$dbn, $bot_name;
  $user_id = $convoArr['conversation']['user_id'];
  $bot_id = $convoArr['conversation']['bot_id'];
  $sql = "select `name` from `users` where `id` = $user_id limit 1;";
  $result = db_query($sql,$con);
  $row = mysql_fetch_assoc($result);
  $user_name = $row['name'];
  $user_name = (!empty($user_name)) ? $user_name : 'User';
  $convoArr['conversation']['user_name'] = $user_name;
  $convoArr['conversation']['bot_name'] = $bot_name;
	if (empty($bot_name)) {
	  $sql = "select `bot_name` from `bots` where `bot_id` = $bot_id limit 1;";
		$result = db_query($sql,$con);
    $row = mysql_fetch_assoc($result);
    $bot_name = $row['bot_name'];

	}
	if($convoArr['conversation']['conversation_lines']!=0){
		$limit = " LIMIT ".$convoArr['conversation']['conversation_lines'];
	}else{
		$limit = "";}
	
	$sql = "SELECT * FROM `$dbn`.`conversation_log`
		WHERE 
		`userid` = '".$convoArr['conversation']['user_id']."'
		AND `bot_id` = '".$convoArr['conversation']['bot_id']."'
		ORDER BY id DESC $limit ";
		
		$result = db_query($sql,$con);

		if(db_res_count($result)>0){
				while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
					$allrows[]=$row;
				}
			$orderedRows = array_reverse($allrows,false);
		}
		else 
		{
			$orderedRows =array('id'=>NULL, 'input'=>"", 'response'=>"", 'userid'=>$convoArr['conversation']['user_id'], 'bot_id'=>$convoArr['conversation']['bot_id'], 'timestamp'=>"");
			
		}
	
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "Found '".db_res_count($result)."' lines of conversation",2);
	
	return 	$orderedRows;
}
	
/**
 * function get_conversation()
**/	
function get_conversation($convoArr)
{
	$conversation = get_conversation_to_display($convoArr);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "Processing conversation as ".$convoArr['conversation']['format'],4);
	
	switch($convoArr['conversation']['format'])
	{
		case "html":
				$convoArr = get_html($convoArr,$conversation);
			break;
		case "json":
				$convoArr = get_json($convoArr,$conversation);
			break;
		case "xml":
				$convoArr = get_xml($convoArr,$conversation);
			break;
	}	
	return $convoArr;
}

/**
 * function get_html()
 * This function formats the response as html
 * @param  array $convoArr - the conversation array
 * @param  array $conversation - the conversation lines to format
 * @return array $convoArr
**/	
function get_html($convoArr,$conversation)
{
	$conversation_lines = $convoArr['conversation']['conversation_lines'];
	$show= "";
	$user_name = $convoArr['conversation']['user_name'];
	$bot_name  = $convoArr['conversation']['bot_name'];
	foreach($conversation as $index => $conversation_subarray){
		$show .= "<div class=\"usersay\" style=padding-bottom:5px;font-size:30px;font-family:Helvetica;color:#FF3C34; > ".stripslashes($conversation_subarray['input'])."</div>";
		$show .= "<div class=\"botsay\" style=padding-bottom:5px;font-size:30px;font-family:Helvetica;text-align:right;color:gold; > ".stripslashes($conversation_subarray['response'])."  </div>";
		
		
	}
		$show .= "<script> speak('".stripslashes($conversation_subarray['response'])."'); </script>";
	
	$convoArr['send_to_user']=$show;
	runDebug( __FILE__, __FUNCTION__, __LINE__, "Returning HTML",4);
	return $convoArr;
}
	
?>