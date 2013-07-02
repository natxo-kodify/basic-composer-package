<?php

class Roll {

    public $currentDice ;

    function __construct( $forcedRoll ) {
        if ( $forcedRoll ) $this->currentDice = $forcedRoll;
        if ( !$this->currentDice ) $this->doIt();
    }

    function doIt () {
        //implement later
        //$this->currentDice = ;
    }

}