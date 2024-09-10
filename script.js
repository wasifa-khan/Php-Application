function validateForm() {
    var name = document.forms["entryForm"]["name"].value;
    var email = document.forms["entryForm"]["email"].value;
    var age = document.forms["entryForm"]["age"].value;
    var file = document.forms["entryForm"]["excel_file"].value;
    var errorMessage = "";

    // Check if all fields are filled
    if (name == "" || email == "" || age == "" || file == "") {
        errorMessage += "All fields are required.\n";
    }

    // Validate email format
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        errorMessage += "Please enter a valid email address.\n";
    }

    // Validate file is an Excel file
    var fileExtension = file.split('.').pop().toLowerCase();
    if (fileExtension != "xls" && fileExtension != "xlsx") {
        errorMessage += "Only Excel files (.xls, .xlsx) are allowed.\n";
    }

    if (errorMessage != "") {
        document.getElementById("error").innerText = errorMessage;
        return false;
    }
    return true;
}