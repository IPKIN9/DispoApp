<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $con = new Staff();
        $con->create(array(
            "nama" => "from system",
            "jabatan" => "system"
        ));
    }
}
