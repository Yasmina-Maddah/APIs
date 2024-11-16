<?php
class Node {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    public function add($value) {
        $newNode = new Node($value);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function traverseAndPrint() {
        $current = $this->head;
        while ($current !== null) {
            if ($this->countVowels($current->value) === 2) {
                echo $current->value . "\n";
            }
            $current = $current->next;
        }
    }

    private function countVowels($str) {
        $vowelCount = 0;
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

        for ($i = 0; $i < strlen($str); $i++) {
            if (in_array($str[$i], $vowels)) {
                $vowelCount++;
            }
        }

        return $vowelCount;
    }
}

$list = new LinkedList();
$list->add("apple");   
$list->add("banana");  
$list->add("cherry");  
$list->add("date");    
$list->add("grape");   

echo "Nodes with exactly 2 vowels:\n";
$list->traverseAndPrint();
?>