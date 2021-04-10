<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Введите номер вашего телефона">
 	<ul class="d-none" id="list">

 	</ul>
 
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
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script>
		$( function() {
			$(".datepicker").datepicker()
		/*	$('#phone').select2({
			    theme: 'bootstrap4',
			});*/

			$("#phone").inputmask("mask", {"mask": "+7(999) 999-99-99"})
			$("#phone").on("click", function(){
				$("#list").toggleClass("d-block");
			});
			$("#phone").one("click", function(){
				var CSRF_TOKEN = $("form").children().eq(0).val()
				 var form = new FormData(); 
        		 form.append('_token', CSRF_TOKEN);
        		 form.append('show', 1);
				$.ajax ({
					url: "{{ route('get_phone_list') }}",
					type: "post",
					dataType: "json",
					data: form,
					processData: false,
    				contentType: false,
					success: function (result){
						$.each(result, function(index, value){
							$('#list').append('<li class="form-control" id="phone_num">'+value.phone+'</li>');
						});

			$('[id=phone_num]').on({
				 click: function () {
        			$('#phone').val(this.innerHTML);
        			$('#list').removeClass('d-block');
    				},
    				mousemove: function () {
        				$(this).css('color', 'green');
   					},	
    			    mouseleave: function () {
        				$(this).css('color', '#aaa');
   					}	
			});

					}
				})
			});



		});
	</script>

	<script>
		
	</script>


</html>