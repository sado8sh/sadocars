<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/cars" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required><br><br>
    
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br><br>
    
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>
    
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" min="1900" max="2099" required><br><br>
    
        <label for="acceleration_100">0-100km/h (s):</label>
        <input type="number" step="0.01" id="acceleration_100" name="0-100km/h" required><br><br>
    
        <label for="acceleration_160">0-160km/h (s):</label>
        <input type="number" step="0.01" id="acceleration_160" name="0-160km/h" required><br><br>
    
        <label for="quarter_mile">1/4 Mile (s):</label>
        <input type="number" step="0.01" id="quarter_mile" name="1/4mile" required><br><br>
    
        <label for="top_speed">Top Speed (km/h):</label>
        <input type="number" id="top_speed" name="top_speed" required><br><br>
    
        <label for="engine">Engine:</label>
        <input type="text" id="engine" name="engine" required><br><br>
    
        <label for="horsepower">Horsepower:</label>
        <input type="number" id="horsepower" name="horsepower" required><br><br>
    
        <label for="torque">Torque (Nm):</label>
        <input type="number" id="torque" name="torque" required><br><br>
    
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required><br><br>
    
        <label for="seating">Seating:</label>
        <input type="number" id="seating" name="seating" required><br><br>
    
        <label for="drive">Drive:</label>
        <input type="text" id="drive" name="drive" required><br><br>
    
        <label for="transmission">Transmission:</label>
        <input type="text" id="transmission" name="transmission" required><br><br>
    
        <label for="price">Price ($):</label>
        <input type="number" step="0.01" id="price" name="price" required><br><br>
    
        <label for="performance">Performance:</label>
        <textarea id="performance" name="performance" required></textarea><br><br>
    
        <label for="interior">Interior:</label>
        <textarea id="interior" name="interior" required></textarea><br><br>
    
        <label for="main_image">Main Image:</label>
        <input type="file" id="main_image" name="main_image" accept="image/*" required><br><br>
    
        <label for="second_image">Second Image:</label>
        <input type="file" id="second_image" name="second_image" accept="image/*"><br><br>
    
        <label for="performance_image">Performance Image:</label>
        <input type="file" id="performance_image" name="performance_image" accept="image/*"><br><br>
    
        <label for="interior_image">Interior Image:</label>
        <input type="file" id="interior_image" name="interior_image" accept="image/*"><br><br>
    
        <label for="video">Video:</label>
        <input type="text" id="video" name="video" required><br><br>
    
        <button type="submit">Add Car</button>
    </form>    
</body>
</html>
