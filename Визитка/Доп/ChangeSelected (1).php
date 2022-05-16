<?php
require __DIR__ . '/../Auth/AuthUser.php';
if (checkLevel(1))
{
include __DIR__."/../Auth/AuthDB.php";
$query = "Select * from mydb.users where Login='".$_REQUEST['Login']."'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $elem) {
print "<input name='login' id='login' placeholder='Логин' value='".$elem['Login']."' class='test inputtext' style='left: 0px;top:0px;' type='text'>
<select id='level' class='test inputtext' style='left: 0px;top:30px;'> <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select>
<script>document.getElementById('level').selectedIndex=".($elem['Level']-1).";</script>";
}
}
?>