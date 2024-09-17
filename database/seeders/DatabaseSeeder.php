<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

     
    \App\Models\User::factory(10)->create();
    $officer=\App\Models\Officar::factory()->create([
        'Office_Name'=>'grar',
        'address'=>'azaz',
        'Country'=>'sy',
        'current_balance'=>4500,
      ]);
   
      \App\Models\Officar::factory()->create([
        'Office_Name'=>'alnsem',
        'address'=>'adlb',
        'Country'=>'sy',
        'current_balance'=>6000,
      ]);
      \App\Models\Officar::factory()->create([
        'Office_Name'=>'alhkma',
        'address'=>'azaz',
        'Country'=>'sy',
        'current_balance'=>2000,
      ]);
      
      \App\Models\Remittances::factory()->create([
        'num_Remitten'=>23,
        'sending_Office'=>'alnsem',
        'Future_Office'=>'alhkma',
        'Amount_Trens'=>200,

      ]);
      \App\Models\Remittances::factory()->create([
        'num_Remitten'=>44,
        'sending_Office'=>'grar',
        'Future_Office'=>'alhkma',
        'Amount_Trens'=>200,

      ]);
      \App\Models\Remittances::factory()->create([
        'num_Remitten'=>12,
        'sending_Office'=>'alnsem',
        'Future_Office'=>'alhkma',
        'Amount_Trens'=>200,

      ]);
      \App\Models\Remittances::factory()->create([
        'num_Remitten'=>14,
        'sending_Office'=>'alhkma',
        'Future_Office'=>'alnsem',
        'Amount_Trens'=>500,

      ]);
      

      
        
        
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Currencies::factory()->create([
           'Name_Currencies'=>'syria',
           'value'=>17500,
        ]);
        \App\Models\Currencies::factory()->create([
          'Name_Currencies'=>'Turkiya',
          'value'=>30,
       ]);
       \App\Models\Currencies::factory()->create([
        'Name_Currencies'=>'Iraq',
        'value'=>2500,
     ]);
     \App\Models\Currencies::factory()->create([
      'Name_Currencies'=>'Kuwait',
      'value'=>200,
   ]);
    }
}
