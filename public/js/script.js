// start User CRUD
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
          window.location.href = "/users/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
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
          window.location.href = "/users/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
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
            setTimeout(function () {
              window.location.href = "/users/";
              $("#alertMessage").empty();
              setTimeout(function () {}, 5000);
            }, 3000);
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete user.</div>"
            );
          }
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
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
// end User CRUD
// -------------------------------------------------------------- //
// start Wiki CRUD
function updateWiki() {
  var formElement = document.getElementById("editWiki");
  var formData = new FormData(formElement);
  var wikiId = $("#id").val();

  $.ajax({
    url: "/wikis/update/" + wikiId,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki updated successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/wikis/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to update wiki.</div>"
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
function createWiki() {
  var formElement = document.getElementById("createWiki");
  var formData = new FormData(formElement);
  $.ajax({
    url: "/wikis/store/",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      //   console.log(response);
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki created successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/wikis/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to create wiki.</div>"
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
function deleteWiki(wikiId) {
  document
    .querySelector('button[data-modal-toggle="deleteModal"][type="button"]')
    .addEventListener("click", function () {
      var formElement = document.getElementById("deleteWiki");
      var formData = new FormData(formElement);
      var wikiId = getUserIdFromButton();
      console.log("Delete wikis function called with wiki ID:", wikiId);
      $.ajax({
        url: "/wikis/delete/" + wikiId,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(formData);
          if (response.successMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki deleted successfully.</div>"
            );
            setTimeout(function () {
              window.location.href = "/wikis/";
              $("#alertMessage").empty();
              setTimeout(function () {}, 5000);
            }, 3000);
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete wiki.</div>"
            );
          }
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
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
// end Wiki CRUD
// -------------------------------------------------------------- //
// start Tags CRUD
function updateTag() {
  var formElement = document.getElementById("editTag");
  var formData = new FormData(formElement);
  var tagId = $("#id").val();

  $.ajax({
    url: "/tags/update/" + tagId,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Tag updated successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/tags/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to update tag.</div>"
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
function createTag() {
  var formElement = document.getElementById("createTag");
  var formData = new FormData(formElement);
  $.ajax({
    url: "/tags/store/",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      //   console.log(response);
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Tag created successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/wikis/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to create tag.</div>"
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
function deleteTag(tagId) {
  document
    .querySelector('button[data-modal-toggle="deleteModal"][type="button"]')
    .addEventListener("click", function () {
      var formElement = document.getElementById("deleteTag");
      var formData = new FormData(formElement);
      var tagId = getUserIdFromButton();
      console.log("Delete tags function called with wiki ID:", tagId);
      $.ajax({
        url: "/tags/delete/" + tagId,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(formData);
          if (response.successMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki deleted successfully.</div>"
            );
            setTimeout(function () {
              window.location.href = "/tags/";
              $("#alertMessage").empty();
              setTimeout(function () {}, 5000);
            }, 3000);
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete wiki.</div>"
            );
          }
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
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
// end Tags CRUD
// -------------------------------------------------------------- //
// start Wiki CRUD
function updateWiki() {
  var formElement = document.getElementById("editWiki");
  var formData = new FormData(formElement);
  var wikiId = $("#id").val();

  $.ajax({
    url: "/wikis/update/" + wikiId,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki updated successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/wikis/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to update wiki.</div>"
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
function createWiki() {
  var formElement = document.getElementById("createWiki");
  var formData = new FormData(formElement);
  $.ajax({
    url: "/wikis/store/",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      //   console.log(response);
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki created successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/wikis/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to create wiki.</div>"
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
function deleteWiki(wikiId) {
  document
    .querySelector('button[data-modal-toggle="deleteModal"][type="button"]')
    .addEventListener("click", function () {
      var formElement = document.getElementById("deleteWiki");
      var formData = new FormData(formElement);
      var wikiId = getUserIdFromButton();
      console.log("Delete wikis function called with wiki ID:", wikiId);
      $.ajax({
        url: "/wikis/delete/" + wikiId,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(formData);
          if (response.successMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Wiki deleted successfully.</div>"
            );
            setTimeout(function () {
              window.location.href = "/wikis/";
              $("#alertMessage").empty();
              setTimeout(function () {}, 5000);
            }, 3000);
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete wiki.</div>"
            );
          }
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
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
// end Wiki CRUD
// -------------------------------------------------------------- //
// start Categories CRUD

function updateCategory() {
  var formElement = document.getElementById("updateCategory");
  var formData = new FormData(formElement);
  var categoryId = $("#id").val();
  $.ajax({
    url: "/categories/update/" + categoryId,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Category updated successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/categories/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to update category.</div>"
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
function createCategory() {
  var formElement = document.getElementById("createCategory");
  var formData = new FormData(formElement);
  $.ajax({
    url: "/categories/store/",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      //   console.log(response);
      if (response.successMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Category created successfully.</div>"
        );
        setTimeout(function () {
          window.location.href = "/categories/";
          $("#alertMessage").empty();
          setTimeout(function () {}, 5000);
        }, 3000);
      } else if (response.errorMessage) {
        $("#alertMessage").html(
          "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to create category.</div>"
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
function deleteCategory(categoryId) {
  document
    .querySelector('button[data-modal-toggle="deleteModal"][type="button"]')
    .addEventListener("click", function () {
      var formElement = document.getElementById("deleteCategory");
      var formData = new FormData(formElement);
      var categoryId = getUserIdFromButton();
      console.log(
        "Delete Categories function called with wiki ID:",
        categoryId
      );
      $.ajax({
        url: "/categories/delete/" + categoryId,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(formData);
          if (response.successMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400' role='alert'>Category deleted successfully.</div>"
            );
            setTimeout(function () {
              window.location.href = "/categories/";
              $("#alertMessage").empty();
              setTimeout(function () {}, 5000);
            }, 3000);
          } else if (response.errorMessage) {
            $("#alertMessage").html(
              "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400' role='alert'>Failed to delete ctegory.</div>"
            );
          }
          setTimeout(function () {
            $("#alertMessage").empty();
          }, 5000);
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
// end Categories CRUD

// select multiple tags
document.getElementById("tagInput").addEventListener("keypress", function (e) {
  if (e.key === "Enter") {
    var tag = this.value.trim();
    if (tag) {
      var tagElement = document.createElement("span");
      tagElement.className =
        "inline-block bg-primary-600 px-2 py-1 text-white text-sm rounded-lg";
      tagElement.textContent = tag;

      var closeIcon = document.createElement("a");
      closeIcon.innerHTML = "&times;";
      closeIcon.className = "ml-2 cursor-poiter text-red-600";
      closeIcon.addEventListener("click", function () {
        tagElement.remove();
      });

      tagElement.appendChild(closeIcon);
      document.getElementById("tagContainer").appendChild(tagElement);
      this.value = "";
    }
  }
});

document.addEventListener("DOMContentLoaded", function (event) {
  document.getElementById("defaultModalButton").click();
});
