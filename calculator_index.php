<!--- simple calculator php starts --->

<?php
$message = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];

if($num1 == '' || $num2 == ''){
$message = "Put numbers in fields";  
}else{

if(isset($_POST['add'])){
$add = $num1 + $num2;
$message = $num1. "+" .$num2. "= " .$add;
}

if(isset($_POST['sub'])){
$sub = $num1 - $num2;
$message = $num1. "-" .$num2. "= " .$sub;

}if(isset($_POST['mul'])){
$mul = $num1 * $num2;
$message = $num1. "*" .$num2. "= " .$mul;

}if(isset($_POST['div'])){

if($num2== 0){
$message = "You can't divide by zero";

}else{
$div = $num1 / $num2;
$message = $num1. "/" .$num2. "= " .$div;
}

}if(isset($_POST['mod'])){
if($num2== 0){
$message = "Modulo is not found";
   
}else{
$mod = $num1 % $num2;
$message = $num1. "%" .$num2. "= " .$mod;
}
}
}
}

// Velocity //
$result_velocity='';
if(isset($_GET['input_dis']) && isset($_GET['input_time'])){
$input_dis = $_GET['input_dis'];
$input_time = $_GET['input_time'];
$velocity =  $input_dis / ($input_time * 60);
$result_velocity="Velocity in m/s: " .$velocity. " m/s <br> Velocity in km/h: " .$velocity * 3.6. " km/h";
}

// Time //
$result_time='';
if(isset($_GET['input_distance']) && isset($_GET['input_speed'])){
$input_distance = $_GET['input_distance'];
$input_speed = $_GET['input_speed'];
$time =  $input_distance / $input_speed;
$result_time="Time in seconds: " .$time. " s";
}

// Distance //
$result_distance='';
if(isset($_GET['input_time_distance']) && isset($_GET['input_speed_distance'])){
$input_time_distance = $_GET['input_time_distance'];
$input_speed_distance= $_GET['input_speed_distance'];
$distance =  $input_time_distance  *   $input_speed_distance;
$result_distance="Distance in meters: " .$distance. " m";
}
?>

<!--- simple calculator php ends --->

<!-- HTML --->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--- Google fonts --->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Special+Elite&display=swap" rel="stylesheet">

<!--- Custom fonts --->
<link rel="stylesheet" href="./calculator_style.css">
<title>Simple Calculator</title>
</head>
<body>

<div class="calculator-calculator__simple">    
<h1>Calculator</h1>
<form action="calculator_index.php" method="post"> 
<input type="float" name="num1" placeholder="First number" id="num1">
<input type="float" name="num2" placeholder="Second number" id="num2">
<br><br>
<!-- div buttons START  -->
<div class="buttons">
<button type="submit" name="add"  class="btn__add">&#43; </button> 
<button type="submit" name="sub" class="btn__substract">&#8722; </button> 
<button type="submit" name="mul" class="btn__multiply">&#8727; </button> 
<button type="submit" name="div" class="btn__divide">&#247; </button> 
<button type="submit"name="mod"  class="btn__modulo">&#37; </button> 
</div> 
<!-- div buttons END  -->
</form>
<p class="answer simple__calculator"><?php echo $message; ?></p>
</div> 
<!-- div class="calculator calculator__simple END  -->

<div class="calculator__body-dtv">

<!-- Velocity -->
<div class="velocity__calculator">
<h1>Find velocity </h1>
<h2>Formula: velocity = distance / time</h2>
<form action="calculator_index.php" method="get"> 
<input type="float" name="input_dis" id="input_dis" placeholder="Distance(meters)">
<input type="float" name="input_time" id="input_time" placeholder="Time(minutes)">
<br/>
<div class="send-form" >
<input type="submit" value="Send" id="input">
</div>
</form>
<p class="answer" velocity__calculator><?php echo $result_velocity;?></p>
</div>

<!-- Time -->
<div class="time__calculator">
<h1>Find time </h1>
<h2>Formula: time = distance / speed</h2>
<form action="calculator_index.php" method="get"> 
<input type="float" name="input_distance" id="input_distance" placeholder="Distance(meters)">
<input type="float" name="input_speed" id="input_speed" placeholder="Speed(m/s)">
<br/>
<div class="send-form" >
<input type="submit" value="Send" id="input">
</div>
</form>
<p class="answer time__calculator"><?php echo $result_time;?></p>
</div>

 <!-- Distance -->
<div class="distance__calculator">
<h1>Find Distance </h1>
<h2>Formula: distance = speed x time</h2>
<form action="calculator_index.php" method="get"> 
<input type="float" name="input_time_distance" id="input_time_distance" placeholder="Time(seconds)">
<input type="float" name="input_speed_distance" id="input_speed_distance" placeholder="Speed(m/s)">
<br/>
<div class="send-form" >
<input type="submit" value="Send" id="input">
</div>
</form>
<p class="answer distance__calculator"><?php echo $result_distance;?></p>
</div>
</div>
</body>
</html>
