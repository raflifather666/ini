<?php
$calculation ='';
$animationclass='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $calculation =$_POST['calculation'];
    if ($value === 'DEL') {
        $calculation = substr($calculation, 0, -1);
    } elseif ($value === '=') {
      $calculation = str_replace('%', '/100', $calculation);
      $calculation = str_replace(['+', '-', 'x', '/'], ['+', '-', '*', '/'], $calculation);
      $calculation = eval("return $calculation;");
      $animationclass = 'result';          
    } elseif ($value === 'C') {
        $calculation = '';
    }    
    else {
        $calculation .= $value;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>Kalkulator</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="calculator p-2 border">
                    <form method="post">
                    <input class="display form-control mb-2 <?= $animationClass ?>" type="text" name="calculation" value="<?= $calculation ?>" readonly>
f

                        <div class="buttons">
                            <?php
                        $buttons =['7','8','9','+','4','5','6','-','1','2','3','x','0','.','/','C','%','DEL','=',];

                        foreach ($buttons as $button){
                            $class = 'button btn';
                            if ($button === 'C' || $button === 'DEL') {
                                $class .='clear';
                            }
                            echo '<button class="'. $class . '"type="submit" name="value" value="'. $button . '">'. $button . '</button>';
                        }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>