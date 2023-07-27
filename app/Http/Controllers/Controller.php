<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getDataRequest($columns)
    {
        $param = json_decode(request()->get('lazyEvent', "[]"));

        $request = [];
        $aux = [];
        $filters = isset($param->filters) ? $param->filters : [];

        $cont = 0;
        foreach ($filters as $field => $match) {
        }
        foreach ($columns as $column) {
            $aux[$column['db']] = $cont;
            $request['columns'][] = [
                'data' => $column['db'],
                'name' => '',
                'searchable' => true,
                'orderable' => true,
                'search' => ['value' => isset($filters->{$column['db']}) ? $filters->{$column['db']}->value : '', 'regex' => false],
            ];
            $cont++;
        }
        if (isset($param->sortField))
            $request['order'][0] = ['column' => $aux[$param->sortField], 'dir' => $param->sortOrder > 0 ? 'asc' : 'desc'];

        $request['start'] = isset($param->first) ? $param->first : 0;
        $request['length'] = isset($param->rows) ? $param->rows : 1000000;

        if (isset($param->global)) {
            $request['search']['value'] = $param->global->value;
        }


        $request['draw'] = 2;

        return $request;
    }

    public function getDataConn()
    {
        return array(
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'db' => env('DB_DATABASE'),
            'host' => env('DB_HOST')
        );
    }
}
