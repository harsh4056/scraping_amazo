
<?php

	
function db_to_csv_download($con) {
	/* 
	*Getting each row and 
	*writing to output csv
	*file
	*/
	
	$result = mysqli_query($con,'SELECT * FROM scrape_test');
if (!$result) die('Couldn\'t fetch records');
	$num_fields = mysqli_num_fields($result);
	$headers = array();
for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysqli_field_name($result , $i);
}
	$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
	
}
function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}


function insertData($asin,$title,$price,$src,$conn){
	$sql = "INSERT INTO scrape_test (ASIN, PRODUCT, PRICE,IMG_URL)
			VALUES ('$asin', '$title', '$price','$src')
			ON DUPLICATE KEY UPDATE 
			PRODUCT='$title',PRICE='$price',IMG_URL='$src' ";

if (mysqli_query($conn, $sql)) {}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
// run this function to create tabel or create mannually
function createTable($conn){
	$sql = "CREATE TABLE `amazon_scrape`.`scrape_test` 
	( `ASIN` VARCHAR NOT NULL , `PRODUCT` TEXT NOT NULL , 
	`PRICE` TEXT NOT NULL , `IMG_URL` TEXT NOT NULL , 
	PRIMARY KEY (`ASIN`(15))) ENGINE = InnoDB;";

if (mysqli_query($conn, $sql)) {} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

function deleteData($conn){
	$sql = "TRUNCATE TABLE `scrape_test`";

if (mysqli_query($conn, $sql)) {} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>
