<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard</p>
    <h2>Cars Management</h2>
    @include('partials.cars')
    <h2>Users Management</h2>
    @include('partials.users')
</body>
</html>