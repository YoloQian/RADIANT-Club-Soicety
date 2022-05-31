<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'sdp');  
$sql = "SELECT `cid`, `cname`, `category`, `content`,  `link`, `mail`, `venue`, `location` FROM `clubs`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Club ID" . "\t" . "Club Name" .  "\t" . "Club Category" . "\t" . "Club Description" . "\t". "Club Link" . "\t" . "Club Email" . "\t" . "Club Venue" . 
"\t" . "Club Location" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Club_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 