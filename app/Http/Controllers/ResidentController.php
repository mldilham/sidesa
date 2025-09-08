<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    //
    public function index(){

        $residents = Resident::all();

        return view('pages.resident.index', [
            'residents' => $residents,
        ]);
    }
    public function create(){
        return view('pages.resident.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nik' => ['required','min:16','max:16'],
            'name' => ['required','max:100'],
            'gender' => ['required', Rule::in(['male','female'])],
            'birth_date' => ['required','string'],
            'birth_place' => ['required','max:100'],
            'address' => ['required','max:700'],
            'religion' => ['nullabe','max:50'],
            'marital_status' => ['required', Rule::in(['single','married','divorced','widowed'])],
            'occupation' => ['nullabe','max:100'],
            'phone' => ['nullabe','max:15'],
            'status' => ['required',Rule::in(['active','moved','deceased'])],
        ]);

        Resident::create($request->validated());

        return redirect('/resident')->with('success','Berhasil menambahkan data');
    }

    public function update(Request $request , $id){
        $validate = $request->validate([
            'nik' => ['required','min:16','max:16'],
            'name' => ['required','max:100'],
            'gender' => ['required', Rule::in(['male','female'])],
            'birth_date' => ['required','string'],
            'birth_place' => ['required','max:100'],
            'address' => ['required','max:700'],
            'religion' => ['nullabe','max:50'],
            'marital_status' => ['required', Rule::in(['single','married','divorced','widowed'])],
            'occupation' => ['nullabe','max:100'],
            'phone' => ['nullabe','max:15'],
            'status' => ['required', Rule::in(['active','moved','deceased'])],
        ]);

        Resident::findOrFail($id)->update($request->validated());

        return redirect('/resident')->with('success','Berhasil mengubah data');
    }

    public function edit($id){
        $resident = Resident::firstOrFail($id);

        return view('pages.resident.edit',[
            'resident' => $resident,
        ]);
    }

    public function destroy($id){
        $resident = Resident::firstOrFail($id);
        $resident->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }

}
