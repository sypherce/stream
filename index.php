<?php header("Access-Control-Allow-Origin: *"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<!-- <link rel="stylesheet" href="style.css?time=<?php echo time();?>"> -->
<style>
video {
	left: 0;
	top: 0;
	width: 100vw;
	height: 100vh;
	object-fit: cover;
	position: absolute;
}
</style>
</head>
<body>

<form>
  <label for="gross">Gross Sales:</label>
  <input type="number" id="gross" name="gross" value="<?php echo $_GET["gross"] ?>"><br>
  <label for="dollars">Labor $:</label>
  <input type="number" id="dollars" name="dollars" value="<?php echo $_GET["dollars"] ?>"><br>
  <label for="hours">Labor Hours:</label>
  <input type="number" id="hours" name="hours" value="<?php echo $_GET["hours"] ?>"><br>
  <label for="percent">Labor %:</label>
  <input type="number" id="percent" name="percent" value="<?php echo $_GET["goal"] ? $_GET["goal"] : 19.75 ?>"><br>
  <br>
	current:<br>
    Labor %: <input type="text" name="sum"><br>
	<label for="staff">+Under/-Over Staffed:</label>
	<input type="number" id="staff" name="staff"><br>
</form>

<script>

const gross = document.getElementById("gross");
const dollars = document.getElementById("dollars");
const hours = document.getElementById("hours");
const percent = document.getElementById("percent");
const staff = document.getElementById("staff");
const input = document.querySelector("input");

</script>

<script>
    function calcHours() {
		const avgWage = Number(dollars.value) / Number(hours.value);
		const grossSales = Number(gross.value)
		const laborGoal = Number(percent.value) / 100
		const laborDollars = Number(dollars.value)


        let sum = Number(dollars.value) / Number(gross.value) * 100;
		sum = parseFloat(sum.toFixed(2));
        document.getElementsByName("sum")[0].value = sum;

		if(avgWage <= 0)
	        document.getElementsByName("staff")[0].value = 0;

        document.getElementsByName("staff")[0].value = (( (grossSales * laborGoal) - laborDollars ) / avgWage).toFixed(2);
	}


	gross.addEventListener("input", calcHours);
	dollars.addEventListener("input", calcHours);
	hours.addEventListener("input", calcHours);
	percent.addEventListener("input", calcHours);
	staff.addEventListener("input", calcHours);
	calcHours();


</script>

<!--

<script  type="module" src="index.js?time=<?php echo time();?>"></script>
<script src="howler.min.js?time=<?php echo time();?>"></script>
<script  type="module" src="client.js?time=<?php echo time();?>"></script>
<div class="video_div_class" id="video_div"></div>
<div id="content"></div>

-->

</body>
</html>
