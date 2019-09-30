<?php
$num = "";
function numberToWords($num)
{
    $ones = array(
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen"
    );
    $tens = array(
        1 => "ten",
        2 => "twenty",
        3 => "thirty",
        4 => "forty",
        5 => "fifty",
        6 => "sixty",
        7 => "seventy",
        8 => "eighty",
        9 => "ninety"
    );
    $hundreds = array(
        "hundred",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion"
    ); //limit t quadrillion
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr);
    $text = "";
    foreach ($whole_arr as $key => $i) {
        if ($i < 20) {
            $text .= $ones[$i];
        } elseif ($i < 100) {
            $text .= $tens[substr($i, 0, 1)];
            $text .= " " . $ones[substr($i, 1, 1)];
        } else {
            $text .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            $text .= " " . $tens[substr($i, 1, 1)];
            $text .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $text .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $text .= " and ";
        if ($decnum < 20) {
            $text .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $text .= $tens[substr($decnum, 0, 1)];
            $text .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    return $text;
}

extract($_POST);
if (isset($convert)) {
    echo "<p align='center' style='color:blue'>" . numberToWords("$num") . "</p>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conver Number to Words in PHP</title></head>
<body>
<form method="post">
    <table border="1" align="center">
        <tr>
            <td>Enter Your Numbers</td>
            <td><input type="text" name="num" value="<?php if (isset($num)) {
                    echo $num;
                } ?>"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Conver Number to Words" name="convert"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
