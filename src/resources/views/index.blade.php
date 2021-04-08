<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	<title>From sender</title>
</head>

<body>
	
	<div class="container pt-5"> 
	
	 <form method="POST" action="{{ route('send') }}">
	 @csrf
  <div class="form-group"> 
    <label for="name">Имя:</label>
    <input  type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Введите ваше имя">
  </div>
 <div class="form-group">
    <label for="phone">Номер телефона:</label>
    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Введите номер вашего телефона">
  </div>
  <div class="form-group">
    <label for="birth_date">Дата рождения:</label>
    <input type="text" class="form-control datepicker" name="birth_date" value="{{ old('birth_date') }}" id="birth_date" placeholder="Укажите дату рождения">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
	</form>
	

@if (session('success'))
	<br>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
	<br>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<br>

	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Номер телефона</th>
      <th scope="col">Дата рождения</th>
    </tr>
  </thead>
  @forelse($data as $d)
  <tbody>
    <tr>
      <th scope="row">{{ $d->id }}</th>
      <td>{{ $d->name }}</td>
      <td>{{ $d->phone }}</td>
      <td>{{ $d->birth_date }}</td>
    </tr>
  </tbody>
  @empty
  	Нет данных в таблице
  @endforelse
</table>

	</div>


</body>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	<script>
		$( function() {
			$('.datepicker').datepicker();
		});
	</script>

	<script>
		
	</script>


</html>