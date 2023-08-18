<?php

/**
 * Arrays are contiguous (unbreakable) memory spaces that contain a certain
 * number of bytes. They have a fixed size (that means they can't grow it). 
 * There is no "insert_at", "push" or pop, but that doesn't mean you can write it.
 */

// This will create an array with the size of 10 where all slots will be null
$a = array_fill(0, 10, null);
