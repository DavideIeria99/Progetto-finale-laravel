<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Richiesta Revisor</title>


    <style>
    body{
    margin: 0px;
    background-attachment: fixed;
    background-image:linear-gradient(to bottom, rgba(15, 47, 33, 0.682), rgba(138, 170, 121, 0.644));    
    }
    h1,h3,a,p {
    color: rgb(76, 42, 133);
    }
    .marginTop{
        margin-top: 50px;
    }
    .marginStart{
        margin-left: 300px
    }
    .mybtn{
    margin-top: 100px;
    margin-left: 600px;
    background-color: rgb(20, 27, 24);
    color: rgb(138, 170, 121);
    border-color: rgb(138, 170, 121);
    border-radius: 5px 5px 5px 5px;
    width: 160px;
    height: 40px;
    padding: 5px;
    box-shadow: 0px 0px 10px;
    font-style: italic;
    text-decoration: none
    }
    </style>
</head>
<body>
    <div>
        <h1 class="marginStart marginTop">L'utente ha richiesto di diventare revisore</h1>
        <h3 class="marginStart"> Nome: {{$user->name}}</h3>
        <h3 class="marginStart"> Email: {{$user->email}}</h3>
        <h5 class="marginStart">{{$description}}</h5>
    </div>
    <a href="{{route('make.revisor',compact('user'))}}"  class="mybtn">Rendi revisore</a>
</body>
</html>