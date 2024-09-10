<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Excel Upload</title>
   <link rel="stylesheet" href="./style.css">
</head>
<body>


<div id="error" class="error"></div>
<form name="entryForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <h2>Entry Form</h2>
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="age">Age:</label>
    <input type="number" name="age" required>

    <label for="file">Upload Excel File:</label>
    <input type="file" name="excel_file" accept=".xls,.xlsx" required>

    <button type="submit">Submit</button>
</form>

<script src="./script.js"></script>

</body>
</html>
