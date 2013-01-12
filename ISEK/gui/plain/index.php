<?php 

  
  $display = "";
  
  require_once('../../config/global_config.php');  
  require_once('../chatbot/conversation_start.php');			

if(isset($_REQUEST['bot_id'])){
	$bot_id = $_REQUEST['bot_id'];
}else{
	$bot_id = 1;
}

if(isset($_REQUEST['convo_id'])){
	$convo_id = $_REQUEST['convo_id'];
}else{
	//session started in the conversation_start.php
	$convo_id = session_id();
}

if(isset($_REQUEST['format'])){
	$format = $_REQUEST['format'];
}else{
	$format = "html";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>ISEK CHATBOT</title>
		<script src="speakClient.js"> </script>

	</head>
	<body onload="document.getElementById('input').focus()" style=width:700px;height:300px;">
	<div> 
	<?php echo $display;?>
	<div>
		<form method="get" action="index.php">
			<p>
				
				<input type="text" id="input" name="say" id="say" size="60px" style=font-size:20px;font-family:Helvetica;/>
				<input type="submit" name="submit" id="say" value="Say" style=font-size:20px;font-family:Helvetica; />
				<input type="hidden" name="convo_id" id="convo_id" value="<?php echo $convo_id;?>" />
				<input type="hidden" name="bot_id" id="bot_id" value="<?php echo $bot_id;?>" />
				<input type="hidden" name="format" id="format" value="<?php echo $format;?>" />
			</p>
		
		</form>
		 <div id="audio"></div>
	</body>
</html>