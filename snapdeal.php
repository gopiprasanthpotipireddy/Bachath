<html>
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
$string =file_get_contents("snapdeal.com API.json");
$var=json_decode($string,true);
print_r($var);
/* $count2=count($var);
//echo $count2."<br>";
$string1= file_get_contents("homeshop18.com API.json");
$var1=json_decode($string1,true);
//print_r($var);
$count1=count($var1);
//echo $count1;
if(isset($_GET['submit']))
{
	$variable=$_GET['product'];
	echo $variable;
	$i=0;
	for($i=0;$i<$count2;$i++)
	{
		if($var[$i]['productdesc_link/_text']==$variable)
			break;
	}
	$snapdealIndex=$i;
	$i=0;
	for($i=0;$i<$count1;$i++)
	{ */
		//if($var1[$i]['tooltip_link/_text']==$variable)
		//	break;
		/*
		<?php
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
*/
/* $pattern = 'micromax';
preg_match($pattern,$var[$i]['tooltip_link/_text'],$matches,PREG_OFFSET_CAPTURE);
print_r($matches);
echo "<br/>";
	} */

	/*}
	$homeIndex=$i;
	if(($var[$snapdealIndex]['productprice_value_numbers'])>($var1[$homeIndex]['price_number']))
		echo "Snapdeal";
	else
		echo "HomeShop 18";*/
//}

?>