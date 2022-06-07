<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'sdp');  
$sql = "SELECT `sid`, `username`, `email`, `Fname`, `Lname`, `studentid`, `intake`, `mobile_num`, `gender`, `birth_date`, `ic_passport`, `country`, `role`, `clubid` FROM `students`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "User ID" . "\t" . "Username" . "\t" . "Email" . "\t" . "First Name" . "\t" . "Last Name" . "\t" . "Student ID" . "\t". "Intake" . "\t" . "Mobile Number" . "\t" . "Gender" . 
"\t" . "Birth Date" . "\t". "IC / Passport" . "\t" . "Country" . "\t" . "Role" . "\t" . "Club ID" . "\t";  
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
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 