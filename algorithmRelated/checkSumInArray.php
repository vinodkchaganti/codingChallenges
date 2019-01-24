<?php
//error_reporting(E_COMPILE_ERROR);
/**
* @Desc arraySearchBinaryNew is the function to search the given number in the given array with in the given range or not
* $targetNo Number that we need to search in the array
* $array Array of elements that we need to search for the above number
* $arrStart is the start index of the array
* $arrEnd is the end index of the array
* @Return boolean value
*/
function arraySearchBinaryNew ($targetNo, $array, $arrStart, $arrEnd)
{
    $count = $arrEnd+1;
    $binaryStart = $arrStart; $binaryEnd = $count;
    $counter = $binaryStart + (int)floor(($binaryEnd - $binaryStart) / 2);
    while ($binaryStart != $binaryEnd) {
/*        if ($binaryStart > $binaryEnd) {
//            echo  "Negative no $findNo $counter";
            return false;
        }*/
        if ($targetNo == $array[$counter]) {
            return true;
        } else if ($targetNo > $array[$counter]) {
            $binaryStart = $counter;
            $counter += (int)floor(($binaryEnd - $binaryStart) / 2);
            if ($binaryStart == $counter) {
                return false;
            }
        } else {
            $binaryEnd = $counter;
            $counter = (int)floor(($binaryEnd - $binaryStart) / 2);
            if ($binaryEnd == $counter) {
                return false;
            }
        }
    }
}

/**
* @Desc sumPartsFromArray is the function to check the sumNumber is actual sum of any two array elements or not
* $target Number that we need to search in the array
* $array Array of elements that we need to search for the above number
* @Return boolean value
*/
function sumPartsFromArray($target, array $numbers = array())
{
    /* if zero is also part of the givenArray Then this will be uncommented
     *  if ($numbers[0] == 0) {
            return (false !== array_search($target, $numbers));
        }*/
    $count = count($numbers);
    //Check the given target is in range of the array or not.
    //Compare the first element of an array
    if ($target <= $numbers[0]) {
        return false;
    } else if ($target > $numbers[$count-1]) {
        //Check the given number is greater than the largest sum of the array.
        $largestNumber = $numbers[$count-1] + $numbers[$count-2];
        if ($target > $largestNumber) {
            return false;
        } else if ($target == $largestNumber) {
            return true;
        }
    }

    $count = count($numbers);
    $binaryStart = 0;
    $binaryEnd = $count;
    $end = $count;
    $counter = $end-1;
    while ($counter >= 0) {
		//If the target Sum is less than the array element then no need to check for the sum value assuming the current counter element as one value, as we are not having zero value, Added  equal condition also to the loop.
        if ($target <= $numbers[$counter]) {
			// We don't need to check for the elements which are above the current counter value.
            $end = $counter;
            $binaryEnd = $counter;
            $counter = $end-1;
        } else {
			//We identify the second value & if it is same as the current value, then no need to check the array, as we are assuming, no duplicate elements in the array
            $secondVal = $target - $numbers[$counter];
            if ($secondVal == $numbers[$counter]) {
                $counter--;
                continue;
            }
            //We can start the search from either 0 to the element which is less than the selected element or
            // from current element to the last element.
            $arrayStartPoint = ($secondVal < $numbers[$counter]) ? 0 : $counter;
            //echo "$secondVal, , $arrayStartPoint, $end ))";
            // if php in built search functions are not advised then we can use the method which I created below.
            if (false !== arraySearchBinaryNew($secondVal, $numbers, $arrayStartPoint, $end-1)) {
                //if (false !== array_search($secondVal, array_slice($numbers, $arrayStartPoint, $end - $arrayStartPoint))) {
                return true;
            }
            $counter--;
        }
    }
    return false;

}
/**
* @Desc sumPartsFromArrayBinary This function was tried to implement using binary search for finding the sum, But giving errors for some numbers. So, Skipping this.
* for the work that I did, I kept this function, I am not using this function
* $target Number that we need to search in the array
* $array Array of elements that we need to search for the above number
* @Return boolean value
*/
function sumPartsFromArrayBinary($target, array $numbers = array())
{
    /* if zero is also part of the givenArray Then this will be uncommented
     *  if ($numbers[0] == 0) {
            return (false !== array_search($target, $numbers));
        }*/
    $count = count($numbers);
    //Check the given target is in range of the array or not.
    //Compare the first element of an array
    if ($target <= $numbers[0]) {
        return false;
    } else if ($target > $numbers[$count-1]) {
        //Check the given number is greater than the largest sum of the array.
        $largestNumber = $numbers[$count-1] + $numbers[$count-2];
        if ($target > $largestNumber) {
            return false;
        } else if ($target == $largestNumber) {
            return true;
        }
    }

    $count = count($numbers);
    $binaryStart = 0;
    $binaryEnd = $count;
    $end = $count;
    $counter = $binaryStart + (int)floor(($binaryEnd - $binaryStart) / 2);
    while ($binaryStart != $binaryEnd) {
/*        if ($counter < 0) {
 //           echo "Main Index negative : $target $counter";
        } else if ($counter == 0) {
 //           echo "Main Index zero : $target $counter";
        }*/
        if ($target <= $numbers[$counter]) {
            $end = $counter;
            $binaryEnd = $counter;
            $counter = (int)floor(($binaryEnd - $binaryStart) / 2);
            if ($binaryEnd == $counter) {
                return false;
            }
        } else {
            $secondVal = $target - $numbers[$counter];
            if ($secondVal == $numbers[$counter]) {
                $binaryEnd = $counter;
                $counter = (int)floor(($binaryEnd - $binaryStart) / 2);
                if ($binaryEnd == $counter) {
                    return false;
                }
                continue;
            }
            //We can start the search from either 0 to the element which is less than the selected element or
            // from current element to the last element.
            $arrayStartPoint = ($secondVal < $numbers[$counter]) ? 0 : $counter;
            //echo "$secondVal, , $arrayStartPoint, $end ))";
            // if php in built search functions are not advised then we can use the method which I created below.
            if (false !== arraySearchBinaryNew($secondVal, $numbers, $arrayStartPoint, $end-1, $numbers[$counter])) {
            //if (false !== array_search($secondVal, array_slice($numbers, $arrayStartPoint, $end - $arrayStartPoint))) {
                return true;
            }
            if ($secondVal > $numbers[$counter]) {
                $binaryStart = $counter;
                $counter += (int)floor(($binaryEnd - $binaryStart) / 2);
                if ($binaryStart == $counter) {
                    return false;
                }
            } else {
                $binaryEnd = $counter;
                $counter = (int)floor(($binaryEnd - $binaryStart) / 2);
                if ($binaryEnd == $counter) {
                    return false;
                }
            }
        }
        echo "\n $binaryEnd - $binaryStart  $counter \n";
    }
    return false;
}
/**
* This function is to get the sums of all two elements in the array.
* $array Array of elements given by the user
* @Return Param Array
*/
function getSumArray($array)
{
    $sumArray = array();
    $count = count($array);
    for ($counter = 0; $counter < $count; $counter++) {
        for ($secCounter = 0; $secCounter < $count; $secCounter++) {
            if ($counter != $secCounter) {
                $sum = $array[$counter] + $array[$secCounter];
                if (!in_array($sum, $sumArray)) {
                    $sumArray[] = $sum;
                }
            }
        }
    }
    sort($sumArray);
    return $sumArray;
}

/**
* This function is to generate the random array with the length
* $length Length of the pre defined array
* $max Max value in the arrya
* $min Min value in the array
* @Return Param Array with generated Random values
*/
function generateRandomArr($length, $max, $min = 1)
{
    $randArr = array();
    while ($length > 0) {
        $randNo = rand($min, $max);
        if (!in_array($randNo, $randArr)) {
            $randArr[] = $randNo;
            $length--;
        }
    }
    sort($randArr);
    return $randArr;
}
$array = array(1,3,5,8,12,13,22);
/** To generate Random array & to test uncomment the below method.*/
//$array = generateRandomArr(20, 100, 4);
//$array = Array(7,8,9,13,18,22,26,34,38,40,52,53,57,58,59,62,69,84,95,99);
//var_dump(sumPartsFromArrayBinary(34, $array));die;
//var_dump(sumPartsFromArray(14, $array));die;
//Testing the code :
$getSumArray = getSumArray($array);
$i = 1;
$calArray = array();

while ($i < 200) {
    $result = sumPartsFromArray($i, $array);
    if (false != $result) {
        $calArray[] = $i;
    }
    $i++;
}
/** to Check that the assertion is working fine or not, added one extra element, so that we will get failed case */
//$getSumArray[] = 55;
//print_r(array_diff($calArray, $getSumArray));
//print_r(array_diff($getSumArray, $calArray));
//print_r($array);
/** We are validating the diff in both the arrays, if the diff in both sides is zero, then all the elements are successfully validated with the created function */
if (0 == count(array_diff($calArray, $getSumArray)) && 0 == count(array_diff($getSumArray, $calArray))) {
    echo 'Function working fine:-)';
} else {
    echo 'There is some bug in code!!!!!!';
}