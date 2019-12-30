<?php


function randomURL() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    $randlength = rand(8,12);
   
    for ($i = 0; $i < $randlength; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$url = $_POST["url"];

$file = randomURL().'.php';
  
$f = fopen($file,'w');

$content = "<?php header('Location:$url');
?>";
fwrite($f,$content);
fclose($f);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shortly.ml</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">

    <form action="index.php" method = "post">

<input type="url" placeholder="Enter Your URL" name="url">
<input type="submit" value="Submit" name="submit">
<label for="">Your Shortened URL is <a href="<?php echo $file ?>"><?php echo 'localhost/php/'.$file ?></a></label>
    </form>
</div>
</body>
</html>