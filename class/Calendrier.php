<?php

class Calendrier{

    public  $days=['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
    private $months = ['janvier','fevrier','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre'];
    public $_month;
    public $_year;


/**
 * constructeur calendrier
 * @param int mois entre 1 et 12
 * @param int année
 */
public function __construct(?int $month=null,?int $year=null){
    
    if ($month === null) {
        $month = intval(date('m'));
    }
    if ($year === null ) {
        $year = intval(date('Y'));
    }

    if ($month<1 || $month>12){
        throw new Exception("le mois $month n'est pas valide ");
    }
    if ($year<1970) {
        throw new Exception("l'année est inferieur a 1970");
    }
    $this->_month = $month;
    $this->_year = $year;
}
public function getPremierjour(){
    return new Datetime("{$this->_year}-{$this->_month} -01");
}
public function toString():string{
    return $this->months[$this->_month -1 ] . ' ' . $this->_year;
}
public function getSemaines() {
    $start=$this->getPremierjour();
    $end = ( clone $start )->modify('+1 month -1day');
    $semaines= intval($end->format('W')) - intval($start->format('W'));
    if ($semaines<0) {
        $semaines = intval($end->format('W'));
    }
    return $semaines;
}
public function inMois($date){
    return $this->getPremierjour()->format('Y-m') === $date->format('Y-m');
}
public function nextMois(){
    $month=$this->_month + 1;
    $year=$this->_year;
    if ($month >12) {
        $month=1;
        $year +=1;
    }
    return new Calendrier($month,$year);
}
public function previousMois(){
    $month=$this->_month - 1;
    $year=$this->_year;
    if ($month <1) {
        $month=12;
        $year -=1;
    }
    return new Calendrier($month,$year);
}








}