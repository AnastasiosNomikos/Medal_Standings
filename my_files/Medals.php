<?php

$link = mysqli_connect('localhost', 'root','');

mysqli_set_charset($link, 'utf8');

if (!$link){
	die('Could not connect: '.mysqli_error($link));
}


$db_selected = mysqli_select_db($link, 'olympicgames_db');

if (!$db_selected){
	die('Could not connect to database: '. mysqli_error($link));
}


$sql1 = 'SELECT Country, COUNT(*) FROM medal_results GROUP BY Country';
$sql2 = 'SELECT * FROM medal_results';


$countries = mysqli_query($link, $sql1);
$result = mysqli_query($link, $sql2);
$result2 = mysqli_query($link, $sql2);
$result3 = mysqli_query($link, $sql2);

$result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Medals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Medals</title>
</head>
<body>

<div class="box">

	<div class="flex">
		<h2><strong>Medal Standings</strong></h2>
    	<button class="btn" onclick="location.href ='home.html'" ><i class="fa fa-home"></i></button>
	</div>
   
    <div class="grid-container">
        <div class="grid-item">
        	<h3>Country</h3>
        	<?php 
        		$count = 0;
        		while($row = mysqli_fetch_assoc( $countries )):
        	 ?>
           
            <p><?php echo $row['Country']; ?> : <?php echo $row['COUNT(*)']; ?></p> <div class="bar"><div id="progress" style="width:  <?php echo $row['COUNT(*)'] / $result->num_rows * 100 , '%'; ?>"></div></div> 

			<?php endwhile; ?>

        </div>
        <div class="grid-item">
            <form action="Medals.php" method="get">
                <h3></h3>
                <label for="country" style="font-size: large"><strong>Details for</strong></label>
                <select name="country" id="country" onchange="this.form.submit()">
                    <option>Choose Country</option>
                    <option value="Greece" <?php if(isset($_GET["country"])){if(htmlspecialchars($_GET["country"]) == "Greece"): echo "selected"; endif; }?> >Greece</option>
                    <option value="Italy" <?php if(isset($_GET["country"])){if(htmlspecialchars($_GET["country"]) == "Italy"): echo "selected"; endif; }?> >Italy</option>
                    <option value="Germany" <?php if(isset($_GET["country"])){if(htmlspecialchars($_GET["country"]) == "Germany"): echo "selected"; endif; }?> >Germany</option>
                    <option value="Spain" <?php if(isset($_GET["country"])){if(htmlspecialchars($_GET["country"]) == "Spain"): echo "selected"; endif; }?>>Spain</option>
                </select>
            </form>
            
                <p id="gold">Gold: <span style="color:white;">~</span>
                    <?php 
                        while($row = mysqli_fetch_assoc( $result )){ 
                            if(isset($_GET["country"])){ 
                                if(htmlspecialchars($_GET["country"]) == $row['Country']){ ?>
                                    <span style="color:white;">
                                        <?php if($row['Medal'] == 'gold'){echo $row['Sport'], ' ~ ';} ?>    
                                    </span>
                    <?php }}} ?>
                </p>
               
                <p id="silver">Silver: <span style="color:white;">~</span>
                    <?php 
                        while($row = mysqli_fetch_assoc( $result2 )){ 
                            if(isset($_GET["country"])){ 
                                if(htmlspecialchars($_GET["country"]) == $row['Country']){ ?>
                                    <span style="color:white;">
                                        <?php if($row['Medal'] == 'silver'){echo $row['Sport'], ' ~ ';}?>
                                    </span>
                    <?php }}} ?>
                </p>
                <p id="bronze">Bronze: <span style="color:white;">~</span>
                    <?php 
                        while($row = mysqli_fetch_assoc( $result3 )){ 
                            if(isset($_GET["country"])){ 
                                if(htmlspecialchars($_GET["country"]) == $row['Country']){ ?>
                                    <span style="color:white;">
                                        <?php if($row['Medal'] == 'bronze'){echo $row['Sport'], ' ~ ';}?>
                                    </span>
                    <?php }}} ?>
                </p>
        </div>
    </div>
</div>


</body>
</html>