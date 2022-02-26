<?php

namespace App\Http\Livewire;

use App\Models\IndonesiaCity;
use App\Models\IndonesiaDistrict;
use App\Models\IndonesiaProvince;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component
{

    public $name, $email, $myProvince, $myCity, $myDistrict;
    public $alert = true;
    public function mount()
    {
        $this->alert = false;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->myProvince = Auth::user()->province;
        $this->myCity = Auth::user()->city;
        $this->myDistrict = Auth::user()->district;
    }
    public function render()
    {
        if ($this->myProvince) {
            $city = IndonesiaProvince::where('code', $this->myProvince)->first();
        } else {
            $city = NULL;
        }
        if ($this->myCity) {
            $district = IndonesiaCity::where('code', $this->myCity)->first();
        } else {
            $district = NULL;
        }
        return view('livewire.edit-profile', [
            'provinces' => IndonesiaProvince::get(),
            'city' => $city,
            'districts' => $district
        ]);
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'province' => $this->myProvince,
            'city' => $this->myCity,
            'district' => $this->myDistrict

        ]);

        $this->alert = true;
    }
}
