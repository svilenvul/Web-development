<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
$int = 5;
echo $int." : ".gettype($int)."\n";
$double = 5344543212;
echo $double." : ".gettype($double)."\n";
$float = 5.5484;
echo $float." : ".gettype($float)."\n";
$string = "dasda";
echo $string." : ".gettype($string)." \n";
class obj
{
    function do_foo()
    {
        echo "Doing foo."; 
    }
}
$object = new obj();
echo gettype($object)."\n";
$null = NULL;
echo $null." : ".gettype($null)."\n";
$boolean = true;
echo $boolean." : ".gettype($boolean)."\n";

$array = array (3,4,5);
echo implode("|", $array)." : ".gettype($array)."\n";
?>
</p>
</body>
</html>