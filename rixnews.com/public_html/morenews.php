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

$advquery = '';
if (isset($_GET['lastid']))
	{
	$advquery_1 = '';
	$lastID = intval($_GET['lastid']);
	if ($lastID<>0) $advquery_1 = ' AND id<"'.$lastID.'"';
	}


if (isset($_GET['cat'])) 
{
	$cat = addslashes($_GET['cat']);
	if (strlen($cat)>0)	$advquery = ' AND category=(SELECT id FROM category WHERE alias = "'.$cat.'")';
}


$sqlquery = 'SELECT *,(SELECT name FROM category WHERE id = news.category) as ct FROM news WHERE 1 '.$advquery_1.$advquery.' ORDER BY id DESC LIMIT 5';

                        $res = mysqli_query($db,$sqlquery);
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                        $alias = $row['alias'];
                        $date=date_create($row['date']);
                        $d = date_format($date,"Y/m/d");
                        
                        $link = '/'.$d.'/'.$alias;
						$date = date_create($row["date"]);						
						$text = preg_replace ('/<[^>]*>/', ' ', html_entity_decode($row['description'])); 
                        ?>
                        <div class="more-content" data-id="<?echo $row['id']?>">
                            <div class="more-img">
                                <a href="<?echo $link;?>"><img src="<?echo $row['pic']?>" alt="" class="img-fluid"></a>
                            </div>
                            <div class="img-content" style="min-height: 150px;">
                                <h6><a href="<?echo $link;?>"><?echo html_entity_decode($row['title']);?></a></h6>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><?echo $row['ct']?></li>
                                    <li class="list-inline-item"><?echo date_format($date, 'F d, Y');?></li>
                                </ul>
                                <p><?echo substr($text,0,100);?></p>
                            </div>
                        </div>
                       
                       
                        <?
                        }
                        ?>