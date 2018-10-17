<pre>
<?
error_reporting(E_ALL);
$dbhost = '127.0.0.1';
$dbuser = 'admin_default';
$dbname = 'admin_default';
$dbpass = '987321';
$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
require_once('/home/admin/web/rixnews.com/public_html/adminka/twitter/codebird.php');
\Codebird\Codebird::setConsumerKey("zH2B7vnhzdnKZu9FKdWSIAPyf", "5r1b0mm9b9XWQFYAdMiIEkJm3hKjaGEdlSzSVgBzvkzEVA9Ohg");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("738951284-D7WgF0nJSEer84bWlvJBrjyeFfe9zfNUfNNqoFzj", "uzj2TEB1ATuUqKavqQ73UC34OqiVPk7OREicDqkw9iOme");
$reply = $cb->account_verifyCredentials();
$res = mysqli_query($link,'INSERT INTO social_counter (id,twitter) VALUES ("1","'.$reply->followers_count.'") ON DUPLICATE KEY UPDATE twitter="'.$reply->followers_count.'"');
  
$data = file_get_contents('https://api.coinmarketcap.com/v2/ticker/?convert=USD&limit=20');
$obj = json_decode($data,true);
$obj = $obj['data'];
foreach($obj as $r) {
	$name = $r['name'];
	$symbol = $r['symbol'];
	$rank = $r['rank'];
	$last_updated = $r['last_updated'];
	$quotes = $r['quotes'];
	$usd = $quotes['USD'];
	$price = $usd['price'];
	$percent_change_1h = $usd['percent_change_1h'];
	$percent_change_24h = $usd['percent_change_24h'];
	$percent_change_7d = $usd['percent_change_7d'];
	
$res = mysqli_query($link,'INSERT INTO crypto (symbol, name, rank, last_updated, price, percent_change_1h, percent_change_24h, percent_change_7d) VALUES ("'.$symbol.'", "'.$name.'", "'.$rank.'", "'.$last_updated.'", "'.$price.'", "'.$percent_change_1h.'", "'.$percent_change_24h.'", "'.$percent_change_7d.'") ON DUPLICATE KEY UPDATE name="'.$name.'", rank="'.$rank.'", last_updated="'.$last_updated.'", price="'.$price.'", percent_change_1h="'.$percent_change_1h.'", percent_change_24h="'.$percent_change_24h.'", percent_change_7d="'.$percent_change_7d.'"');
}
?>
</pre>