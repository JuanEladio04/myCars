<?php
namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarForm extends Component
{
    public $nombre;
    public $buscar;
    public $campoOrden = "id";
    public $orden = "asc";

    public function render()
    {
        $cars = Car::where('marca', 'like', '%' . $this->buscar . '%')
            ->orWhere('model', 'like', '%' . $this->buscar . '%')
            ->orderBy($this->campoOrden, $this->orden)
            ->get();
        return view('livewire.car-form', compact('cars'));
    }

    public function orderBy($col)
    {
        if ($this->campoOrden == $col) {
            if ($this->orden == "asc") {
                $this->orden = "desc";
            } else {
                $this->orden = "asc";
            }
        } else {
            $this->campoOrden = $col;
            $this->orden = "asc";
        }
    }

    
}
