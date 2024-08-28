<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{

    public function store(Request $request)
    {
        $recordIds = $request->input('record_id');
        $presents = $request->input('present');
        $previouses = $request->input('previous');
        $cuMs = $request->input('cu_m');
        $currents = $request->input('current');
        $arrears = $request->input('arrears');
        $totals = $request->input('total');
        $paymentCurrents = $request->input('payment_current');
        $paymentRemarks = $request->input('payment_remarks');
        $datePaids = $request->input('date_paid');
        $orNumbers = $request->input('or_number');
        $bals = $request->input('bal');

        foreach ($recordIds as $index => $recordId) {
            $record = Record::find($recordId);
            $updateData = [];

            if (isset($presents[$index])) $updateData['present'] = $presents[$index];
            if (isset($previouses[$index])) $updateData['previous'] = $previouses[$index];
            if (isset($cuMs[$index])) $updateData['cu_m'] = $cuMs[$index];
            if (isset($currents[$index])) $updateData['current'] = $currents[$index];
            if (isset($arrears[$index])) $updateData['arrears'] = $arrears[$index];
            if (isset($totals[$index])) $updateData['total'] = $totals[$index];
            if (isset($paymentCurrents[$index])) $updateData['payment_current'] = $paymentCurrents[$index];
            if (isset($paymentRemarks[$index])) $updateData['payment_remarks'] = $paymentRemarks[$index];
            if (isset($datePaids[$index])) $updateData['date_paid'] = $datePaids[$index];
            if (isset($orNumbers[$index])) $updateData['or_number'] = $orNumbers[$index];
            if (isset($bals[$index])) $updateData['bal'] = $bals[$index];

            if ($record) {
                $record->update($updateData);
            }
        }

        return redirect()->route('index'); // Assuming 'index' is the name of your route for the index page
    }
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('edit', compact('record'));
    }
    public function update(Request $request, Record $record)
{
    // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'cu_m' => 'required|string|max:255',
        /* 'present' => 'required|string|max:255',
        'previous' => 'required|string|max:255',
        'current' => 'required|string|max:255',
        'arrears' => 'required|string|max:255',
        'total' => 'required|string|max:255',
        'payment_current' => 'required|string|max:255',
        'payment_remarks' => 'required|string|max:255',
        'date_paid' => 'required|string|max:255',
        'or_number' => 'required|string|max:255',
        'bal' => 'required|string|max:255' */
        // Add other validations as needed
    ]);

    // Update the record with the new data
    $record->update([
        'name' => $request->name,
        'cu_m' => $request->cu_m,
        'present' => $request->present,
        'previous' => $request->previous,
        'current' => $request->current,
        'arrears' => $request->arrears,
        'total' => $request->total,
        'payment_current' => $request->payment_current,
        'payment_remarks' => $request->payment_remarks,
        'date_paid' => $request->date_paid,
        'or_number' => $request->or_number,
        'bal' => $request->bal
    ]);

    // Redirect back to the index page or wherever you want
    return redirect()->route('index')->with('success', 'Record updated successfully');
}


}
