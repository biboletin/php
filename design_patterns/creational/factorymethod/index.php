<?php

// https://github.com/kamranahmedse/design-patterns-for-humans#-builder
include "interviewer.php";
include "developer.php";
include "community_executive.php";
include "hiring_manager.php";
include "development_manager.php";
include "marketing_manager.php";


$devManager = new DevelopmentManager();
$devManager->takeInterview();