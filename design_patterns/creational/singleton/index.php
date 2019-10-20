<?php

// https://github.com/kamranahmedse/design-patterns-for-humans#-builder

include "door.php";
include "woodendoor.php";
include "doorfactory.php";

// Make me a door of 100x200
$door = DoorFactory::makeDoor(100, 200);

echo 'Width: ' . $door->getWidth();
echo "<br/>";
echo 'Height: ' . $door->getHeight();
