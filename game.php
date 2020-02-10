<?php
session_start();

$message = "";

/*
$_SESSION['wordToGuess'] = $words[$random_word];
$_SESSION['wordToGuessArray'] = array();
$_SESSION['wordToGuessLetterCount'] = $letter_count;
$_SESSION['totalLife'] = 6;
$_SESSION['letterUsedCount'] = 0;
$_SESSION['letterUsed'] = array;
$_SESSION['gameOver'] = false;
*/


//letter used 
$total_life_dashes = implode(" ", $_SESSION['letterUsed']);

//letter used 
$words_to_guess_dashes = implode(" ", $_SESSION['wordToGuessArray']);

// when user submit new letter
if(isset($_POST['letterInput']) && $_POST['letterInput'] !=""){

  // find the position of the letter in the word
  $value = $_POST["letterInput"];
  $position = strpos($_SESSION['wordToGuess'], $value);

  // check if the word is alphabet
  if (!preg_match("/^[a-zA-Z]*$/",$value)){

    $message = "Only letters allowed";

    //check if the there is only one letter 
  }elseif(strlen($value)> 1){

    $message = "Only one letter allowed at a time";
  }elseif($position === false) {
    //if the letter is not found then add that letter to used letter array and update the remaining life
    $_SESSION['letterUsedCount']++;
    //$_SESSION['letterUsed'][] = $value;

    //$total_life_dashes
    for($i=0; $i < 6; $i++){
        if($_SESSION['letterUsed'][$i] == "_"){
          $_SESSION['letterUsed'][$i] = $value;
          break;
        }
    }
    $total_life_dashes = implode(" ", $_SESSION['letterUsed']);

    $message = "Letter not found";

    //check if the all the 6 life are used then game over
    if($_SESSION['letterUsedCount'] >= 6){
      $_SESSION['gameOver'] = true;
      $_SESSION['letterUsed'] = array();
      $message = "You Loose";
    }

  } else {

    //if the letter found and any position in the word
    //add letter to the position where it is found
    $_SESSION['wordToGuessArray'][$position] = $value;
    $words_to_guess_dashes = implode(" ", $_SESSION['wordToGuessArray']);
    $_SESSION['letterTrueGuess']++;
    $message = "Letter matched";


    //check if the all letter are guessed
    if($_SESSION['letterTrueGuess'] >= $_SESSION['wordToGuessLetterCount'] ){
      $_SESSION['gameOver'] = true;
      $_SESSION['letterUsed'] = array();
      $message = "You Won";
    }


  }
}else{
  $message = "Error: Empty input";  
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hangman</title>
      <link rel="stylesheet" href="assets/css/bootstrap.css"> 
      <link rel="stylesheet" href="assets/css/stylesheet.css">
  </head>
  <body class="bg-light">

<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/images/hangman.png" alt="" width="72" height="72">
    <h2>Hangman Game</h2>
    <p class="lead">Hangman is a paper and pencil guessing game for two or more players. One player thinks of a word, phrase or sentence and the other(s) tries to guess it by suggesting letters within a certain number of guesses.</p>
  </div>

  
  <div class="row">
 
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Game Progress/Output</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div id="hangmanPhoto">
            <span><?php echo $_SESSION['name']; ?></span>

            <?php
            $hangman_photo = "hangman0.png";
            if($_SESSION['letterUsedCount'] == 0){
              $hangman_photo = "hangman0.png";
            }
            elseif($_SESSION['letterUsedCount'] == 1){
              $hangman_photo = "hangman1.png";
            }
            elseif($_SESSION['letterUsedCount'] == 2){
              $hangman_photo = "hangman2.png";
            }
            elseif($_SESSION['letterUsedCount'] == 3){
              $hangman_photo = "hangman3.png";
            }
            elseif($_SESSION['letterUsedCount'] == 4){
              $hangman_photo = "hangman4.png";
            }
            elseif($_SESSION['letterUsedCount'] == 5){
              $hangman_photo = "hangman5.png";
            }
            elseif($_SESSION['letterUsedCount'] == 6){
              $hangman_photo = "hangman6.png";
            }
            else{
              $hangman_photo = "hangman0.png";
            }
            ?>

            <img class="d-block mx-auto mb-4" src="assets/images/<?php echo $hangman_photo; ?>" alt="" width="200">
          </div>
        </li>
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Remaining Gueses</span>
          <strong><?php echo $_SESSION['totalLife'] - $_SESSION['letterUsedCount']; ?></strong>
        </li>
      </ul>

     
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Game Board</h4>
   
        <div class="row">
          <div class="col-md-6 mb-3">
            
          <form id="gameData" action="" method="post">

            <label>Word to guess (Total Letters: <?php echo $_SESSION['wordToGuessLetterCount']  ?>)</label>
            <ul class="list-group mb-3">
              <li class="list-group-item" id="wordToGuess"><?php echo $words_to_guess_dashes; ?></li>
            </ul>
          </div>
          <div class="col-md-6 mb-3">
            <label>Letters used in guesses (Total: 6)</label>
            <ul class="list-group mb-3">
              <li class="list-group-item" id="letterUsed"><?php echo $total_life_dashes; ?></li>
            </ul>
          </div>

          <div class="col-md-6 mb-3">
            <label>Your next guess</label>
            <input type="text" class="form-control" id="letterInput" name="letterInput" value="">
          </div>

          <div class="col-md-6 mb-3">
            <label>Click the button below</label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guess</button>
          </div>

        </div>
        <hr class="mb-4">

        <div class="row">
          <div class="col-md-6 mb-3"> 
            <a class="btn btn-primary btn-lg btn-block" href="http://localhost/wad-2019/final/reset.php">Reset</a>
          </div>

          <div class="col-md-6 mb-3">
            <a class="btn btn-primary btn-lg btn-block" id="saveData">Save</a>
          </div>
          </div>
        <h4 class="mb-3">Result</h4>

        <div class="row">
          <div class="col-md-12" id="result"><?php echo $message; ?></div>
        </div>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019-2020 WAD UCP</p>
      </footer>

      
      </form>   

      <form id="gameData">
        <input type="hidden" name="pname" id="pname" value="<?php echo $_SESSION["name"]; ?>">
        <input type="hidden" name="wordToGuess" id="wordToGuess" value="<?php echo $_SESSION["wordToGuess"]; ?>">
        <input type="hidden" name="letterUsedCount" id="letterUsedCount" value="<?php echo $_SESSION["letterUsedCount"]; ?>">
        <input type="hidden" name="letterTrueGuess" id="letterTrueGuess" value="<?php echo $_SESSION["letterTrueGuess"]; ?>">
      </form>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js" charset="utf-8"></script>
  </body>   
</html>
