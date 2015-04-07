<?php

function rgb2html($r, $g, $b)
{
    if (is_array($r) && sizeof($r) == 3)
        list($r, $g, $b) = $r;
	
    $r = intval($r); $g = intval($g);
    $b = intval($b);

    $r = dechex($r<0?0:($r>255?255:$r));
    $g = dechex($g<0?0:($g>255?255:$g));
    $b = dechex($b<0?0:($b>255?255:$b));

    $color = (strlen($r) < 2?'0':'').$r;
    $color .= (strlen($g) < 2?'0':'').$g;
    $color .= (strlen($b) < 2?'0':'').$b;

    return '#'.$color;
}

$servername = "oak.arvixe.com:3306";
$username = "guest";
$password = "12341234";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "USE shareviz_bh3";
$result = $conn->query($sql);




$colorArray = '[ ';
$sql = "SELECT * FROM shareviz_bh3.mp3 ORDER BY id DESC LIMIT 8;";

$result = $conn->query($sql);	//echo $sql;
	if ($result->num_rows > 0) {
		$iter=0;
		while($row = $result->fetch_assoc()) {
			if($iter!=0) {
		
				$colorArray .= " , ";
			}
			$r_ = $row["R"];
			$g_ = $row["G"];
			$b_ = $row["B"];
			$color = (string)rgb2html($r_,$g_,$b_);		
		
			$colorArray .= '"' . $color . '"';
			$iter++;								
	}
	

}
	
$colorArray  .= ' ]';

echo "<script>\n";
echo "function getColorPallete() {  return ";
echo $colorArray . "; }" ;
echo "\n</script>";
	
	



//echo $result;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
#mainpic {
	border-style: none;
	position: relative;
	visibility: visible;
	height: 450px;
	width: 960px;
	background-color: #B6DBA3;
}
.palette {
	background-color: #FFFFFF;
	position: relative;
	visibility: visible;
	height: 60px;
	width: 100px;
	float: left;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 20px;
	color: #000000;
	text-align: center;
	vertical-align: text-bottom;
	font-family: amaranth;
	font-style: normal;
	font-weight: 400;
}
</style>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/alfa-slab-one:n4:default;amaranth:n4:default.js" type="text/javascript"></script>
</head>

<body>

<div id="mainpic"></div>
<div id="p1" class="palette"></div>
<div id="p2" class="palette"></div>
<div id="p3" class="palette"></div>
<div id="p4" class="palette"></div>
<div id="p5" class="palette"></div>
<div id="p6" class="palette"></div>
<div id="p7" class="palette"></div>
<div id="p8" class="palette"></div>
</body>
<script>

var colors=getColorPallete();
console.log(colors);
for(i=1;i<colors.length+1;i++)
{
	var id_ = "p" + i;
	console.log(id_);
	document.getElementById(id_).style.background=colors[i-1];
	document.getElementById(id_).innerHTML="<br><br>"+colors[i-1];
}
</script>
<script>
 setTimeout(function() { location.reload() }, 1000);
</script>
</html>