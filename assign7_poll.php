<html>
    
<head>
<title>Results</title>  
<link rel="stylesheet" href="poll.css">
    
</head>
<body>
    
    <h1>Results of the Clothing Store Poll: <br></h1>
    <p>Thank you for completing the poll!<p>
  <form id = "personal" action = "assign7_poll.php" method = "post">  
    <br>  
    <input type ="radio" name = "typeoutput" value ="Email"> Email List <br>
    <input type = "radio" name = "typeoutput" value = "Histogram"> Histogram <br>
    <input type=submit value="Submit">
    <br>
</form>

<div id = "colored">
    <?php
//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    if ($_POST["typeoutput"] == "Email"){
        maillist();
    }
    else if ($_POST["typeoutput"] == "Histogram"){
        histogram();
        
    }
    else if (isset($_POST["yourchoice"])){
        castvote();
    }
    
    function castvote(){
        $theemail = $_POST['youremail'];
        $pollanswer = $_POST['yourchoice']."\n";
        
        $myfile = fopen("poll.txt","r");
        while(!feof($myfile)) {
            $string = fgets($myfile);
            $string = explode(":",$string)[0];
            $string = trim($string);
            if($string==$theemail){
                echo "<h2>Invalid! You already completed this form!</h2>";
                exit;
            }
        }
        fclose($myfile);
        
        $myfile = fopen("poll.txt","a");
        fwrite($myfile, $theemail.": ".$pollanswer);
        fclose($myfile);
    }
    
    function maillist(){
        echo "<h2>List of Results: <br></h2>";
        $myfile = fopen("poll.txt","r");
        $count = 1;
        while(!feof($myfile)) {
        $string = fgets($myfile);
            if($string!= ""){
                echo $count." ".$string. "<br>";
                $count++;
            }
        }
        fclose($myfile);

    }
    
    function histogram(){
        echo "<h2>Chart of Poll Results:</h2><br>";
        $pollanswerlist = array(0,0,0,0,0);
        $arrlength = count($pollanswerlist);
        
        $myfile = fopen("poll.txt","r");
        
        while(!feof($myfile)){
            $value = fgets($myfile);
            $value = explode(":",$value)[1];
            $value = trim($value);
            if ($value == "Zara"){
                $pollanswerlist[0]+=1;
            }
            else if ($value == "Bershka"){
                $pollanswerlist[1]+=1;
            }
            else if ($value == "Topshop"){
                $pollanswerlist[2]+=1;
            }
            else if ($value == "Urban Outfitters"){
                $pollanswerlist[3]+=1;
            }
            else if($value == "American Eagle"){
                $pollanswerlist[4]+=1;
            }
            else{
                
            }
        }
        
        echo "<table>";

        for($x = 0; $x<$arrlength; $x++){
            echo "<tr>";
            if($x==0){
                echo "<td>Zara</td>"."<td>".$pollanswerlist[$x]."</td>";
            }
            else if($x==1){
                echo "<td>Bershka</td>"."<td>".$pollanswerlist[$x]."</td>";
            }
            else if($x==2){
                echo "<td>Topshop</td>"."<td>".$pollanswerlist[$x]."</td>";
            }
            else if($x==3){
                echo "<td>Urban Outfitters</td>"."<td>".$pollanswerlist[$x]."</td>";
            }
            else{
                echo "<td>American Eagle</td>"."<td>".$pollanswerlist[$x]."</td>";
            }
            $width = $pollanswerlist[$x]*30;
            //$image = imagecreatetruecolor($width, 30);
            //$color_rect = imagecolorallocate($image, 255, 20, 147);
            echo "<td>";
            if ($width!=0){
                echo "<img src = 'rectangle.php?w=$width'/>";
            }
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    ?>

</div>
      
    
</body>

</html>