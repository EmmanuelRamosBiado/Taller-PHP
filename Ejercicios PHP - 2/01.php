<html>

<head>

</head>

<body>
    <?php
    function elMayor($a, $b, &$c){
        if ($a > $b) {
            $c = $a;
        } else if ($a < $b){
            $c = $b;
        } else {
            $c = 0;
        }
    }

    $A = random_int(1,100);
    $B = random_int(1,100);
    $C = random_int(1,100);

    elMayor($A, $B, $C);

    echo "El primer número es";
    ?>
</body>

</html>