<?php

namespace App\Livewire;

use Livewire\Component;
// use Native\Laravel\Facades\Notification;

class BmiCalculatorForm extends Component
{
    public $weight;
    // height in cm
    public $height;
    public $bmi;
    public $bmi_category;
    public $health_risk;
    public $suggestion;
    public function render()
    {
        return view('livewire.bmi-calculator-form');
    }
    public function calculate()
    {
        $this->validate();
        $this->bmi = $this->weight / pow($this->getHeightInMeters(), 2);
        $this->bmi_category = $this->bmi < 18.5 ? 'Underweight' : ($this->bmi < 25 ? 'Normal' : ($this->bmi < 30 ? 'Overweight' : 'Obese'));
        $this->health_risk = $this->bmi_category == 'Underweight' ? 'Malnutrition risk' : ($this->bmi_category == 'Normal' ? 'Low risk' : ($this->bmi_category == 'Overweight' ? 'Enhanced risk' : '
        Moderate risk'));
        // also mention the normal weight range for the category
        $this->suggestion = $this->bmi_category == 'Underweight' ? 'Increase your weight' : ($this->bmi_category == 'Normal' ? 'You are in the normal weight range' : ($this->bmi_category == 'Overweight' ? 'Reduce your weight' : 'Reduce your weight'));
        $this->dispatch('bmiCalculated');
        $this->reset(["height", "weight"]);
        // Notification::title('Hello from NativePHP')
        //     ->message('This is a detail message coming from your Laravel app.')
        //     // ->event(\App\Events\MyNotificationEvent::class)
        //     ->show();
    }
    protected function rules()
    {
        return [
            'height' => 'required|numeric|min:1|min:50|max:300',
            'weight' => 'required|numeric|min:1|min:10|max:500'
        ];
    }
    protected function getHeightInMeters()
    {
        return $this->height / 100;
    }
    public function resetForm()
    {
        $this->reset();
    }
}
