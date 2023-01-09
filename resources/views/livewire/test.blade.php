<!DOCTYPE html>
<head>
    <title>Users</title>
    <link href="../../../tailwind/dist/output.css" rel="stylesheet">
</head>
<body>
<div>
    <h1> Hello Users </h1>
    <table border="1px"> 
        <tr> 
            <td> Name </td>
            <td> Email </td>
            <td> Password </td>
        </tr>
    @foreach ($users as $list)
    <tr> 
        <td>{{$list->name}}</td>
        <td>{{$list->email}}</td>
        <td>{{$list->password}}</td>
    </tr>
    @endforeach 
</table>
</div>
<body>
</html>