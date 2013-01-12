<?php
/***************************************
* www.program-o.com
* PROGRAM O 
* Version: 2.0.1
* FILE: chatbot/core/user/user_input_clean.php
* AUTHOR: ELIZABETH PERREAU
* DATE: MAY 4TH 2011
* DETAILS: this file contains the functions to clean a user input  
***************************************/


/**
 * function clean_for_aiml_match()
 * this function controls the calls to other functions to clean text for an aiml match
 * @param string $text
 * @return string text
**/
function clean_for_aiml_match($text)
{
	$otext = $text;
	$text= remove_allpuncutation($text); //was not all before
	$text= whitespace_clean($text);
	$text= captialise($text);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "In: $otext Out:$text",4);
		
	return $text;
}

/**
 * function whitespace_clean()
 * this function removes multiple whitespace
 * @param string $text
 * @return string text
**/
function whitespace_clean($text)
{
	$otext = $text;
	$text = preg_replace('/\s\s+/', ' ', $text);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "In: $otext Out:$text",4);
	
	return trim($text);	
}

/**
 * function remove_allpuncutation()
 * this function removes all puncutation
 * @param string $text
 * @return string text
**/
function remove_allpuncutation($text)
{
	$otext = $text;
	$text = preg_replace('/[^a-zA-Z0-9|+|-|\*|Å |Å¡|Å½|Å¾|Ã€|Ã�|Ã‚|Ãƒ|Ã„|Ã…|Ã†|Ã‡|Ãˆ|Ã‰|ÃŠ|Ã‹|ÃŒ|Ã�|ÃŽ|Ã�|Ã‘|Ã’|Ã“|Ã”|Ã•|Ã–|Ã˜|Ã™|Ãš|Ã›|Ãœ|Ã�|Ãž|ÃŸ|Ã |Ã¡|Ã¢|Ã£|Ã¤|Ã¥|Ã¦|Ã§|Ã¨|Ã©|Ãª|Ã«|Ã¬|Ã­|Ã®|Ã¯|Ã°|Ã±|Ã²|Ã³|Ã´|Ãµ|Ã¶|Ã¸|Ã¹|Ãº|Ã»|Ã½|Ã¾|Ã¿]/is', ' ', $text);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "In: $otext Out:$text",4);
	
	return $text;
}

/**
 * function remove_puncutation()
 * this function removes puncutation (leaves in some required for extra functions
 * @param string $text
 * @return string text
**/
function remove_puncutation($text)
{	
	$otext = $text;
	$text = preg_replace('/[^a-zA-Z0-9|+|-|*|\/|\.|?|!|Å |Å¡|Å½|Å¾|Ã€|Ã�|Ã‚|Ãƒ|Ã„|Ã…|Ã†|Ã‡|Ãˆ|Ã‰|ÃŠ|Ã‹|ÃŒ|Ã�|ÃŽ|Ã�|Ã‘|Ã’|Ã“|Ã”|Ã•|Ã–|Ã˜|Ã™|Ãš|Ã›|Ãœ|Ã�|Ãž|ÃŸ|Ã |Ã¡|Ã¢|Ã£|Ã¤|Ã¥|Ã¦|Ã§|Ã¨|Ã©|Ãª|Ã«|Ã¬| Ã­|Ã®|Ã¯|Ã°|Ã±|Ã²|Ã³|Ã´|Ãµ|Ã¶|Ã¸|Ã¹|Ãº|Ã»|Ã½|Ã¾|Ã¿]/i', ' ', $text);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "In: $otext Out:$text",4);
	
	return $text;
}

/**
 * function captialise()
 * this function captialises a string
 * @param string $text
 * @return string text
**/
function captialise($text)
{
	$otext = $text;
	$text = strtoupper($text);
	
	runDebug( __FILE__, __FUNCTION__, __LINE__, "In: $otext Out:$text",4);
	
	return $text;
}

?>