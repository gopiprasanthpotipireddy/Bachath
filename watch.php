<html>
<head>
<link href="css/materialize.min.css" rel="stylesheet" type="text/css">
</head>
	<body>
	<nav class="top-nav teal darken-1" id="top1">
	<div class="nav-wrapper">
	 
      <a href="index.php" class="brand-logo">  BACHATH</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="mobile.php">Mobile</a></li>
        <li><a href="watch.php">Watch</a></li>
        <li><a href="decor.php">Decorations</a></li>
      </ul>
    </div>
	</nav>
	
	<div class="container">
		<form action="#" method="get" name="sample">
		<div class="row">
		<div class="input-field col s6">
          <input id="last_name" type="text" name ="product" class="validate">
          <label for="last_name">Search Item</label>
        </div>
		<div class="col s3">
		<br />
		<button class="btn waves-effect waves-light" type="submit" name="submit">Bachao
		</button>
		<!--<input type="submit" name="submit">-->
		</div>
		</div>
		 </form>
<?php
$string = file_get_contents("snapdealwatches.com API.json");
$var=json_decode($string,true);
//print_r($var);
$count2=count($var);
#echo $count2."<br>";
$string1= file_get_contents("home watch.json");
$var1=json_decode($string1,true);
//print_r($var);
$count1=count($var1);
#echo $count1;
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
		if(($var[$snapdealIndex]['productprice_value_numbers'])>($var1[$homeIndex]['price_number']))
			echo "Snapdeal";
		else
			echo "HomeShop 18";
	}

	for($i=0;$i<$count2;)
	{
		echo "<div class='row'>";
		for($j=0;($j<3)&&($i<$count2);$i++)
		{
		if(strpos($var[$i]['productdesc_link/_text'],$variable)!==false){
			echo "<div class='col s4'>";
			echo "<div><br>";
			echo "<label>Snapdeal</label><br>";
			echo "<img src='".$var[$i]["producttuple_image"]."'/><br>";
			echo "<a href='".$var[$i]["producttuple_link"]."'>".$var[$i]["productdesc_link/_text"]."</a>".'<br>';
			echo "<label>Price:</label><label>".$var[$i]["productprice_value"]."</label><br>";
			
			echo "</div><br>";
			echo "<span>";
			echo "</div>";
			$j++;
		}
		}
		echo "</div";
	}
	for($i=0;$i<$count1;)
	{
		echo "<div class='row'>";
		for($j=0;($j<3)&&($i<$count1);$i++)
		{
		if(strpos($var1[$i]['tooltip_link/_text'],$variable)!==false)
		{
			echo "<div class='col s4'>";
			echo "<div><br>";
			echo "<label>HomeShop 18</label><br>";
			echo "<img src='".$var1[$i]["img_image/_source"]."'/><br>";
			echo "<a href='".$var1[$i]["tooltip_link"]."'>".$var1[$i]["tooltip_link/_text"]."</a>".'<br>';
			echo "<label>Price:</label><label>".$var1[$i]["price_number"]."</label><br>";
			echo "</div><br>";
			echo "<span>";
			$j++;
			echo "</div>";
		}
		}
		echo "</div>";
	}
	}
?>
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
</script>
</div> 
</body>
</html>