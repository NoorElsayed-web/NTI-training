<?php
  /*  1) IF / ELSE
   Check age */
$age = 20;

if ($age >= 18) {
    echo "You are allowed to register.";
} else {
    echo "You are not allowed to register.";
}

echo "<br><br>";
   /* 2) FUNCTION
   Two parameters:
   multiplication, subtraction and division */
  function calculate($num1, $num2)
{
    $multiplication = $num1 * $num2;
    $subtraction = $num1 - $num2;

    if ($num2 != 0) {
        $division = $num1 / $num2;
    } else {
        $division = "Cannot divide by zero";
    }

    echo "Multiplication = " . $multiplication . "<br>";
    echo "Subtraction = " . $subtraction . "<br>";
    echo "Division = " . $division . "<br>";
}

calculate(10, 5);

echo "<br><br>";
   /* 3) FUNCTION WITH ARRAY
   Function receives an array and returns its sum
 */  function arraySum($numbers)
{
    $sum = 0;

    foreach ($numbers as $number) {
        $sum += $number;
    }

    return $sum;
}

$numbers = [10, 20, 30, 40];

echo "Array Sum = " . arraySum($numbers);

echo "<br><br>";
   /* 4) SEARCH IN ARRAY
   Search for a film
   Result: Yes / No */
$films = array("Fast", "Predestination", "Persuit", "Prestige");
$keyword = "avatar";

$found = false;

foreach ($films as $film) {

    if (strtolower($film) == strtolower($keyword)) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "Yes";
} else {
    echo "No";
}

echo "<br><br>";
  /*  5) BUBBLE SORT
   Function sorts an array using Bubble Sort
 */ function RouteBubble($array)
{
    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {

        for ($j = 0; $j < $length - $i - 1; $j++) {

            if ($array[$j] > $array[$j + 1]) {

                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

$tests = array(6, 4, 9, 3, 12, 8, 7);

$sortedArray = RouteBubble($tests);

echo "Bubble Sort:<br>";

foreach ($sortedArray as $number) {
    echo $number . " ";
}

echo "<br><br>";
   /* 6) MAX
   Find the biggest number in an array */
$tests = array(5, 4, 9, 3, 1, 7, 5, 8, 6);

$max = $tests[0];

foreach ($tests as $number) {

    if ($number > $max) {
        $max = $number;
    }
}

echo "Max = " . $max;

echo "<br><br>";
   /* 7) COUNTING
   Count how many times a film appears */
$films = array("avatar", "Prestige", "avatar", "Prestige");
$keyword = "avatar";

$count = 0;

foreach ($films as $film) {

    if (strtolower($film) == strtolower($keyword)) {
        $count++;
    }
}

echo $keyword . " appears " . $count . " times.";

echo "<br><br>";
   /* 8) RANDOM PASSWORD
   Function receives a number.
   Returns a random string with that number of characters. */
 function RouteRandomPass($length)
{
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $password = "";

    for ($i = 0; $i < $length; $i++) {

        $randomIndex = rand(0, strlen($characters) - 1);

        $password .= $characters[$randomIndex];
    }

    return $password;
}

echo "Random Password = " . RouteRandomPass(8);

echo "<br><br>";
   /* 9) BOOLEAN
   Convert different data types to Boolean
   Display Yes / No */
$tests = array(1, "tariq", 1.5, true, 7, 's', false);

foreach ($tests as $value) {

    if (is_bool($value)) {

        if ($value == true) {
            echo "Yes<br>";
        } else {
            echo "No<br>";
        }

    } else {

        echo $value . "<br>";
    }
}

echo "<br><br>";
  /* 10) SORTING
   Sort numbers using while + for */
$tests = array(6, 4, 9, 3, 12, 8, 7);

$i = 0;

while ($i < count($tests) - 1) {

    for ($j = 0; $j < count($tests) - $i - 1; $j++) {

        if ($tests[$j] > $tests[$j + 1]) {

            $temp = $tests[$j];
            $tests[$j] = $tests[$j + 1];
            $tests[$j + 1] = $temp;
        }
    }

    $i++;
}

echo "Sorted Array:<br>";

foreach ($tests as $number) {
    echo $number . " ";
}

echo "<br><br>";
   /* 11) SAME VALUES
   Find common values between two arrays */
$arr1 = array('a', 'b', 'c', 'd');
$arr2 = array('c', 'd', 'e', 'f');

echo "Same Values:<br>";

foreach ($arr1 as $value1) {

    foreach ($arr2 as $value2) {

        if ($value1 == $value2) {
            echo $value1 . " - ";
        }
    }
}

echo "<br><br>";

?>
     <!-- 12) FORM - GET / POST
     E-commerce discount -->
<h2>E-commerce Discount</h2>

<form method="POST">

    <label>Product Price:</label>
    <input type="text" name="price">

    <br><br>

    <label>Quantity:</label>
    <input type="text" name="quantity">

    <br><br>

    <button type="submit" name="calculate">
        Calculate
    </button>

</form>

<br>

<?php
 /*  Task 12 Logic */
   
if (isset($_POST["calculate"])) {

    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    // Check if inputs are numbers
    if (!is_numeric($price) || !is_numeric($quantity)) {

        echo "Please enter numbers only.";

    } 
    // Check negative numbers
    elseif ($price < 0 || $quantity < 0) {

        echo "Numbers cannot be negative.";

    } 
    // Valid input
    else {

        $totalPrice = $price * $quantity;

        // Discount
        if ($totalPrice > 1000) {

            $discountPercentage = 15;

        } else {

            $discountPercentage = 10;
        }

        $discountValue = $totalPrice * ($discountPercentage / 100);

        $finalPrice = $totalPrice - $discountValue;

        echo "Total Price = " . $totalPrice . " EGP<br>";
        echo "Discount = " . $discountPercentage . "%<br>";
        echo "Discount Value = " . $discountValue . " EGP<br>";
        echo "Final Price = " . $finalPrice . " EGP";
    }
}

?>

