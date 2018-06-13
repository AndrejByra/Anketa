<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>anketa</title>
</head>
<body>
    <?php
            $value = $_GET['val'];
            $box = $_GET['box'];
            if($box == 'on'){
            if($value == 1){
                echo "You vote for Xiaomi";
                $dotaz="update votes
                set Xiaomi = Xiaomi + 1
                where id = 1";
                $conn = mysqli_connect("localhost:3306","root","","phpanketa");
		if(!$conn){
			die("Conn fail");
		}
		if(!$conn->query($dotaz)=== TRUE){
			//echo "New record";
		}else{
			//echo "Error connection";
		}
            }elseif($value ==2){
                echo "You vote for Sony";
                $dotaz="update votes
                set Sony = Sony + 1
                where id = 1";
                $conn = mysqli_connect("localhost:3306","root","","phpanketa");
		if(!$conn){
			die("Conn fail");
		}
		if(!$conn->query($dotaz)=== TRUE){
			// echo "New record";
		}else{
			// echo "Error connection";
		}
            }elseif($value ==3){
                echo "You vote for Samsung";
                $dotaz="update votes
                set Samsung = Samsung + 1
                where id = 1";
                $conn = mysqli_connect("localhost:3306","root","","phpanketa");
		if(!$conn){
			die("Conn fail");
		}
		if(!$conn->query($dotaz)=== TRUE){
			//echo "New record";
		}else{
			//echo "Error connection";
		}
            }elseif($value ==4){
                echo "You vote for Lg";
                $dotaz="update votes
                set Lg = Lg + 1
                where id = 1";
                $conn = mysqli_connect("localhost:3306","root","","phpanketa");
		if(!$conn){
			die("Conn fail");
		}
		if(!$conn->query($dotaz)=== TRUE){
			//echo "New record";
		}else{
			//echo "Error connection";
		}
            }
        }else{
            echo "Agree with Terms to vote";
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpanketa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "select * from votes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            $xiaomi = $row["Xiaomi"];
            $sony = $row["Sony"];
            $samsung = $row["Samsung"];
            $lg = $row["Lg"];
            echo '<div> Xiaomi with '.$xiaomi.'votes</div>';
            echo '<div> Sony with '.$sony.'votes</div>';	
            echo '<div> Samsung with '.$samsung.'votes</div>';
            echo '<div> Lg with '.$lg.'votes</div>';
            }
        }else {
                echo "0 results";
            }
            $conn->close();
    ?>
    <?php
 
 $dataPoints = array(
     array("x"=> 10, "y"=> $xiaomi),
     array("x"=> 20, "y"=> $sony),
     array("x"=> 30, "y"=> $samsung),
     array("x"=> 40, "y"=> $lg)
 );
     
 ?>
    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1", 
	title:{
		text: "Summary chart"
	},
	data: [{
		type: "column", 
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</body>
</html>