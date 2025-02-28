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
<h2>Add a new car</h2>
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
