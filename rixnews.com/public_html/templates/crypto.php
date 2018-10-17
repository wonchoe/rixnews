
                        <div class="crypto-widget">
	                    <?
	                    $res = mysqli_query($db,'SELECT * FROM crypto ORDER BY rank');
	                    
	                    ?>                        
                            <h4>CRYPTOMARKET</h4>
							<div class="dropdown" style="margin-top:10px;">
							  <button id="cbtn" type="button" class="btn btn btn-light dropdown-toggle btn-xs" data-toggle="dropdown" style="width:100%">Bitcoin (BTC)</button>
							  <div id="ddown" class="dropdown-menu" style="width:100%">
							  
							  <?
							  $ftw = 0;
							  while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
							  {
							  	if ($ftw==0)
							  	{						  	
								$price = $row['price'];
								$name = $row['name'].' ('.$row['symbol'].')';
								$ftw = 1;
								}
								echo '<a style="cursor:pointer" class="dropdown-item" onClick="setMoney(this)" data-price="'.$row['price'].'" data-name="'.$row['name'].'" data-symbol="'.$row['symbol'].'" data-hr1="'.$row['percent_change_1h'].'" data-hr24="'.$row['percent_change_24h'].'" data-hr7d="'.$row['percent_change_7d'].'">'.$row['name'],' '.$row['symbol'].' - '.$row['price'].'</a>';  	
							  }
							  ?>
							  </div>
							</div>


							<div id="coinmarketcap-currency-widget" style="margin-bottom: 30px;">
							   <div style="border: 1px solid #E4E6EB;min-width:285px;">
							      <div>
							         <div style="text-align: center;line-height:50px;">   
							            <span id="cname" style="color: #d32f2f;font-size: 16px;font-weight: 500;"><?echo $name;?></span>
							            <span id="cprice" style="font-size: 16px;"><?echo $price;?> USD </span>                    
							         </div>
							      </div>
							      <div style="border-top: 1px solid #E4E6EB;clear:both;">
							         <div style="text-align:center;float:left;width:33%;font-size:12px;padding: 6px 0 6px;border-right:1px solid #E4E6EB;line-height:1.25em;">                        1 HR                        <br>                        <span id="chr1" style="font-size: 13px;font-weight: 300;color: #c02a1d;">-0.64</span>                    </div>
							         <div style="text-align:center;float:left;width:33%;font-size:12px;padding: 6px 0 6px 0;border-right:1px solid #E4E6EB;line-height:1.25em;">                        24 H                        <br>                       
							         <span id="chr24"  style="color: #27892f;font-size: 13px;font-weight: 300;">0.82</span>                    </div>
							         <div style="text-align:center;float:left;width:33%;font-size:12px;padding: 6px 0 6px 0;line-height:1.25em;">                        7 DAYS                        <br>                        							 <span  id="chr7d"  style="font-size: 14px;color: #c02a1d;font-size: 13px;font-weight: 300;">-7.69</span>                    </div>
							      </div>
							      <div style="text-align:center;clear:both;font-size:10px;font-style:italic;padding: 0;">            </div>
							   </div>
							</div>
    </div>
<script>
function setMoney(as)
{
price = as.dataset.price;
symbol = as.dataset.symbol;
name = as.dataset.name;
hr1 = as.dataset.hr1;
hr7d = as.dataset.hr7d;
hr24 = as.dataset.hr24;
$('#cname').html(name+' ('+symbol+')');
$('#cprice').html(price+' USD');
$('#cbtn').html(name+' ('+symbol+')');

$('#chr1').html(hr1);
if (hr1<0) $('#chr1').css('color','#c02a1d')
else $('#chr1').css('color','#27892f');

$('#chr24').html(hr24);
if (hr24<0) $('#chr24').css('color','#c02a1d')
else $('#chr24').css('color','#27892f');

$('#chr7d').html(hr7d);


if (hr7d<0) $('#chr7d').css('color','#c02a1d')
else $('#chr7d').css('color','#27892f');
}

setTimeout(function(){
if (document.getElementById('ddown'))
{
r = document.getElementById('ddown');
r.children[0].click();
}	
},500);
    
</script>