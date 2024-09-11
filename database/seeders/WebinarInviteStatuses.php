<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebinarInviteStatus;

class WebinarInviteStatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        WebinarInviteStatus::updateOrCreate(['id' => 1], ['name' => 'Pending', 'color' => '#FFA500', 'icon' => 'fa fa-clock', 'order' => 1, 'is_active' => 1, 'description' => '']);
        WebinarInviteStatus::updateOrCreate(['id' => 2], ['name' => 'Accepted', 'color' => '#28a745', 'icon' => 'fa fa-check', 'order' => 2, 'is_active' => 1, 'description' => '']);
        WebinarInviteStatus::updateOrCreate(['id' => 3], ['name' => 'Rejected', 'color' => '#dc3545', 'icon' => 'fa fa-times', 'order' => 3, 'is_active' => 1, 'description' => '']);
        WebinarInviteStatus::updateOrCreate(['id' => 4], ['name' => 'Canceled', 'color' => '#6c757d', 'icon' => 'fa fa-ban', 'order' => 4, 'is_active' => 1, 'description' => '']);

    }
}
