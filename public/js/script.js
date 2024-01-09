function updateUser() {
  var formElement = document.getElementById("editUser");
  var formData = new FormData(formElement);
  var userId = $("#id").val();

  $.ajax({
    url: "/users/update/" + userId,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>User updated successfully.</div>"
        );
        setTimeout(function () {
          $("#alertMessage").empty();
        }, 5000);
        window.location.href = "/users/";
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to update user.</div>"
        );
        setTimeout(function () {
          $("#alertMessage").empty();
        }, 5000);
      }
    },
    error: function (xhr, status, error) {
      $("#alertMessage").html(
        "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>An error occurred: " +
          status +
          " - " +
          error +
          "</div>"
      );
      setTimeout(function () {
        $("#alertMessage").empty();
        window.location.href = "/users/";
      }, 5000);
    },
  });
}
function createUser() {
  var formElement = document.getElementById("createUser");
  var formData = new FormData(formElement);
  $.ajax({
    url: "/users/store/",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      //   console.log(response);
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>User created successfully.</div>"
        );
        setTimeout(function () {
          $("#alertMessage").empty();
        }, 5000);
        window.location.href = "/users/";
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to create user.</div>"
        );
        setTimeout(function () {
          $("#alertMessage").empty();
        }, 5000);
      }
    },
    error: function (xhr, status, error) {
      $("#alertMessage").html(
        "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>An error occurred: " +
          status +
          " - " +
          error +
          "</div>"
      );
      setTimeout(function () {
        $("#alertMessage").empty();
      }, 5000);
    },
  });
}
function deleteUser(userId) {
  document
    .querySelector('button[data-modal-toggle="deleteModal"][type="button"]')
    .addEventListener("click", function () {
      var formElement = document.getElementById("deleteUser");
      var formData = new FormData(formElement);
      var userId = getUserIdFromButton(); // Replace this with the actual method to get the user's ID from the button
      console.log("Delete user function called with user ID:", userId);
      $.ajax({
        url: "/users/delete/" + userId,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(formData);
          if (response.successMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>User deleted successfully.</div>"
            );
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete user.</div>"
            );
          }
        },
        error: function (xhr, status, error) {
          $("#alertMessage").html(
            "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>An error occurred: " +
              status +
              " - " +
              error +
              "</div>"
          );
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
        },
      });
    });
}

// document.addEventListener("DOMContentLoaded", function (event) {
//   document.getElementById("defaultModalButton").click();
// });
