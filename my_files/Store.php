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

if(isset($_POST['medal'])){

    $sql = 'INSERT INTO medal_results values("'.$_POST['country'].'", "'.$_POST['sport'].'", "'.$_POST['medal'].'")';
    $result = mysqli_query($link, $sql);
}
else{

    $result = "kappa";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>

<div class="box">
    <h1> <strong>Olympic Games: Store Medal Results</strong></h1>

    <form action="Store.php" method="post">
            <label for="sport">Sport</label>
            <select name="sport" id="sport">
                <option value="Archery">Archery</option>
                <option value="Sailing">Sailing</option>
                <option value="Tae-Kwon-Do">Tae-Kwon-Do</option>
                <option value="Tennis">Tennis</option>
            </select>
        <br>
            <label for="country">County</label>
            <select name="country" id="country">
                <option value="Greece">Greece</option>
                <option value="Italy">Italy</option>
                <option value="Germany">Germany</option>
                <option value="Spain">Spain</option>
            </select>


        <br>

        <p><strong>Medals</strong></p>

        <input type="radio" id="gold" name="medal" value="gold">
        <label for="gold">Gold</label><br>
        <input type="radio" id="silver" name="medal" value="silver">
        <label for="silver">Silver</label><br>
        <input type="radio" id="bronze" name="medal" value="bronze">
        <label for="bronze">Bronze</label>

        <br>
        <br>

        <button type="submit">Store</button>
        <input type="button" onclick="location.href ='Medals.php'" value="View Medal Standings">
    </form>
    <?php if($result == 1){ ?>
        
        <p style="color: green"><strong>Επιτυχής Καταχώρηση</strong></p>

    <?php ;} elseif(!$result){   ?>

        <p style="color: red"><strong>Το μετάλιο έχει ήδη καταχωρηθεί</strong></p>

    <?php } else {  ?>

    	</p><p style="color: red"><strong>Επιλέξτε μετάλιο</strong></p>

    <?php } ?>
</div>
</body>
</html>