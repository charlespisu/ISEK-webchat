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


$output = (isset($convoArr['send_to_user'])) ? $convoArr['send_to_user'] . ' <br /> <a name="new" />' : "";
$thisScript = $_SERVER['SCRIPT_NAME'] . '#new';


$content = <<<endHTML

<!DOCTYPE html PUB<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
  <head>
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style type="text/css">
    #output {
      overflow: auto;
      margin-left: 10px;
      margin-right: 10px;
      margin-bottom: 10px;
      margin-top: 50px;
      /*clear: both;*/
      border: 1px solid black;
      min-height: 200px;
      max-height: 250px;
    }
	
	#botsay {
	
			    overflow: auto;
      	max-height: 150px;
      	color:red;
      	font-weight:bold;
	
	
	}
	
	#usersay {
	
			    overflow: auto;
      	max-height: 150px;
      	color:green;
      	font-weight:bold;
	
	}
    </style>
    <title>Program O Test Bot</title>
    <meta name="Description" content="" />
    <meta name="keywords" content="" />
  </head>
  <body>
    
    <div id="output">$output</div>
	
	<form method="get" action="$thisScript">
      <p>
        <label for="say">Say:</label>
        <input type="text" name="say" id="say" />
        <input type="submit" name="submit" id="say" value="say" />
        <input type="hidden" name="convo_id" id="convo_id" value="$convo_id" />
        <input type="hidden" name="bot_id" id="bot_id" value="$bot_id" />
        <input type="hidden" name="format" id="format" value="$format" />
      </p>
    </form>
  </body>
</html>
endHTML;
print $content;