<html>
<head>
<link href="css/materialize.min.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<form action="#" method="get" name="sample">
		<div class="row">
		<div class="input-field col s6">
          <input id="last_name" type="text" name ="product" class="validate">
          <label for="last_name">Search Item</label>
        </div>
		<div class="col s3">
		<br />
		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
		</button>
		</div>
		</div>
		 </form>
<?php
$string = file_get_contents("snapdealdecor.com API.json");
$var=json_decode($string,true);
//print_r($var);
$count2=count($var);
//echo $count2."<br>";
$string1= file_get_contents("homeshop18decor.com API.json");
$var1=json_decode($string1,true);
//print_r($var);
$count1=count($var1);
//echo $count1;
$variable = isset($_GET['submit'])?$_GET['product']:"";
	$i=0;
	if($variable!=""){
	for($i=0;$i<$count2;$i++)
	{
		if($var[$i]['productdesc_link/_text']==$variable)
			break;
	}
	$snapdealIndex=$i;
	$i=0;
	for($i=0;$i<$count1;$i++)
	{
		if($var1[$i]['tooltip_link/_text']==$variable)
			break;
	}
	$homeIndex=$i;
	if(($snapdealIndex==$count2) || ($homeIndex == $count1))
	{
		if($snapdealIndex!=$count2)
			echo "Snapdeal";
		if($homeIndex!=$count1)
			echo "HomeShop 18";
	}
	else
	{
		if(($var[$snapdealIndex]['productprice_value'])>($var1[$homeIndex]['priceem_number']))
			echo "<font color='red'>"."Snapdeal"."</font>";
		else
			echo "HomeShop 18";
	}

	for($i=0;$i<$count2;$i++)
	{
		if(strpos($var[$i]['productdesc_link/_text'],$variable)!==false){
			echo "<div><br>";
			echo "<label>Snapdeal</label><br>";
			echo "<img src='".$var[$i]["producttuple_image"]."'/><br>";
			echo "<a href='".$var[$i]["producttuple_link"]."'>".$var[$i]["productdesc_link/_text"]."</a>".'<br>';
			echo "<label>Price:</label><label>".$var[$i]["productprice_value"]."</label><br>";
			
			echo "</div><br>";
			$j++;
		}
	}
	for($i=0;$i<$count1;$i++)
	{
		if(strpos($var1[$i]['tooltip_link/_text'],$variable)!==false)
		{
			echo "<div><br>";
			echo "<label>HomeShop 18</label><br>";
			echo "<img src='".$var1[$i]["img_image"]."'/><br>";
			echo "<a href='".$var1[$i]["tooltip_link"]."'>".$var1[$i]["tooltip_link/_text"]."</a>".'<br>';
			echo "<label>Price:</label><label>".$var1[$i]["priceem_number"]."</label><br>";
			echo "</div><br>";
			echo "<span>";
		}
	}
	}
?>
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>