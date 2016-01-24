<html>
<head>
<link href=""
</head>
	<body>
		<form action="#" method="get" name="sample">
		<label >
		enter a product:<input type="text" name="product">
		</label>
		<input type="submit"  value="submit" name="submit" >
		 </form>
	</body>
</html>
<?php
$string = file_get_contents("snapdealwatches.com API.json");
$var=json_decode($string,true);
//print_r($var);
$count2=count($var);
//echo $count2."<br>";
$string1= file_get_contents("homeshop18watches.com API.json");
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
		if(($var[$snapdealIndex]['productprice_value'])>($var1[$homeIndex]['price_number']))
			echo "Snapdeal";
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
			echo "<span>";
		}
	}
	for($i=0;$i<$count1;$i++)
	{
		if(strpos($var1[$i]['tooltip_link/_text'],$variable)!==false)
		{
			echo "<div><br>";
			echo "<label>HomeShop 18</label><br>";
			echo "<img src='".$var1[$i]["img_image/_source"]."'/><br>";
			echo "<a href='".$var1[$i]["tooltip_link"]."'>".$var1[$i]["tooltip_link/_title"]."</a>".'<br>';
			echo "<label>Price:</label><label>".$var1[$i]["price_number"]."</label><br>";
			echo "</div><br>";
			echo "<span>";
		}
	}
	}
?>
