<?php
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
  
  
function tweet($message,$image,$link) {
$message = substr($message,0,280);
require_once('twitter/codebird.php');
\Codebird\Codebird::setConsumerKey("zH2B7vnhzdnKZu9FKdWSIAPyf", "5r1b0mm9b9XWQFYAdMiIEkJm3hKjaGEdlSzSVgBzvkzEVA9Ohg");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("738951284-D7WgF0nJSEer84bWlvJBrjyeFfe9zfNUfNNqoFzj", "uzj2TEB1ATuUqKavqQ73UC34OqiVPk7OREicDqkw9iOme");

$params = array(
    'status' => stripslashes($message),
);
//$reply = $cb->account_verifyCredentials();
//$res = mysqli_query($link,'INSERT IGNORE INTO social_counter SET twitter = "'.$reply->followers_count.'"');

$reply = $cb->statuses_update($params);
} 




  
function sortArray($text,$arry) {
	for($i=0;$i<=count($arry);$i++)
	{
	$cnt = mb_substr_count(html_entity_decode(strip_tags($text)),strtolower($arry[$i]));
	
	if ($cnt<2)
		{
		if (strlen($arry[$i])>0) $newarr[] = $arry[$i];
		}
	if ($cnt>=2)
		{
		if (strlen($arry[$i])>0) $bigarr[] = $arry[$i];
		}		
	}
	return array_merge($bigarr, $newarr);
}
  /*
function stopWords($text, $stopwords) {
  // Remove line breaks and spaces from stopwords
  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
  // Replace all non-word chars with comma
  $pattern = '/[0-9\W]/';
  $text = preg_replace($pattern, ',', $text);
  // Create an array from $text
  $text_array = explode(",",$text);
  // remove whitespace and lowercase words in $text
  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
  foreach ($text_array as $term) {
    if (!in_array($term, $stopwords)) {
    	if (!in_array($term, $keywords)) {
    		$keywords[] = $term;
		}
    }
  };
  return array_filter($keywords);
}
$stopwords = file('stop_words.txt');*/

$act = $_GET['act'];
if (($_GET['id']) && (!$act))
	{
		$res = mysqli_query($link, 'SELECT * FROM news WHERE id="'.addslashes($_GET['id']).'"') or die(mysqli_error($link));
		
		$row = mysqli_fetch_array($res,MYSQLI_BOTH) or die(mysqli_error($link));
		$dt = $row['date'].'T'.$row['time'];
		$jsonA = array('content' => html_entity_decode($row['content']), 'title' => $row['title'], 'category' => $row['category'], 'keywords' => $row['keywords'], 'dt' => $dt, 'description' => $row['description'], 'img' => $row['pic'], 'source' => $row['source'], 'main' => $row['main']);
		$jsonA = json_encode($jsonA);
		echo $jsonA;
	die();
	}

if ($act=='del')
  {
	$res = mysqli_query($link,'DELETE FROM news WHERE id="'.addslashes($_GET['id']).'"') or die('some error');
	exit;
  }
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$tw = explode(', ', $_POST['kwords']);
	for($i=0;$i<count($tw);$i++)
	{
	$tw[$i] = preg_replace("/[^0-9a-zA-Z_-]/", "", $tw[$i]);
	}
	$twt = implode(" #", $tw);
	$twt = '#'.$twt;


	 if ($_POST['id']) $id=addslashes($_POST['id']);
     if (strlen($_POST['title'])<1) die('ERORR_TITLE');
     if (strlen($_POST['content'])<1) die('ERORR_CONTENT');	
      	
     $_POST['content'] = str_replace('<iframe width="640"','<iframe width="100%"',$_POST['content']);
	 $_POST['content'] = str_replace('<p><br></p>','',$_POST['content']);     
	 $description = $_POST['desciption'];
	 $title = addslashes(htmlspecialchars($_POST['title']));
	 $alias = str_replace(' ','-',$title);
     $alias = strtolower(preg_replace('/[^A-Za-z0-9_\-]/', '', $alias));
	 
	 
 	 // SET ALT ATTRIBUTE FOR IMAGE
 	 //-------------------------------------------------------------------------------
 	 $kwrd = explode(',',$_POST['kwords']);
	 $alt = substr($_POST['title'],0,120);
	 $doc = new DOMDocument();
	 @$doc->loadHTML($_POST['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	 $tags = $doc->getElementsByTagName('img');
	 $i = 0; 
	 foreach ($tags as $tag) {
	 	
	       if (count($kwrd)<1)
	       	{
		   	$fname = 'image.jpg';
			}		   	
		   else
		   	{
		    if (count($kwrd)-1<$i) $i=0;
			$fname = strtolower(preg_replace('/[^A-Za-z0-9_\-]/', '', $kwrd[$i]));
			$fname = str_replace(' ','-',$fname);
			$i=$i+1;
		   	}
	       $tag->setAttribute('alt',$alt);
	       $img = $tag->getAttribute('src');
	       
	       $split = explode("/",$img);
	       $file = explode(".",basename($split[5]));
	       $fordig = substr($file[0],strlen($file[0])-4,4);
	       if (is_numeric($split[1])) 
	       	{ 
	       	$file[0] = $split[1];
	       	} 
	       
	       $fullline = '/'.$file[0].'/'.$split[2].'/'.$split[3].'/'.$split[4].'/'.$fname.'_'.$fordig.'.jpg';
	      // echo $fullline;
	       $tag->setAttribute('src',$fullline);
	 }
	 $_POST['content'] = $doc->saveHTML();	 	 
	// echo $_POST['content'];
	// exit;
	 //-------------------------------------------------------------------------------
 	 // SET ALT ATTRIBUTE FOR IMAGE
	 
	 
	 $content = addslashes(htmlspecialchars($_POST['content']));     


     $dt = $_POST['dt'];
     $source = $_POST['sour'];
     $arr = explode('T',$dt);
     $pic = $_POST['img'];
     $date=date_create($arr[0]);
	 $d = date_format($date,"Y/m/d");
						
     
     $main = intval($_POST['main']);

    // $arry = sortArray(strtolower($_POST['content']),stopWords(html_entity_decode(strip_tags($_POST['content'])), $stopwords));
    // $arry = array_slice($arry,0,10);
    // print_r($arry);
       
     
	 $cat = $_POST['cat'];
	 if ($_POST['id']){
		mysqli_query($link,'UPDATE news SET content="'.$content.'", date = "'.$arr[0].'", title="'.$title.'", category="'.$cat.'", alias="'.$alias.'", time="'.$arr[1].'", keywords="'.$_POST['kwords'].'", description="'.$description.'", pic="'.$pic.'", source="'.$source.'", main="'.$main.'" WHERE id="'.$id.'"') or die(mysqli_error($link));
	 $data = ['status' => 'DONE','id' => $id];
	 $fulllink = 'https://'.$_SERVER['HTTP_HOST'].'/'.$d.'/'.$id;
//	 tweet($title."\n".$fulllink."\n\n".$twt,$pic,$link);

	 die(json_encode($data));		
	 }
	 else{
	 	mysqli_query($link,'INSERT INTO news (content, date, title, category, alias, time, keywords, description, pic, source, main) VALUES("'.$content.'", "'.$arr[0].'", "'.$title.'", "'.$cat.'","'.$alias.'", "'.$arr[1].'","'.$_POST['kwords'].'","'.$description.'","'.$pic.'", "'.$source.'", "'.$main.'")') or die(mysqli_error($link));	 	
	 $data = ['status' => 'DONE','id' => mysqli_insert_id($link)];
	 $fulllink = 'https://'.$_SERVER['HTTP_HOST'].'/'.$d.'/'.mysqli_insert_id($link);
	 tweet($title."\n".$fulllink."\n\n".$twt,$pic,$link);
	 die(json_encode($data));	 	
	 }


}

$res = mysqli_query($link, 'SELECT * FROM category') or die(mysqli_error($link));

while ($row = mysqli_fetch_array($res,MYSQLI_BOTH))
{
	$catlist .= '<option value="'.$row['id'].'">'.$row['name']."</option>\n";	
}

$res = mysqli_query($link, 'SELECT * FROM news ORDER BY id DESC') or die(mysqli_error($link));

while ($row = mysqli_fetch_array($res,MYSQLI_BOTH))
{
	$title .= '<tr id="id'.$row['id'].'"><th class="col">'.$row['id'].'</th><td><span onClick="listClick('.$row['id'].')" style="cursor:pointer;display: inline-block;">'.substr($row['title'],0,100).'</span></td><td>'.$row['date'].'</td><td>'.$row['time'].'</td><td><button type="button" onClick="deleteClick('.$row['id'].')" style="width:50px;" class="btn btn-light btn-xs">delete</button></td></tr>';	
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. -->
	<link href="css/froala_style.min.css" rel="stylesheet" type="text/css" />
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <style>
    .imgCls{
	display: block; vertical-align: top; margin: 5px auto; text-align: center;
	}
    </style>
  </head>
 
  <body>
  	<div id="savebk" style="width:100%;background-color: #ebebebbf;height: 100vh;position: absolute;z-index: 1000;display:none;"></div>
    <div class="loader" id="loader"></div>
  	<div class="container" id="newslist">
  	
  		<div class="row">  		
			<div class="col-md-12" style="margin-top:10px;">
				<button id="addNewsButton" style="margin:10px;" class="btn btn-light" style="float:right">Add news</button>
			</div>		  		
  			<div class="col-md-12">
  			<table class="table table-hover">
  				<tbody>
  				<?echo $title;?>
  				</tbody>
  			</table>
  			
			</div>
  		</div>
  	</div>
    <!-- Create a tag that we will use as the editable area. -->
    <!-- You can use a div tag as well. -->

	<div class="container" id="editor_container" style="display: none;">
		<div class="row">	
			<div class="col-md-11">
				<button id="backBtn" class="btn btn-light" style="margin-top:15px;width:100px;">Back</button>
			</div>
			<div class="col-md-1" style="padding-left:0px">
				<button id="saveButton" class="btn btn-primary" style="margin-top:12px;width:100%">Save</button>
			</div>				

			<div class="col-md-5" style="margin-top:10px;">
			   <div class="form-group">
			    <label for="inputdefault">Title</label>
			    <input class="form-control" id="titleID" placeholder="Type a title here" type="text">
			  </div>
			</div>
			
			<div class="col-md-2" style="margin-top:10px;">			
			<div class="form-group">
			    <label for="exampleSelect1">Category</label>
			    <select class="form-control" id="catlist">
			      <?echo $catlist;?>
			    </select>
			  </div>									
			</div>
						
			<div class="col-md-3" style="margin-top:10px;">
			   <div class="form-group">
			    <label for="inputdefault">Date/Time</label>
			    <input class="form-control" type="datetime-local" value="<?echo date("Y-m-d").'T'.date("H:i:s");?>" id="dtime">
			  </div>
			</div>	
			
			<div class="col-md-2" style="margin-top:10px;">
			   <div class="form-group">
			    <label for="inputdefault">Source</label>
			    <input class="form-control" id="sourceID" placeholder="Source here" type="text">
			  </div>
			</div>			

			<div class="col-md-11">
			   <div class="form-group">
			    <label for="inputdefault">Description</label>
			    <input class="form-control" type="text" value="" id="description">
			  </div>
			</div>	

			<div class="col-md-1">
				<div class="form-check" style="margin-top: 30px;">
				  <input class="form-check-input" type="checkbox" value="" id="mainCheck">
				  <label class="form-check-label" for="mainCheck">
				    Main
				  </label>
				</div>
			</div>	




			<div class="col-md-12">
			    <label for="inputdefault">Background image</label>
			</div>
			<div id="imgList" class="col-md-12">
				
			</div>						
			
			<!--  KEYWORDS -->
			<div id="keyword_field" class="col-md-12">
				  
			</div>
			
								
			<div class="col-md-12">
				<textarea id="myEditor"></textarea>
			</div>
		</div>
		<div class="row">		
			<div id="infoStr" class="col-md-12">

			</div>		
		</div>
	</div>
 
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/js/froala_editor.pkgd.min.js"></script>
	<script type="text/javascript" src="js/plugins/image.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> 
    imageTags = [];
    
	function extractHostname(url) {
	    var hostname;
	    if (url.indexOf("://") > -1) {
	        hostname = url.split('/')[2];
	    }
	    else {
	        hostname = url.split('/')[0];
	    }
	    hostname = hostname.split(':')[0];
	    hostname = hostname.split('?')[0];
	    return hostname;
	}    
    
    function ChangePicName(s)
	    {
	    if (s)
			{
			path = s.substr(0,s.lastIndexOf('/')+1);
			name = s.substr(s.lastIndexOf('/')+1);
			partname = name.substr(0,name.lastIndexOf('.'));
			ext = name.substr(name.lastIndexOf('.'));
			return path+partname+'_sm'+ext;
			}
		}
    
    function GetImages()
	    {
		var divtxt = document.createElement('div');
		divtxt.innerHTML = $('textarea').froalaEditor('html.get');
		imageTags = divtxt.getElementsByTagName("img"); // Returns array of <img> DOM nodes	
		
		}
	
    function childIndex(e){
            var i = 0;
            while (e.parentNode.children[i] != e) i++;
            $('#imgList').attr('data-src',imageTags[i].getAttribute('src'));	
        }   
         
    function GetPicList()
    {    
    r = document.getElementsByClassName('imgCls')
	for (i=0;i<r.length;i++)
	{
	inn = r[i].innerHTML;
	if (inn.indexOf('img src')<1) 
		{
		r[i].remove();
		}
	}
     	
    document.getElementById('imgList').dataset.src = '';
	var kf = document.getElementById('imgList');
	kf.innerHTML = '';
	GetImages();
	var sources = [];
	for (var i in imageTags) {	   
	   if (imageTags[i].src)
		{ 
		var src = imageTags[i].getAttribute('src');
		filen = src.split('/');
		var num = parseInt(filen[1]) || 0;		
		if (num!=0) 
			{
			fullname = filen[0]+'/'+filen[1]+'/'+filen[2]+'/'+filen[3]+'/'+filen[4]+'/thumbnail/'+filen[5];
			src = fullname;
			imageTags[i].setAttribute('src',fullname);
			}
		
		if (extractHostname(src).length<3)
			{
		    name = src.substr(0,src.lastIndexOf('.'));
		    ext = src.substr(src.lastIndexOf('.'),10);
		    small = name+'_sm'+ext;		
			    var createA = document.createElement('div');		    
			    createA.onclick = function () {
					$('.thumbnail.imgobj').css("background-color",'');				
					this.childNodes[0].style.backgroundColor = "#e4e4e4";
					childIndex(this)				    
					};
					
			    createA.setAttribute('class','col-md-2');
				createA.innerHTML = '<div class="thumbnail imgobj" style="min-height: 85px;"><a href="#"><img src="'+small+'" alt="Lights" style="height: 85px;"></a></div>';
				
		        kf.appendChild(createA);
			}
		}		   
	}	
	}
	
    function resetEditForm()
    {
	$('textarea').froalaEditor('html.set', '');
	$('#titleID').val('');
	$('#catlist').prop('selectedIndex',0);
	$('#success').hide();
	$('#error').hide();
	$('#keyword_field').html('');
	}   
	
	function setupBk()
	{
		kt = document.getElementById('imgList');
		img = kt.dataset.src;
		for(i=0;i<kt.childElementCount;i++)
		{
		rx = kt.childNodes[i].innerHTML;
		if (rx.indexOf(img)>0) 
			{
			main = kt.childNodes[i];
			main.childNodes[0].style.backgroundColor = '#e4e4e4';
			}
		}
	} 
	
	function deleteClick(id)
	{
	$.get( "?act=del&id="+id, function( data ) {
		//console.log
		if (data.indexOf('rror')<1)
		{
			document.getElementById('id'+id).remove();
		}else alert('Error deleting news!');
	})
		
	}
	
	function listClick(id)
	{	
	$('#loader').show();
	resetEditForm();
	document.getElementById('addNewsButton').style.display = 'none';
	document.getElementById('newslist').style.display = 'none';	
		
	$.get( "?id="+id, function( data ) {

		$('#loader').hide();	
		json = JSON.parse(data);
	  document.getElementById('backBtn').style.display = '';	
	  document.getElementById('editor_container').style.display = '';	
	  $('textarea').froalaEditor('html.set', json.content);
	  
	  $('#dtime').val(json.dt);
	  $('#sourceID').val(json.source);
	  $('#titleID').val(json.title);
	  if (json.main==1) $('#mainCheck').prop('checked', true);
	  $('#description').val(json.description);
	  $("#catlist option")[json.category-1].selected = true;
	  document.getElementById('myEditor').dataset.id = id;
	  var kwrds = json.keywords.split(',');
	  for(var i=0;i<kwrds.length;i++)
	  {
	  	text = kwrds[i];
		if (text.length>0)
	   		{
		    var createA = document.createElement('a');
		    var kf = document.getElementById('keyword_field');
		    createA.onclick = function () {
				    this.parentNode.removeChild(this)
				};
		    createA.setAttribute('class','keyword');
	        createA.innerHTML = text;
	        kf.appendChild(createA);	
			}
	  }
	  GetPicList();
	  if (json.img)
	  {
	  var img = json.img.replace('_sm.', ".");
	  $('#imgList').attr('data-src',img);	
	  setupBk();	  
	  }
	
	});
	}
    function setUpInfo(id,cntnt, cls)
    {
	$('#infoStr').html('<div id="'+id+'" class="alert '+cls+'" style="z-index: 10000;bottom: 0;position: fixed;width: 1144px;margin-top:10px;height: 40px;padding: 10px;">'+cntnt+'</div>');
	}
	

	function strip_html_tags(str)
	{
	   if ((str===null) || (str===''))
	       return false;
	  else
	   str = str.toString();
	  return str.replace(/<[^>]*>/g, '');
	}

	$(function() { $('textarea').froalaEditor({
		saveInterval: 0,
        imageUploadParam: 'image_param',
        imageUploadURL: 'uploadImage.php',
        imageUploadParams: {id: 'my_editor'},
        imageUploadMethod: 'POST',
        imageMaxSize: 5 * 1024 * 1024,
        imageAllowedTypes: ['jpeg', 'jpg', 'png'],
		height: '500',
        saveParam: 'content',
        saveURL: '/adminka/',
        imageDefaultWidth: 0,
        saveMethod: 'POST'
      })
      .on('froalaEditor.save.before', function (e, editor) {
        console.log('trying to save');
        $('#savebk').show();
        $('#loader').show();
        var editor = $('#myEditor').data('froala.editor');
        
        var as = [];
        kwrd = document.getElementById('keyword_field');
		for(var i=0; i<kwrd.childElementCount; i++)
			{
			curkw = kwrd.childNodes[i].text;
			if (curkw) 
					{
					curkw = curkw.trim();
					as.push(strip_html_tags(curkw));
					}
			}			
		keywords = as.join(', ');        		
		
         if (!document.getElementById('imgList').dataset.src)
         	{
			document.getElementById('imgList').childNodes[0].click();
		 	}		
        if (document.getElementById('myEditor').dataset.id) var newsID = document.getElementById('myEditor').dataset.id;
        r = document.getElementById('dtime').value;
        desc = document.getElementById('description').value;
        sour = document.getElementById('sourceID').value;
        img = ChangePicName(document.getElementById('imgList').dataset.src);
        main = 0;
        if ($('#mainCheck').is(":checked")){ main = 1;}
		var newOpts = {saveParams: {title: document.getElementById('titleID').value, cat: document.getElementById('catlist').value, kwords: keywords, id: newsID, dt: r, desciption: desc, img: img, sour: sour, main: main}}
		$.extend(editor.opts, newOpts)                
      })
      
      .on('froalaEditor.contentChanged', function (e, editor) {
  		GetPicList();
  		setupBk();
		})
      .on('froalaEditor.save.after', function (e, editor, response) {
        $('#savebk').hide();
        $('#loader').hide();      	
       if (response.indexOf('DONE')>0)
       	{
        setUpInfo('success','<strong>Success!</strong> All data was saved', 'alert-success');
       	$('#success').show();
		$('#success').delay(2000).fadeOut();		
		response = JSON.parse(response);
		document.getElementById('myEditor').dataset.id = response.id;
	   	}
	   	else
	   		{
	   			setUpInfo('error','<strong>Error!</strong> '+response, 'alert-danger');
				$('#error').show();
			}
        console.log(response);
      })
      .on('froalaEditor.save.error', function (e, editor, error) {
       console.log(error);
      })
      .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
         console.log('trying to save');
      })
      .on('froalaEditor.image.uploaded', function (e, editor, response) {
         console.log(response);
      })
      .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
      	// $img[0].setAttribute('alt','image');
		 $img[0].className = 'fr-fic fr-draggable fr-dib';
         $img[0].setAttribute('display','block');
         $img[0].setAttribute('vertical-align','top');
         $img[0].setAttribute('text-align','center');
         $img[0].setAttribute('margin','5px auto');
         if (!document.getElementById('imgList').dataset.src)
         	{
			document.getElementById('imgList').childNodes[0].click();
		 	}
      })
      .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
         console.log(response);
      })
       
      .on('froalaEditor.image.error', function (e, editor, error, response) {
        // Bad link.
        if (error.code == 1) {
			
		}
 
        else if (error.code == 2) {
			
		}

        else if (error.code == 3) { 
		
		}
        else if (error.code == 4) { 
		
		}
        else if (error.code == 5) {
			
		}
        else if (error.code == 6) {
			
		}
        else if (error.code == 7) {
			
		}
		});	  
  }); 
  $('#loader').hide();
  
  $('#saveButton').click (function () {
  	var kf = document.getElementById('keyword_field');
  	if (kf.childElementCount<1)
  	{
		alert('NO KEYWORDS! Select a keyword and press SHIFT+ENTER');
		return;
	}
    $('#myEditor').froalaEditor('save.save')
  })
  
	function getSelectionText() {
	    var text = "";
	    if (window.getSelection) {
	        text = window.getSelection().toString();
	    } else if (document.selection && document.selection.type != "Control") {
	        text = document.selection.createRange().text;
	    }
	    return text;
	}
	
	function setKW()
	{
	   	var text = getSelectionText();
	   	if (text.length>0)
	   		{
		    var createA = document.createElement('a');
		    var kf = document.getElementById('keyword_field');
		    createA.onclick = function () {
				    this.parentNode.removeChild(this)
				};
		    createA.setAttribute('class','keyword');
	        createA.innerHTML = text;
	        kf.appendChild(createA);	
			}
	}

	document.getElementById('titleID').addEventListener('keypress', function(e) {
	    if(e.keyCode === 13 && e.shiftKey) {
			setKW();
			}
	});
	
	
	setTimeout(function()
	{
		$('#myEditor').froalaEditor('events.on', 'keydown', (e) => 
		{ 
		if (e.keyCode === 13 && e.shiftKey) 
		{ 
		setKW();	
		e.preventDefault(); e.stopPropagation(); return false; } 
		}, true);  	
	},1000);


	$addnews = document.getElementById('addNewsButton');
	$addnews.addEventListener('click', function()
	{
    var d = new Date();
    var n = d.toISOString();
    r = document.getElementById('dtime');
    $('#mainCheck').prop('checked', false);
    $('#description').val('');
    $('#sourceID').val('');
    $('#imgList').html('');
    $('#imgList').attr('data-src','');
    n = n.substr(0,n.indexOf('.'));
    r.value = n;		
	$("#myEditor").removeAttr("data-id"); // removing the data attributes.
	resetEditForm();
	this.style.display = 'none';
	document.getElementById('editor_container').style.display = '';
	document.getElementById('newslist').style.display = 'none';	
	document.getElementById('backBtn').style.display = '';
	}
	);
	
	$backBtn = document.getElementById('backBtn');
	$backBtn.addEventListener('click', function()
	{
	resetEditForm();
	this.style.display = 'none';
	$('#mainCheck').prop('checked', false);
    $('#imgList').html('');
    $('#imgList').attr('data-src','');	
	document.getElementById('editor_container').style.display = 'none';
	document.getElementById('addNewsButton').style.display = '';
	document.getElementById('newslist').style.display = '';	
	}
	);	
	
		
  </script>
	
	

  </body>
</html>