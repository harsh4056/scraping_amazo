<?php
	ob_start();
	require_once('simple_html_dom.php');
	require_once ('sql_connection.php');
	include ('funcs_extractDetails.php');
	include ('funcs_mySQL.php');
if(!isset($_GET['search']))
	die();

	$webSiteUrl=$_GET['search'];
	$limit=$_GET['limit'];
	$count=0;
	$html = file_get_html($webSiteUrl);		
while(!empty($html)){
	/*
	 * Run loop till last page
	 * if last page html wil be 
	 * empty. 
	*/
foreach($html->find('.s-result-item') as $postDiv){
	/* 
	 *'s-result-item' uiniquely identifies
	 * result items div
	*/
	$asin= getASIN($postDiv);
	$title=getTitle($postDiv);
	$price=getPrice($postDiv);
	$src=getImgUrl($postDiv);
	insertData($asin,$title,$price,$src,$conn);
/* 	echo $asin."::".$title."::". "Rs." .$price."::" .$src. '<br>'; */
	$count++;
	// Break from inner loop if count is reached
	if($limit==$count)
		break;
}

/* 	echo "<center>";
	echo "--------------------------".$count."-------------------------------".'<br><br><bt>';
	echo "<center>"; */

	// Break from outer loop if count is reached
if($limit==$count)
		break;
	$webSiteUrl=getNextPageLink($html);
	$html->clear(); 
	unset($html);
if(($webSiteUrl)){
	//echo $webSiteUrl.'<br>';
	$html = file_get_html($webSiteUrl);	
	}
 }
	db_to_csv_download($conn);
	// detele table content
	deleteData($conn);
	ob_end_flush();
 
 
?>