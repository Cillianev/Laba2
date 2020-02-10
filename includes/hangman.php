<?php
include "db.php";


if(isset($_POST)):

    try {
        
        $sql = "INSERT INTO player (pname,wordToGuess,falseGuess,trueGuess)
        VALUES ('".$_POST['pname']."','".$_POST['wordToGuess']."','".$_POST['letterUsedCount']."', '".$_POST['letterTrueGuess']."')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
else:

endif;
