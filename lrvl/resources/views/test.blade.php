<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach ($task as $t)
		<li><a href="/test/{{$t->id}}">{{ $t->body }}</a></li>
	@endforeach
</body>
</html>