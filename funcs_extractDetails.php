
<?php
	
	/* 	
	*Getting details by 
	*uniqe attributes,classes,
	*identifiers and divisions 
	*/
function getASIN($element){
	$asin= $element->attr['data-asin'];
	return $asin;
}

function getTitle($element){
	foreach($element->find('a.s-color-twister-title-link') as $a){
	$title=$a->attr['title'];
	}
	return $title;
}

function getPrice($element){
	$price="";
	foreach($element->find('.s-price') as $span){
	$price = $span->innertext.",".$price;
	}
	// Delete extra string attached with price
	$price = str_replace('"', "", $price);
	$search = '<span class=currencyINR>&nbsp;&nbsp;</span>' ;
	$price = str_replace($search, '', $price) ;
	return $price;
}
function getImgUrl($element){
	foreach($element->find('img.s-access-image') as $img){
	$src = $img->attr['src'];
	}
	return $src;
}
function getNextPageLink($html){
	 $nextPage=0;
	 foreach($html->find('a#pagnNextLink') as $pagn){
	 $nextPage= $pagn->attr['href'];
	 $nextPage="https://www.amazon.in".$nextPage;
	 $nextPage = str_replace( "&amp;", "&", urldecode(trim($nextPage)) );
	}
	 return $nextPage;

}

	

?>
