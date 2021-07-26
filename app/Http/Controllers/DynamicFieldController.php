<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DynamicField;

use Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
        return view("welcome");
    }

    function insert(Request $request)
    {
        if ($request->ajax())
        {
            $rules = array(
                'name.*' => 'required',
                'type.*' => 'required',
                'length.*' => 'required',
                'not_null.*' => 'nullable',
                'unsigned.*' => 'nullable',
                'auto_increment.*' => 'nullable',
                'index.*' => 'nullable',
                'default.*' => 'nullable'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails())
            {
                return response()->json([
                    'error' => $error->errors()->all()
            ]);
        }
        $name = $request->name;
        $type= $request->type ;
        $length = $request->length ;
        $not_null = $request->not_null ;
        $unsigned = $request->unsigned ;
        $auto_increment = $request->auto_increment;
        $index = $request->index ;
            $default = $request->default;
            for ($count = 0; $count < count($name); $count++) {
                $data = array(
                    'name' => $name[$count],
                    'type' => $type[$count],
                    'length' => $length[$count],
                    'not_null' => $not_null[$count],
                    'unsigned' => $unsigned[$count],
                    'auto_increment' => $auto_increment[$count],
                    'index' => $index[$count],
                    'default' => $default[$count]
                );
                $insert_data[] = $data;

            }

            DynamicField::insert($insert_data);
            return response()->json([
                'success' => 'Data Added successfully.'
            ]);
        }
    }
}
