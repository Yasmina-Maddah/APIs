<?php
function isPalindrome($str) {
    $length = strlen($str);
    for ($i = 0; $i < $length / 2; $i++) {
        if ($str[$i] !== $str[$length - $i - 1]) {
            return false; 
        }
    }
    return true; 
}
echo isPalindrome("madam") ? "true\n" : "false\n"; 
echo isPalindrome("hello") ? "true\n" : "false\n";
?>