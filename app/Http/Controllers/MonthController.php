<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Month;
use App\Models\Record;

class MonthController extends Controller
{
    public function index()
    {
        $months = Month::all();

        return view('index', compact('months'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'month' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        // Create a new month using the provided month and year
        $month = Month::create($request->only('month', 'year'));

// Default NAMES to be added to the data table
        $defaultNames =[
        'ABAD, NEREUS JETHRO',
        'ABITAN, JOSEPH',
        'ACOPIO, DANIEL',
        'ALMODIENTE, ALAN',
        'AMOR, ROSIE',
        'ANDREN, CHITA',
        'BADIE, REGGIE',
        'BALBASTRO, FREMIE',
        'BALLESTEROS, JONILDA',
        'BARBON, DANILO',
        'BENNET, ROSEMARIE',
        'BAYONA, NEFERTITO',
        'BUENVIAJE, COSETTE',
        'CABRAS, ZION',
        'CALUMBA, CRISPIN',
        'CAMERA, WILBERT',
        'CASSADOR, EMELDO',
        'CALVO, ROSALITA',
        'CARDENAL, MARIE JOY',
        'CARPIO, AL JOHN',
        'CLARIN, JOHN FEDERICK',
        'CORPEZ, JESSIE',
        'CORDERO, AILYN',
        'CUROT, JACQUELINE',
        'DAYOT, RIZAL',
        'DEFIESTA, SHEILA',
        'DEGRACIA, CHARLYN',
        'DELA CRUZ, MARILOU',
        'DEQUIT, RANNEL',
        'DE LEON, JANE',
        'DESTACAMENTO, RUDANTE',
        'DELA CERNA, RAYMUND'
        ];

        // Loop through each default name and create a new data entry
        foreach ($defaultNames as $name) {
            Record::create([
                'name' => $name,
                'month_id' => $month->id,
            ]);
        }

        // Retrieve the records to display in the table
        $records = Record::where('month_id', $month->id)->get();
        // Return the view with the records
        return view('show', compact('records'));
    }

    public function show($id)
    {
        $records = Record::where('month_id', $id)->get();
        return view('show', compact('records'));
    }
}
