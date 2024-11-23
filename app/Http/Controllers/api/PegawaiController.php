<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiCreateRequest;
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
        return response()->json([
            'data' => $this->crud->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiCreateRequest $pegawaiCreateRequest)
    {
        $result = $this->crud->create($pegawaiCreateRequest->validated());

        return ($result['status'] == 'success') ? response()->json([
            'status' => 'success',
            'message' => $result['message'],
        ], 201) :
        response()->json([
            'status' => 'error',
            'message' => $result['message']
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => $this->crud->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
