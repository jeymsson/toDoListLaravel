<?php

namespace App\Http\Controllers;

use App\Country;
use App\States;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        // $base = States::find(1)->country;
        // $this->indexBelongsTo();
        // $this->indexHasMany();
        $this->cache();
    }
    public function cache()
    {
        $valdd = 60; // segundos
        $base = Cache::remember('Country', $valdd, function () {
            return Country::with('states')->get();
        });
        echo '<table>';
        echo '<tr>',
            '<td>Cod</td>',
            '<td>País</td>',
            '<td></td>',
            '</tr>';
        // dd($base->toArray());
        foreach ($base as $key => $val) {
            // dd($val, $base);
            echo '<tr><td>',
                $val['id'],
                '</td><td>',
                $val['name'],
                '</td><td>',
                $val['country']['name'],
                '</td></tr>';

            echo '<tr>',
                '<td>Cod</td>',
                '<td>Estado</td>',
                '</tr>';
            // dd($base->toArray());

            foreach ($val['states'] as $key => $v) {
                // dd($v, $base);
                echo '<tr><td>',
                    $v['id'],
                    '</td><td>',
                    $v['name'],
                    '</td></tr>';
            }
        }
    }
    public function indexHasMany()
    {
        // $base = Country::all();
        $base = Country::with('states')->get();
        echo '<table>';
        echo '<tr>',
            '<td>Cod</td>',
            '<td>País</td>',
            '<td></td>',
            '</tr>';
        // dd($base->toArray());
        foreach ($base as $key => $val) {
            // dd($val, $base);
            echo '<tr><td>',
                $val['id'],
                '</td><td>',
                $val['name'],
                '</td><td>',
                $val['country']['name'],
                '</td></tr>';

            echo '<tr>',
                '<td>Cod</td>',
                '<td>Estado</td>',
                '</tr>';
            // dd($base->toArray());

            foreach ($val['states'] as $key => $v) {
                // dd($v, $base);
                echo '<tr><td>',
                    $v['id'],
                    '</td><td>',
                    $v['name'],
                    '</td></tr>';
            }
        }
    }
    public function indexBelongsTo()
    {
        $base = States::all();
        echo '<table>';
        echo '<tr>',
            '<td>Cod</td>',
            '<td>Estado</td>',
            '<td>País</td>',
            '<tr>';
        for ($i = 0; $i < count($base); $i++) {
            echo '<tr><td>',
                $base[$i]['id'],
                '</td><td>',
                $base[$i]['name'],
                '</td><td>',
                $base[$i]['country']['name'],
                '</td><tr>';
        }
    }

    public function create()
    {
        dd('create');
    }

    public function store(Request $request)
    {
        dd('store');
    }

    public function show($id)
    {
        dd('show');
    }

    public function edit($id)
    {
        dd('edit');
    }

    public function update(Request $request, $id)
    {
        dd('update');
    }

    public function destroy($id)
    {
        dd('destroy');
    }
}
