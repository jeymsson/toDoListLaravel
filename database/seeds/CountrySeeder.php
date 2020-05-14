<?php

use App\Country;
use App\States;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Country::create(['id' => 1, 'name' => 'Brasil']);
        Country::create(['id' => 2, 'name' => 'USA']);
        Country::create(['id' => 3, 'name' => 'England']);

        States::create(['country_id' => 1, 'name' => 'Ceará']);
        States::create(['country_id' => 1, 'name' => 'Rio de Janeiro']);
        States::create(['country_id' => 1, 'name' => 'São Paulo']);
        States::create(['country_id' => 1, 'name' => 'Rio Grande do Sul']);
        States::create(['country_id' => 2, 'name' => 'Ohio']);
        States::create(['country_id' => 2, 'name' => 'N. Virginia']);
        States::create(['country_id' => 2, 'name' => 'Kansas']);
        States::create(['country_id' => 2, 'name' => 'New York']);
        States::create(['country_id' => 3, 'name' => 'Berkshire']);
        States::create(['country_id' => 3, 'name' => 'Cambridgeshire']);
        States::create(['country_id' => 3, 'name' => 'Oxfordshire']);
    }
}
