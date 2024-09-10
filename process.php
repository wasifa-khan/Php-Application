<?php
require 'db_connect.php';
require 'vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $age);
    $stmt->execute();
    $stmt->close();

    
    $file = $_FILES['excel_file']['tmp_name'];
    $fileType = $_FILES['excel_file']['type'];


    $allowedMimeTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'];
    if (!in_array($fileType, $allowedMimeTypes)) {
        die("Please upload a valid Excel file.");
    }

   
    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();
    $rows = $worksheet->toArray();

    foreach ($rows as $index => $row) {
        if ($index == 0) {
            
            continue;
        }

        $product_name = $row[0];
        $quantity = $row[1];
        $price = $row[2];

        $stmt = $conn->prepare("INSERT INTO products (product_name, quantity, price) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $product_name, $quantity, $price);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "Form data and Excel data successfully submitted!";
}
?>
