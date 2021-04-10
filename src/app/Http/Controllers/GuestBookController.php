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
            'phone' => 'required|regex:/^\+7\([0-9]+\).[0-9]{3}-[0-9]{2}-[0-9]{2}$/',
          	'birth_date' => 'required|date_format:m/d/Y',
        ];

        $this->validate($request, $rules);

		GuestBook::create($request->all());

		return redirect()->back()->with('success', 'Запись в базу данных успешно добавлена');   
	}

	public function getPhoneList(Request $request)
	{
		if ($request->show == 1)
		{
			$phones = GuestBook::select('phone')
						->get();
								
			return response()->json($phones);
		}
	}
}
