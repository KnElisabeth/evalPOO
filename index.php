<?php

spl_autoload_register(function($class){
    require 'classes/' .$class. '.php';
});

$lucie = new Warrior('Lucie');
$anto = new Mage('Anto');
$archer= new Archer('Archer');

// Characters attacking while both alive
while ($lucie->isAlive() && $anto->isAlive()) {
    // First Character attacking the 2nd
    echo $lucie->action($anto);
    // Check if target is alive
    if (!$anto->isAlive()) {
        echo '<br>';
        echo "$anto->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the first
    echo $anto->action($lucie);
    // Check if target is alive
    if (!$lucie->isAlive()) {
        echo '<br>';
        echo "$lucie->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Third Character attaking the first
    echo $archer->shoot($lucie);
    // Check if target is alive
    if (!$lucie->isAlive()) {
        echo '<br>';
        echo "$lucie->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Third Character attaking the second
    echo $archer->shoot($anto);
    // Check if target is alive
    if (!$anto->isAlive()) {
        echo '<br>';
        echo "$anto->pseudo est KO!";
        break;
    };
    echo '<br>';

    // First Character attacking the 3rd
    echo $lucie->action($archer);
    // Check if target is alive
    if (!$archer->isAlive()) {
        echo '<br>';
        echo "$archer->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the 3rd
    echo $anto->action($archer);
    // Check if target is alive
    if (!$lucie->isAlive()) {
        echo '<br>';
        echo "$archer->pseudo est KO!";
        break;
    };
    echo '<br>';

    echo '<br>';
}