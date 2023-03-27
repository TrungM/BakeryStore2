$(document).ready(function () {
          $(".change-image").click(function () {
                    $(".upload-img").show();
                    $(".bg-color").show();

          });
          $(".close-bg-upload").click(function () {
                    $(".upload-img").hide();
                    $(".bg-color").hide();
                    $(".change-password-txt").hide();
          });

          $(".change-password").click(function () {
                    $(".change-password-txt").show();
                    $(".bg-color").show();
          });

          $(".edit_profile").click(function(e) {
            $choose = confirm("Are you sure update profile");
            if ($choose == true) {
                window.load();
            } else {
                e.preventDefault();

            }


        });


        $(".btn-change-pass").click(function(e) {
            $choose = confirm("Are you sure change password");
            if ($choose == true) {
                window.load();
            } else {
                e.preventDefault();

            }


        });


});
