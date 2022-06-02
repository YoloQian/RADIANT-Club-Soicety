<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'sdp');  
$sql = "SELECT `aeid`, `etitle`, `cid`, `cname`, `edate_time` FROM `applyevent`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Event ID" . "\t" . "Event Title" . "\t" . "Organize by- Club ID" . "\t" . "Organize by- Club Name" . "\t". "Event Latest Update" . "\t";  
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
header("Content-Disposition: attachment; filename=ApproveEvent_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 