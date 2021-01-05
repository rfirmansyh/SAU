<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitkerja;

class UnitkerjaController extends Controller
{
    public function index()
    {
        $sumberdanas = \App\Sumberdana::all();
        $unitkerjas = Unitkerja::paginate(4);
        return view('unitkerja.index')->with([
            'unitkerjas' => $unitkerjas,
            'sumberdanas' => $sumberdanas
        ]);
    }


    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'                        => 'required|min:5|max:191',
            'description'                 => 'required',
            'sumberdana_id'                 => 'required',
        ]);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'store');

            return redirect()->route('unitkerja.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $unitkerja = new Unitkerja;
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo/unitkerja', 'public');
            $unitkerja->photo = $file;
        }
        $unitkerja->name = $request->name;
        $unitkerja->description = $request->description;
        $unitkerja->sumberdana_id = $request->sumberdana_id;
        $unitkerja->created_at = now();
        $unitkerja->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Unit Kerja Berhasil Ditambahkan!'); 
        return redirect()->route('unitkerja.index');
    }

    public function update(Request $request, $id) 
    {
        $validator = \Validator::make($request->all(), [
            'name'                        => 'required|min:5|max:191',
            'description'                 => 'required',
            'sumberdana_id'                 => 'required',
        ]);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'update');
            $validator->getMessageBag()->add('unitkerjaId', $id);

            return redirect()->route('unitkerja.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $unitkerja = Unitkerja::findOrFail($id);
        if ($request->file('photo')) {
            if($unitkerja->photo && file_exists(storage_path('app/public/' . $unitkerja->photo))){
                \Storage::delete('public/'.$unitkerja->photo);
            }
            $file = $request->file('photo')->store('photo/unitkerja', 'public');
            $unitkerja->photo = $file;
        }
        $unitkerja->name = $request->name;
        $unitkerja->description = $request->description;
        $unitkerja->sumberdana_id = $request->sumberdana_id;
        $unitkerja->updated_at = now();
        $unitkerja->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Unit Kerja Berhasil Diubah!'); 
        return redirect()->route('unitkerja.index');
    }
}
