<html>
<head>
<style>
table{
margin-top:-250px;
margin-left:600px;
}
</style>
</head>

<body>

<body background="bg.png"





<p>


<a href="index.php">
<IMG STYLE="position:absolute;
			TOP:125px;
			LEFT:210px; 
			WIDTH:180px; 
			HEIGHT:40px" 
			SRC="home.jpg">

</a>
</p>

<p>


<a href="about.php">
<IMG STYLE="position:absolute;
			TOP:125px;
			LEFT:390px; 
			WIDTH:180px; 
			HEIGHT:40px" 
			SRC="https://rchander716.000webhostapp.com/about.jpg">

</a>
</p>

<p>


<a href="places.php">
<IMG STYLE="position:absolute;
			TOP:125px;
			LEFT:570px; 
			WIDTH:180px; 
			HEIGHT:40px" 
			SRC="places.jpg">

</a>
</p>

<p>


<a href="feedback.php">
<IMG STYLE="position:absolute;
			TOP:125px;
			LEFT:750px; 
			WIDTH:180px; 
			HEIGHT:40px" 
			SRC="feedback1.jpg">

</a>
</p>

<p>


<a href="developer.php">
<IMG STYLE="position:absolute;
			TOP:125px;
			LEFT:930px; 
			WIDTH:180px; 
			HEIGHT:40px" 
			SRC="developer.jpg">

</a>
</p>

<p>

<!a href="https://www.facebook.com">
<!img src="start.png" alt="Go to W3Schools!" width="60" height="60" border="0">
<!/a>
</p>


<br /> <br /> <br /> <br /><br /> <br /><br /> <br />
<p>Enter your name and answer the following question for your desired trip: </p>

<form method="post" action="home.php">
Name:  &nbsp;&nbsp;&nbsp; <input type="text" name="name" value=""><br>




  
  


<label>
1. What is preferred idea of an outing ?</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<select id="destination_preferences"  name="idea">
<option value="1">Social Nights</option>
<option value="2">Museums and Forts</option>
<option value="3">Springs and Natural Reserves</option>
<option value="4">Beaches</option> 
</select>


<br /> <br />
<label>2. What is your estimated budget ?</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="budget_preferences" name="budget">
<option value="1">less than $20 to $50</option>
<option value="2">$50 to $100</option>
<option value="3">$100 to $150</option>
<option value="4">greater than $150</option> 
</select>
<br / > <br />
3. What are your transportation preferences ?
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="transportation_preferences" name="transportation" >
<option value="1">own car</option>
<option value="2">rent a car</option>
<option value="3">Bus</option>
<option value="4">Uber</option> 
</select>
<label for="4">
<br /> <br />
4. What are your lodging requirements ?</label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="lodging_preferences" name="lodging">
<option value="1">Party Theme</option>
<option value="2">Cottage Style</option>
<option value="3">Condominium Hotels</option>
<option value="4">Resorts</option>
</select>
<br /> <br />
<label for="5">5. What is the duration of your outing ?</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="duration_preferences"  name="duration">
<option value="1">less than 5 hours</option>
<option value="2">5-24 hours</option>
<option value="3">1-2 days</option>
<option value="4">greater than 2 days</option>
</select>

<br /> <br />

<script>
function myFunction() {
    document.getElementById("frm1").submit();
}
</script>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


  <input type="submit" name="submit"  value="Submit"> <br />
</form>


</body>
</html>
<?php

$username = "id1136327_root";
$password = "hitesh";
$hostname = "localhost"; 

$dbhandle = mysqli_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysqli_select_db($dbhandle,"id1136327_examples") 
  or die("Could not select examples");

if(isset($_POST['submit'])){
$name=$_POST['name'];
$idea=$_POST['idea'];
//$email=$_POST['email'];
$budget=$_POST['budget'];
$transportation=$_POST['transportation'];
$lodging=$_POST['lodging'];
$duration=$_POST['duration'];

$query= "Insert into data1(name,idea,budget,transportation,lodging,duration,forcompare) values('$name','$idea','$budget','$transportation','$lodging','$duration',$idea+ $budget+ $transportation +$lodging + $duration)";
mysqli_query($dbhandle,$query);

$total=$idea+ $budget+ $transportation +$lodging + $duration;
$total1=$total-1;
$total2=$total+1;
$sql = "SELECT * FROM data1 where forcompare >='$total1' and forcompare <='$total2' limit 1,5";
if($result = mysqli_query($dbhandle, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
        echo "<th>Name</th>";
echo "<th></th>";
                echo "<th>Destination</th>";
echo "<th></th>";
                echo "<th>Budget</th>";
echo "<th></th>";
                echo "<th>Transportation</th>";
echo "<th></th>";                
echo "<th>Lodging</th>";
echo "<th></th>";
echo "<th>Duration</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";

echo "<td>" .$row['name'] . "</td>";
echo "<td> </td>";

                $idea1= $row['idea'];
$quer1="select idea2 from ideatext where sno='$idea1'";
$result_idea=mysqli_query($dbhandle,$quer1);
$row1=mysqli_fetch_array($result_idea);
echo "<td>" .$row1['idea2'] . "</td>";
echo "<td> </td>";
                $budget1= $row['budget'];
$quer2="select budget2 from budgettext where sno='$budget1'";
$result_idea1=mysqli_query($dbhandle,$quer2);
$row2=mysqli_fetch_array($result_idea1);
echo "<td>" .$row2['budget2'] . "</td>";
echo "<td> </td>";
                   $transportation1= $row['transportation'];
$quer3="select transportation2 from transportationtext where sno='$transportation1'";
$result_idea2=mysqli_query($dbhandle,$quer3);
$row3=mysqli_fetch_array($result_idea2);
echo "<td>" .$row3['transportation2'] . "</td>";
             echo "<td> </td>";
                 $lodging1= $row['lodging'];
$quer4="select lodging2 from lodgingtext where sno='$lodging1'";
$result_idea3=mysqli_query($dbhandle,$quer4);
$row4=mysqli_fetch_array($result_idea3);
echo "<td>" .$row4['lodging2'] . "</td>";
                echo "<td> </td>";
 $duration1= $row['duration'];
$quer5="select duration2 from durationtext where sno='$duration1'";
$result_idea4=mysqli_query($dbhandle,$quer5);
$row5=mysqli_fetch_array($result_idea4);
echo "<td>" .$row5['duration2'] . "</td>";
               
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
       // mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
}
?>