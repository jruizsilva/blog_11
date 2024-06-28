<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.dashboard")]
class DashboardHomeComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-home-component');
    }
}