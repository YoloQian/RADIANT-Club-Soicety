<li><a class="dropdown-item" href="adashboard.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Admin</a></li>
"<li><a class='dropdown-item' href='adashboard.php'><i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp;Admin</a></li>"


<?php
if($_SESSION['fullname'] == 'admin'){
echo "<li><a class='dropdown-item' href='adashboard.php'><i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp;Admin</a></li>";
}
?>