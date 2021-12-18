<?php
 
 class Car {
    
    protected $brand;
    protected $model;
    protected $year;
    protected $mileage;

    public function __construct($b, $m, $y, $mileage = 0) { 
        $this->brand = $b;
        $this->model = $m;
        $this->year = $y;
        $this->mileage = $mileage;
    }
    
    public function drive() {
        echo "$this->brand $this->model ($this->year, $this->mileage) driving!<br>";
    }

    public function addMileage($mileage) {
        $error = false;
        if ($mileage > 0) {
            $this->mileage += $mileage;
        } else {
            $error = true;
        }
        return [
            'error' => $error,
            'mileage' => $mileage,
        ];
    }
   
 }

 $audi = new Car('Audi', "Q5", 2021);
 $lada = new Car('Lada', 'Vesta', 2019, 15_000);
 
 $audi->drive();
 $lada->drive();

 $res = $audi->addMileage(5_000);
 if ($res['error']) {
     echo 'Не удалось увеличить пробег <br>';
 } else {
     echo "Пробег увеличен. Текущий пробег: {$res['mileage']} км. <br>";
 }

 $audi->drive();
 $lada->drive();

 class Electrocar extends Car {
     public function __construct($b, $m, $y, $mileage =0) {
         parent:: __construct($b, $m, $y, $mileage);
     }

     public function drive() {
         echo "Electrocar $this->brand $this->model ($this->year, $this->mileage) driving. <br>";
     }
 }

 $tesla = new Electrocar('Tesla', 'Model S', 2021);
 $tesla->drive();