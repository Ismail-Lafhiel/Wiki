//   ----------------- Handeling Signup ------------------------//
function signup() {
  var formElement = document.getElementById("signup-form");
  var formData = new FormData(formElement);

  var username = $("#user_name").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var confirmPassword = $("#confirm_password").val();

  var errors = []; // Array to store validation errors

  if (
    username === "" ||
    email === "" ||
    password === "" ||
    confirmPassword === ""
  ) {
    errors.push("All fields are required.");
  }
  //   username regex
  var usernameRegex = /^\w+\s\w+$/;
  if (!username.match(usernameRegex)) {
    errors.push("Username should be first name space last name");
  }
  //   email regex
  var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!email.match(emailRegex)) {
    errors.push(
      "Please enter a valid email address in the format example@example.com."
    );
  }

  // Regular expression for password (at least 8 characters with digits, uppercase, and special symbols)
  var passwordRegex = /^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/;

  if (!password.match(passwordRegex)) {
    errors.push(
      "Password must be at least 8 characters long and contain digits, uppercase letters, and special symbols."
    );
  }

  if (password !== confirmPassword) {
    errors.push("Passwords do not match.");
  }

  // Check if there are any validation errors
  if (errors.length > 0) {
    // Display the error messages
    var errorList =
      "<div class='flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400'><ul class='mt-1.5 list-disc' style='list-style: disc;'>";
    errors.forEach(function (error) {
      errorList += "<li>" + error + "</li>";
    });
    errorList += "</ul></div>";
    $("#signup-fields").html(errorList);
  } else {
    // Send form data via AJAX
    $.ajax({
      url: "/register",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.successMessage) {
          $("#signup-message").html(
            "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Registration success.</div>"
          );
          setTimeout(function () {
            window.location.href = "/signin";
            $("#signup-message").empty();
            setTimeout(function () {}, 5000);
          }, 3000);
        } else if (response.errorMessage) {
          $("#signup-message").html(
            "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Registration failed.</div>"
          );
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
}

//   ----------------- Handeling Signin ------------------------//
function signin() {
  var formElement = document.getElementById("signin-form");
  var formData = new FormData(formElement);

  // Perform form validation
  var email = $("#email").val();
  var password = $("#password").val();
  var errors = []; // Array to store validation errors

  if (email === "" || password === "") {
    errors.push("All fields are required.");
  }
  //   email regex
  var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  // Regex for password (at least 8 characters with digits, uppercase, and special symbols)
  var passwordRegex = /^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/;

  var errors = []; // Array to store validation errors

  if (!email.match(emailRegex)) {
    errors.push(
      "Please enter a valid email address in the format example@example.com."
    );
  }
  if (!password.match(passwordRegex)) {
    errors.push(
      "Password must be at least 8 characters long and contain digits, uppercase letters, and special symbols."
    );
  }

  if (errors.length > 0) {
    var errorList =
      "<div class='flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400'><ul class='mt-1.5 list-disc' style='list-style: disc;'>";
    errors.forEach(function (error) {
      errorList += "<li>" + error + "</li>";
    });
    errorList += "</ul></div>";
    $("#signin-fields").html(errorList);
  } else {
    // Send form data via AJAX
    $.ajax({
      url: "/authenticate",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.successMessage) {
          $("#signin-message").html(
            "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Successfuly login</div>"
          );
          setTimeout(function () {
            window.location.href = "/";
            $("#signin-message").empty();
            setTimeout(function () {}, 5000);
          }, 3000);
        } else if (response.errorMessage) {
          $("#signin-message").html(
            "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Invalid email or password.</div>"
          );
        }
      },
      error: function (xhr, status, error) {
        // Handle errors
        console.error(error);
      },
    });
  }
}