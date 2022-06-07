<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'sdp');  
$sql = "SELECT `mid`, `name`, `email`, `subject`, `message`, `mdate_time` FROM `message`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Message ID" . "\t" . "From- Name" . "\t" . "From- Email" . "\t" . "Subject" . "\t" . "Message" . "\t" . "Sent On" . "\t";  
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
header("Content-Disposition: attachment; filename=Message_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 