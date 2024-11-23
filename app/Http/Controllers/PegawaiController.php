<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiCreateRequest;
use App\Http\Requests\PegawaiUpdateRequest;
use App\Models\Pegawai;
use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    protected $crud;

    public function __construct(CrudRepository $crudRepository)
    {
        $this->crud = $crudRepository;
        $this->crud->setModel(new Pegawai());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index',[
            'title' => 'Data Pegawai',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create',[
            'title' => 'Tambah Pegawai'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiCreateRequest $pegawaiCreateRequest)
    {
        $result = $this->crud->create($pegawaiCreateRequest->validated());

        return redirect()->route('pegawai.index')->with($result['type'],$result['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit',[
            'data' => $this->crud->find($pegawai->id),
            'title' => 'Edit Pegawai'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PegawaiUpdateRequest $pegawaiUpdateRequest, Pegawai $pegawai)
    {
        $result = $this->crud->update($pegawaiUpdateRequest->validated(),$pegawai->id);

        return redirect()->back()->with($result['type'],$result['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $result = $this->crud->delete($pegawai->id);

        return redirect()->back()->with($result['type'],$result['message']);
    }
}
