<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{


	public function index()
	{
		$data = GuestBook::all();

		return view('index', ['data' => $data]);
	}

    public function store(Request $request)
	{

		 $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
          	'birth_date' => 'required|date_format:m/d/Y',
        ];

        $this->validate($request, $rules);

		GuestBook::create($request->all());

		return redirect()->back()->with('success', 'Запись в базу данных успешно добавлена');   
	}
}
