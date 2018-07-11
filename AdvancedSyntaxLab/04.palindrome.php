<?php
function isPalindrome($str) {
    for ($i = 0; $i < strlen($str) / 2; $i++)
        if ($str[$i] != $str[strlen($str) - $i - 1]) {
            echo "false";
            return false;
        }
    echo "true";
    return true;
}
isPalindrome("abcvvcba");