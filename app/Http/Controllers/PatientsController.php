<?php
namespace App\Http\Controllers;
use App\Patient;
use App\History;
use App\Immunization;
use App\Http\Requests;
class PatientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients= Patient::all();
        $patientCount=Patient::count();
        return view('backend.patients.index',compact('patients','patientCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        //
        $histories=History::all();
        $immunizations=Immunization::all();
        return view('backend.patients.create',compact('patient','histories',
            'immunizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Requests\PatientStoreRequest $request)
    {
        //
        $data= $this->handleRequest($request);
        $patient = Patient::create($data);
        $patient->histories()->attach($request->histo);
        $patient->immunizations()->attach($request->immun);

        return redirect("/patients")->with("message", "New patient was created successfully!");
    }

     private function handleRequest($request){
         $data = $request->all();
         if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
             $destination = $this->uploadPath;
            $image->move($destination,$fileName);
            $data['image'] =  $fileName;
         }
         return $data;
     }
    /**
     * Display the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::with('histories','immunizations')->findOrFail($id);
        $histories = History::all();
        $immunizations = Immunization::all();
        return view("backend.patients.edit", 
            compact('patient','histories','immunizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PatientUpdateRequest $request, $id)
    {
        //
        $patient = Patient::findOrFail($id);
        $data=$this->handleRequest($request);
        $patient->update($data);
        $patient->histories()->sync($request->histo);
        $patient->immunizations()->sync($request->immun);

        return redirect("/patients")->with("message", "Patient was updated successfully!!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Patient::findOrFail($id)->delete();
        return redirect("/patients")->with("message", "Patient was deleted successfully!");
    }
}

// {{ @if($patient->histories->contains($history->id)) checked=checked @endif }}