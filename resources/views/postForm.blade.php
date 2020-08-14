<form action="{{route('formPost')}}" method="post">
	@csrf   
	<input type="text" name="HoTen">
	<input type="submit">
</form>