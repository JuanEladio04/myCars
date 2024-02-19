<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateCar extends Component
{
    use WithFileUploads;
    public $showForm = false;

    public $plate;
    public $marca;
    public $model;
    public $year;
    public $last_revision_date;
    public $photo;
    public $price;

    #[On('updatelist')]
    public function render()
    {
        return view('livewire.create-car');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function insertCar()
    {
        $photoName = time() . "-" . $this->photo->getClientOriginalName();
        $this->photo->storeAs('public/cars', $photoName);
        Car::create([
            'plate' => $this->plate,
            'marca' => $this->marca,
            'model' => $this->model,
            'year' => $this->year,
            'last_revision_date' => $this->last_revision_date,
            'photo' => $photoName,
            'price' => $this->price,
            'user_id' => Auth::id(),
        ]);

        $this->showForm = false;
    }
}
