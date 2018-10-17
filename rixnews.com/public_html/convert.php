<?
$dbhost = '127.0.0.1';
$dbuser = 'admin_default';
$dbname = 'admin_default';
$dbpass = '987321';
$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  echo 'www';
$res = mysqli_query($db,'SELECT * FROM news');
while($row=mysqli_fetch_array($res,MYSQL_ASSOC))
{
	echo $row['content'];
}
?>