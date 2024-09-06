<?php

// Base class Vehicle
abstract class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct(string $make, string $model, int $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding in subclasses
    final public function getDetails(): string {
        return "{$this->year} {$this->make} {$this->model}";
    }

    abstract public function startEngine(): string;
}

// Car class inheriting from Vehicle
class Car extends Vehicle {
    private $numDoors;

    public function __construct(string $make, string $model, int $year, int $numDoors) {
        parent::__construct($make, $model, $year);
        $this->numDoors = $numDoors;
    }

    public function startEngine ():string {
        return "This is a Car with 4 doors {$this->getDetails()} car.";
    }
}

// Final class Motorcycle inheriting from Vehicle
final class Motorcycle extends Vehicle {
    private $hasSidecar;

    public function __construct(string $make, string $model, int $year, bool $hasSidecar) {
        parent::__construct($make, $model, $year);
        $this->hasSidecar = $hasSidecar;
    }

    public function startEngine(): string {
        return "This is a Motorcycle {$this->getDetails()} motorcycle.";
    }
}

// ElectricVehicle interface
interface ElectricVehicle {
    public function chargeBattery(): string;
}

// ElectricCar class inheriting from Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryCapacity;

    public function __construct(string $make, string $model, int $year, int $numDoors, float $batteryCapacity) {
        parent::__construct($make, $model, $year, $numDoors);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function chargeBattery(): string {
        return "Charging the battery of the {$this->getDetails()} with {$this->batteryCapacity} kWh capacity.";
    }

    public function startEngine(): string {
        return "This is an electric car {$this->getDetails()} car.";
    }
}

// Create instances
$car = new Car("Toyota", "Camry", 2022, 4);
$motorcycle = new Motorcycle("Harley-Davidson", "Iron 883", 2021, false);
$electricCar = new ElectricCar("Tesla", "Model S", 2023, 4, 100.0);

// Demonstrate behavior
echo $car->startEngine(); // Outputs: Starting the engine of the 2022 Toyota Camry car.
echo "\n";

echo $motorcycle->startEngine(); // Outputs: Starting the engine of the 2021 Harley-Davidson Iron 883 motorcycle.
echo "\n";

echo $electricCar->startEngine(); // Outputs: Starting the electric engine of the 2023 Tesla Model S car.
echo "\n";

echo $electricCar->chargeBattery(); // Outputs: Charging the battery of the 2023 Tesla Model S with 100.0 kWh capacity
