<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>

<div class="row"> 

	<div class="box-body no-padding">
							
			
            
    <h1>{{$user->name}}</h1>
    <p>Has recibido un mensaje</p>
    <a href="{{url('admin/mensajes/'.$msg->id)}}"> Click aquí para ver el mensaje</a>
    <p>Gracias por usar APPINTA</p>

</div>

</body>
</html>
