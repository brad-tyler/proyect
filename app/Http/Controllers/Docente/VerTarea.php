<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Libraries\Ssp;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VerTarea extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($json = '')
    {
        $columns = array(
            ['db' => 'id', 'dt' => 'ID', 'show' => true, "field" => "id"],
            ['db' => 'name', 'dt' => 'Nombres', 'show' => true, "field" => "name"],
            // ['db' => 'lastname', 'dt' => 'Apellidos', 'show' => true, "field" => "lastname"],
            // ['db' => 'address', 'dt' => 'Dirección', 'show' => false, "field" => "address"],
            ['db' => 'email', 'dt' => 'Email', 'show' => true, "field" => "email"],
            ['db' => 'remember_token', 'dt' => 'Token', 'show' => true, "field" => "remember_token"],
            ['db' => 'updated_at', 'dt' => 'Update', 'show' => true, "field" => "updated_at"],
        );

        $columnsAcciones = array(
            ['db' => 'acciones', 'dt' => 'Acciones', 'show' => true],
        );

        if ($json == 'json') {
            $joinQuery = "FROM users";

            echo json_encode(
                Ssp::simple($this->getDataRequest($columns), $this->getDataConn(), 'users', "id", $columns, $joinQuery, '')
            );
            exit(0);
        }


        $datas = [
            'columns' => $columns,
            'columnsAcciones' => $columnsAcciones,
            'sortField' => 'id',
            'sortOrder' => -1,
            'dataKey' => 'id',
            'globalFilterFields' => ['name', 'lastname'],
        ];


        return Inertia::render('DocenteVerTarea', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
