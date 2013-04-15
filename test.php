<?php

if (filter_var('test@test.com', FILTER_VALIDATE_EMAIL)) echo 111;
else echo 0;

/*$file = 'C:\Users\prasuna\Desktop\create_user.txt';
$arr = file($file);
//print top 10 lines from file
for($i=0;$i<10;$i++)  {
	echo $arr[$i]."<br>";
}*/
	   
/*require_once("/erp/includes/dompdf/dompdf_config.inc.php");
$html =
    '<html><body>'.
    '<p>Hello World!</p>'.
    '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
//$dompdf->set_paper('a3', 'portrait');
$dompdf->render();
//$dompdf->stream("hello_world.pdf");
$file='test.pdf';
if(file_exists($file))	unlink($file);
file_put_contents($file, $dompdf->output());
settype($dompdf, 'null');
unset($dompdf);*/
?>

<?php 
	require_once('/lounge_local/GlobalOne/include/PHPExcel.php');
	require_once('/lounge_local/GlobalOne/include/PHPExcel/IOFactory.php');
	
	$resultArr = array();
	
	//here we fill in the header row
	class MyReadFilter implements PHPExcel_Reader_IReadFilter 
	{ 
    	public function readCell($column, $row, $worksheetName = '') { 
        //  Read rows 1 to 7 and columns A to E only 			 
			return true; 
		} 
	} 
	$file = 'C:\Users\prasuna\Documents\testing_xls_txt\temp2.xlsx';
	$filterSubset = new MyReadFilter(); 
	$inputFileType = PHPExcel_IOFactory::identify($file);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType); 
	
	$objReader->setReadFilter($filterSubset); 
	
	$objPHPExcel = $objReader->load($file); 
	
	$objWorksheet = $objPHPExcel->getActiveSheet();
	$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
	$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g.
	$i = 0;	$k=0;
	foreach ($objWorksheet->getRowIterator() as $row) { //print_r($row);
		$j = 0;	
		$arr=array();
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);
		foreach ($cellIterator as $cells) 
		{
			$cellVal = $cells->getValue();
			if($i==0)	{ 
				if($cellVal!='')	$k++;
			} //echo "<br>K val :".$k."<br>";
		}
		foreach ($cellIterator as $cell_raw) 
		{	
			$cell = $cell_raw->getValue();				
			if(is_null($cell))
				$cell = '';
			$arr[$j]=(string) $cell;
			$j++;	//echo "<br>J val :".$j."<br>";
			//if($j == $highestColumnIndex)	break;
			if($j == $k)	break;
		}
		$resultArr[$i] = $arr;
		$i++;	//echo "<br>I val :".$i."<br>";
		if($i == 4)
			break;
	}
	echo "<pre>"; print_r($resultArr);	echo "</pre>";
	
/*if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}*/

/*$file = '99_1338808693_80000400000000_clip3.wav';
$carr = explode("_",$file);
$cname = substr($carr[3],0,-4);
echo $cname;*/  

/* //local
copy('C:\xampp\htdocs\SHARED\TEMP\95_1340001394_80000400000000_Sai Tech Solutions New.png', 'C:\xampp\htdocs\SHARED\USER_LOGOS\80000200000000.png');
unlink('C:\xampp\htdocs\SHARED\TEMP\95_1340001394_80000400000000_Sai Tech Solutions New.png');
*/

//server
/*copy('/home/SHARED/TEMP/15_1340002612_80000200000000_Sai Tech Solutions New.png', '/home/SHARED/WL_LOGOS/80000400000000.png');
unlink('/home/SHARED/TEMP/15_1340002612_80000200000000_Sai Tech Solutions New.png');

$file = '70_1340866150_80000400000000_Level3.wav';
echo $cname = substr($file,14);*/

$file = '70_1340866150_80000400000000_Level3_sadsad.wav';
$carr = explode("_",$file);
$carr2 = array_slice($carr, 2); 
$cname = implode("-",$carr2);

//////////////////////////////////////////////////////////
/*$file = 'C:\xampp\htdocs\SHARED\VOICE\TEMP\67_1342597026_80000200000000_clip1.wav';
$fp = fopen($file, 'r');
$size_in_bytes = filesize($file);
fseek($fp, 20);
$rawheader = fread($fp, 16);
$header = unpack('vtype/vchannels/Vsamplerate/Vbytespersec/valignment/vbits',$rawheader);
$sec = floor($size_in_bytes/$header['bytespersec']); //prasuna
//echo $sec;

echo "<pre>".print_r($header)."</pre>";
preg_match("/.*@(.*)$/","http://info@abc.com",$data);
print_r($data);

$str = '<a>dsfdsf &amp; dsadsd</a> <p><b>sdfdf</b></p>';
echo strip_tags($str,'<b>');

echo "<br>";
echo $binarydata = pack("nvc*", 0x1234, 0x5678, 65, 66);
$array = unpack("c2chars/nint", $binarydata);
echo "<pre>"; print_r($array);	echo "</pre>";*/


function selfURL() 
{ 
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
} 
function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

echo selfURL()."<br>";

$a = 5;
$b='a';
echo $$b; 

/*$browser = get_browser();
foreach ($browser as $name => $value)
{
echo "<b>$name</b> $value <br />\n";
} */
echo "<br>";
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";
}

$res = '{"esmeAddr":80000600000000,"sessionRequest":"saveUpdateSession","accType":1,"requestType":"oneToMany","fileNames":"78_1350297158_80000600000000_test&test2&test3.xls","message":"ghgfhgfh","messageType":"text","messageTag":"noMsgTag","sender":"another","removeDuplicate":0,"priority":1}';
$rs=json_decode($res);
echo $rs->{'fileNames'};
echo $pos = strpos($rs->{'fileNames'},"&");


echo "<br><br>";
$filename = 'dfsdfd"fsdfds" & sadsa <dfds >gfhgh\'ghgh\''; 
echo $filename."<br>";
$result =  array('success'=>true, 'file'=>$filename);
echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
?>

<?php
echo "<br>";
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
echo "<br> header Accepts :";

echo $_SERVER['HTTP_ACCEPT']."<br><br><br>";
?>

<script type="text/javascript">
console.log( document.URL );
</script>

<!DOCTYPE html>
<html>
<body>

<canvas id="myCanvas" width="200" height="100" style="border:1px solid #c3c3c3;">
Your browser does not support the HTML5 canvas tag.
</canvas>

<script>

/*var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");
ctx.fillStyle="#FF0000";
ctx.fillRect(0,0,150,75);*/

</script>

</body>
</html>

<?php echo "<br><br><br>";
$info = array('coffee', 'brown', 'caffeine');

// Listing all the variables
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.<br>";

// Listing some of them
list($drink, , $power) = $info;
echo "$drink has $power.<br>";

// Or let's skip to only the third one
list( , , $power) = $info;
echo "I need $power!<br>";

?> 

<?php

class Vehicle {}

class Car extends Vehicle {}

class Ferrari extends Car {}

print_r(get_parent_class("Ferrari"));

$comment = 'dfsfdsfds gvfdgfd ab dffdsff dfdsfdsfds';
echo "<br>".substr_replace($comment, '...', 20);
$comment = 'dfsfdsfds';
echo "<br>".substr_replace($comment, '...', 20);


class ab {
	function b()	{
		echo "<br>".selfURL()."<br>";
	}
}
$a = new ab();
$a->b();
?>
