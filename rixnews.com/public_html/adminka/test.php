<?php
error_reporting(E_ALL);
$dbhost = '127.0.0.1';
$dbuser = 'admin_cetnews';
$dbname = 'admin_cetnews';
$dbpass = '987321';
$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
$stopwords = file('stop_words.txt');


if ($_GET['id'])
	{
		$res = mysqli_query($link, 'SELECT * FROM news WHERE id="'.addslashes($_GET['id']).'"') or die(mysqli_error($link));
		
		$row = mysqli_fetch_array($res,MYSQLI_BOTH) or die(mysqli_error($link));
		$dt = $row['date'].'T'.$row['time'];
		$jsonA = array('content' => html_entity_decode($row['content']), 'title' => $row['title'], 'category' => $row['category'], 'keywords' => $row['keywords'], 'dt' => $dt);
		$jsonA = json_encode($jsonA);
		echo $jsonA;
	die();
	}
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 if ($_POST['id']) $id=addslashes($_POST['id']);
     if (strlen($_POST['title'])<1) die('ERORR_TITLE');
     if (strlen($_POST['content'])<1) die('ERORR_CONTENT');	
	 $content = addslashes(htmlspecialchars($_POST['content']));     
	 $title = addslashes(htmlspecialchars($_POST['title']));
	 $alias = str_replace(' ','-',$title);
     $alias = strtolower(preg_replace('/[^A-Za-z0-9_\-]/', '', $alias));
     $dt = $_POST['dt'];
     $arr = explode('T',$dt);
     
     $arry = sortArray(strtolower($_POST['content']),stopWords(html_entity_decode(strip_tags($_POST['content'])), $stopwords));
     $arry = array_slice($arry,0,10);
     print_r($arry);
       
     
	 $cat = $_POST['cat'];
	 if ($_POST['id']){
		mysqli_query($link,'UPDATE news SET content="'.$content.'", date = "'.$arr[0].'", title="'.$title.'", category="'.$cat.'", alias="'.$alias.'", time="'.$arr[1].'", keywords="'.$_POST['kwords'].'" WHERE id="'.$id.'"') or die(mysqli_error($link));
	 $data = ['status' => 'DONE','id' => $id];
	 die(json_encode($data));		
	 }
	 else{
	 	mysqli_query($link,'INSERT INTO news (content, date, title, category, alias, time, keywords) VALUES("'.$content.'", "'.$arr[0].'", "'.$title.'", "'.$cat.'","'.$alias.'", "'.$arr[1].'","'.$_POST['kwords'].'")') or die(mysqli_error($link));	 	
	 $data = ['status' => 'DONE','id' => mysqli_insert_id($link)];
	 die(json_encode($data));	 	
	 }


}

$res = mysqli_query($link, 'SELECT * FROM category') or die(mysqli_error($link));

while ($row = mysqli_fetch_array($res,MYSQLI_BOTH))
{
	$catlist .= '<option value="'.$row['id'].'">'.$row['alias']."</option>\n";	
}

$res = mysqli_query($link, 'SELECT * FROM news ORDER BY id DESC LIMIT 15') or die(mysqli_error($link));

while ($row = mysqli_fetch_array($res,MYSQLI_BOTH))
{
	$title .= '<tr><th class="col">'.$row['id'].'</th><td><span onClick="listClick('.$row['id'].')" style="cursor:pointer;display: inline-block;">'.$row['title'].'</span></td><td>'.$row['date'].'</td><td>'.$row['time'].'</td></tr>';	
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
 	<link href="css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <!-- Include Editor style. -->
    	<link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
  </head>
 
  <body>

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
			<div class="col-md-12">
				<button id="backBtn" class="btn btn-light" style="margin-top:15px;width:100px;">Back</button>
			</div>

			<div class="col-md-6" style="margin-top:10px;">
			   <div class="form-group">
			    <label for="inputdefault">Title</label>
			    <input class="form-control" id="titleID" placeholder="Type a title here" type="text">
			  </div>
			</div>
			
			<div class="col-md-3" style="margin-top:10px;">			
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


			<!--  KEYWORDS -->
			<div id="keyword_field" class="col-md-12">
				  
			</div>
			
								
			<div class="col-md-12">
				<textarea id="myEditor"></textarea>
			</div>
		</div>
		<div class="row">
			<div id="infoStr" class="col-md-11">

			</div>
			
			<div class="col-md-1" style="padding-left:0px">
				<button id="saveButton" class="btn btn-primary" style="margin-top:12px;width:100%">Save</button>
			</div>	
		</div>
	</div>
	<div class="container" id="editor_container" >
		<div class="row">	
			<div class="col-md-12">
				<button id="backBtn" class="btn btn-light" style="margin-top:15px;width:100px;">Back</button>
			</div>

			<div class="col-md-6" style="margin-top:10px;">
			   <div class="form-group">
			    <label for="inputdefault">Title</label>
			    <input class="form-control" id="titleID" placeholder="Type a title here" type="text">
			  </div>
			</div>
			
			<div class="col-md-3" style="margin-top:10px;">			
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


			<!--  KEYWORDS -->
			<div id="keyword_field" class="col-md-12">
				  
			</div>
			
								
			<div class="col-md-12">
				<textarea id="myEditor"></textarea>
			</div>
		</div>
		<div class="row">
			<div id="infoStr" class="col-md-11">

			</div>
			
			<div class="col-md-1" style="padding-left:0px">
				<button id="saveButton" class="btn btn-primary" style="margin-top:12px;width:100%">Save</button>
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



  
<script> 

    function resetEditForm()
    {
	$('textarea').froalaEditor('html.set', '');
	$('#titleID').val('');
	$('#catlist').prop('selectedIndex',0);
	$('#success').hide();
	$('#error').hide();
	$('#keyword_field').html('');
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
	  $('#titleID').val(json.title);
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
	});
	}
    function setUpInfo(id,cntnt, cls)
    {
	$('#infoStr').html('<div id="'+id+'" class="alert '+cls+'" style="margin-top:10px;height: 40px;padding: 10px;">'+cntnt+'</div>');
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
        saveURL: 'http://cetnews.com/adminka/',
        saveMethod: 'POST'
      })
      .on('froalaEditor.save.before', function (e, editor) {
        console.log('trying to save');
        var editor = $('#myEditor').data('froala.editor');
        
        var as = [];
        kwrd = document.getElementById('keyword_field');
		for(var i=0; i<kwrd.childElementCount; i++)
		{
		if (kwrd.childNodes[i].text) as.push(strip_html_tags(kwrd.childNodes[i].text));
		}
		keywords = as.join(',');        		
        if (document.getElementById('myEditor').dataset.id) var newsID = document.getElementById('myEditor').dataset.id;
        r = document.getElementById('example-datetime-local-input').value;
		var newOpts = {saveParams: {title: document.getElementById('titleID').value, cat: document.getElementById('catlist').value, kwords: keywords, id: newsID, dt: r}}
		$.extend(editor.opts, newOpts)                
      })
      .on('froalaEditor.save.after', function (e, editor, response) {
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
         console.log(response);
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
	document.getElementById('editor_container').style.display = 'none';
	document.getElementById('addNewsButton').style.display = '';
	document.getElementById('newslist').style.display = '';	
	}
	);	  
</script>


  </body>
</html>