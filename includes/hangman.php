<?php
include "db.php";


if(isset($_POST)):

    try {
        //db query
        
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
else:

endif;
