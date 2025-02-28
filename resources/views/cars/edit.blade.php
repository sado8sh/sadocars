<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <style>
        /* General Form Styling */
        body {
            background-color: #1a1a1a; /* Dark Gray */
            color: #fff;
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #ffdf00; 
            font-size: 24px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #000;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 223, 0, 0.5);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Label Styling */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffdf00; /* Yellow */
        }

        /* Input and Textarea Styling */
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ffdf00; /* Yellow */
            border-radius: 5px;
            background-color: #1a1a1a; /* Dark Gray */
            color: #fff;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            border-color: #ffcc00; /* Brighter Yellow */
            outline: none;
        }

        /* Button Styling */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #ffdf00; /* Yellow */
            border: none;
            border-radius: 5px;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #ffcc00; /* Brighter Yellow */
        }

        /* File Input Styling */
        input[type="file"] {
            padding: 8px;
            background-color: #1a1a1a; /* Dark Gray */
            color: #fff;
            border: 2px solid #ffdf00; /* Yellow */
            border-radius: 5px;
            cursor: pointer;
        }

        /* Textarea Styling */
        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            input[type="text"],
            input[type="number"],
            input[type="file"],
            textarea {
                font-size: 14px;
            }

            button[type="submit"] {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <h2>Edit Car</h2>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->

        <!-- Brand -->
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" value="{{ $car->brand }}" required><br><br>

        <!-- Model -->
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="{{ $car->model }}" required><br><br>

        <!-- Category -->
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{ $car->category }}" required><br><br>

        <!-- Year -->
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="{{ $car->year }}" min="1900" max="2099" required><br><br>

        <!-- 0-100km/h -->
        <label for="acceleration_100">0-100km/h (s):</label>
        <input type="number" step="0.01" id="acceleration_100" name="0-100km/h" value="{{ $car->{'0-100km/h'} }}" required><br><br>

        <!-- 0-160km/h -->
        <label for="acceleration_160">0-160km/h (s):</label>
        <input type="number" step="0.01" id="acceleration_160" name="0-160km/h" value="{{ $car->{'0-160km/h'} }}" required><br><br>

        <!-- 1/4 Mile -->
        <label for="quarter_mile">1/4 Mile (s):</label>
        <input type="number" step="0.01" id="quarter_mile" name="1/4mile" value="{{ $car->{'1/4mile'} }}" required><br><br>

        <!-- Top Speed -->
        <label for="top_speed">Top Speed (km/h):</label>
        <input type="number" id="top_speed" name="top_speed" value="{{ $car->top_speed }}" required><br><br>

        <!-- Engine -->
        <label for="engine">Engine:</label>
        <input type="text" id="engine" name="engine" value="{{ $car->engine }}" required><br><br>

        <!-- Horsepower -->
        <label for="horsepower">Horsepower:</label>
        <input type="number" id="horsepower" name="horsepower" value="{{ $car->horsepower }}" required><br><br>

        <!-- Torque -->
        <label for="torque">Torque (Nm):</label>
        <input type="number" id="torque" name="torque" value="{{ $car->torque }}" required><br><br>

        <!-- Weight -->
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" value="{{ $car->weight }}" required><br><br>

        <!-- Seating -->
        <label for="seating">Seating:</label>
        <input type="number" id="seating" name="seating" value="{{ $car->seating }}" required><br><br>

        <!-- Drive -->
        <label for="drive">Drive:</label>
        <input type="text" id="drive" name="drive" value="{{ $car->drive }}" required><br><br>

        <!-- Transmission -->
        <label for="transmission">Transmission:</label>
        <input type="text" id="transmission" name="transmission" value="{{ $car->transmission }}" required><br><br>

        <!-- Price -->
        <label for="price">Price ($):</label>
        <input type="number" step="0.01" id="price" name="price" value="{{ $car->price }}" required><br><br>

        <!-- Performance -->
        <label for="performance">Performance:</label>
        <textarea id="performance" name="performance" required>{{ $car->performance }}</textarea><br><br>

        <!-- Interior -->
        <label for="interior">Interior:</label>
        <textarea id="interior" name="interior" required>{{ $car->interior }}</textarea><br><br>

        <!-- Main Image -->
        <label for="main_image">Main Image:</label>
        <input type="file" id="main_image" name="main_image" accept="image/*"><br><br>
        <small>Current: <a href="{{ Storage::url($car->main_image) }}" target="_blank">View Image</a></small><br><br>

        <!-- Second Image -->
        <label for="second_image">Second Image:</label>
        <input type="file" id="second_image" name="second_image" accept="image/*"><br><br>
        <small>Current: <a href="{{ Storage::url($car->second_image) }}" target="_blank">View Image</a></small><br><br>

        <!-- Performance Image -->
        <label for="performance_image">Performance Image:</label>
        <input type="file" id="performance_image" name="performance_image" accept="image/*"><br><br>
        <small>Current: <a href="{{ Storage::url($car->performance_image) }}" target="_blank">View Image</a></small><br><br>

        <!-- Interior Image -->
        <label for="interior_image">Interior Image:</label>
        <input type="file" id="interior_image" name="interior_image" accept="image/*"><br><br>
        <small>Current: <a href="{{ Storage::url($car->interior_image) }}" target="_blank">View Image</a></small><br><br>

        <!-- Video -->
        <label for="video">Video:</label>
        <input type="text" id="video" name="video" value="{{ $car->video }}" required><br><br>

        <!-- Submit Button -->
        <button type="submit">Update Car</button>
    </form>
</body>
</html>