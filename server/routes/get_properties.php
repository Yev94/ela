<?php

abstract class GetProperties{
    public $table; //Recoge la ultima palabra de la URL
    public $columns; //Si en la URL hay un select recoge su valor para pedir las columnas concretas
    public $orderByColumn; //Si en la URL hay un orderByColumn recoge su valor
    public $orderType; //Igualmente, si en la URL hay un orderType recoge su valor
    public $filterByColum; //Si en la URL hay un filterByColumn recoge su valor
    public $filterEqualTo; //Si en la URL hay un filterEqualTo recoge su valor
    public $limitStartAt; //Si en la URL hay un startAt recoge su valor
    public $limitNumValues; //Si en la URL hay un limit recoge su valor
}

?>