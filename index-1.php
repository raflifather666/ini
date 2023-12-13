<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
  </head>
  <body>
   <?php
   $value = '';
   $classhasil = '';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $classhasil = $_POST['calculation'];
    if ($value === 'DEL') {
        $classhasil = substr($classhasil, 0, -1);
    }elseif ($value === '=') {
        $classhasil = str_replace('%', '/100', $classhasil);
        $classhasil = str_replace(['+','-','*','/'], ['+ ','- ','* ','/ '], $classhasil);
        $value = eval("return $classhasil;");
        $classhasil = $value;
    }elseif ($value === 'C') {
        $classhasil = '';
    }else {
        $classhasil .= $value;
    }
    }
   ?>

   <div class="comtainer mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="calculator p-2 border">
                <form action="" method="post">
                    <input class="display form-control mb-2 <?php echo $value ?>" type="text" name="calculation" value="<?php echo $classhasil ?>">
                    <div class="buttons">
                        <?php
                        $buttons = ['7','8','9','+','4','5','6','-','1','2','3','*','%','0','00','.','/','DEL','C','='];
                        foreach ($buttons as $button) {
                            $class = 'button btn';
                            if ($button === 'DEL' || $button === 'C') {
                                $class .= ' clear';
                            }
                            echo '<button class="'.$class.'" type="submit" name="value" value="'.$button.'">'.$button.'</button>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>