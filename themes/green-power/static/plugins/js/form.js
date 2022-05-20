/* Contact Form starts */
$(".contact-submit").submit(function (event) {
  event.preventDefault();
  $(".ajax-loader").show();
  $(".contact-submit").hide();
  $("#failure_msg").hide();
  $("#success_msg").hide();

  if (Form_Validate("contact-form")) {
    var form = $("#form")[0];
    var formdata = new FormData(form);
    $("#failure_msg").show();
    $("#success_msg").hide();
    /* Ajax call for submitting contact data starts */
    // $.ajax({
    //     url: 'php/mail/savecontact.php',
    //     type: 'POST',
    //     data: formdata,
    //     processData: false,
    //     contentType: false,
    //     success: function (result) {
    //         $(".ajax-loader").hide();
    //         $(".contact-submit").show();
    //         if( result.flag == "false") {
    //             $('#failure_msg').show();
    //             $('#success_msg').hide();
    //         } else {
    //             $('#failure_msg').hide();
    //             $('#success_msg').show();
    //             $('#contact-form').trigger("reset");
    //         }
    //     }
    // });
    /* Ajax call for submitting contact data ends */
  } else {
    $(".ajax-loader").show();
    $(".contact-submit").show();
  }
});
/* Contact Form ends */
/* Inquiry Form starts */
$(".inquiry-submit").click(function (event) {
  event.preventDefault();
  $(".ajax-loader").show();
  setTimeout(function () {
    $(".ajax-loader").hide();
  }, 5000);
  $(".inquiry-btn").removeClass("dark");
  $(".inquiry-submit").hide();
  $("#failure_msg").hide();
  $("#success_msg").hide();
  if (Form_Validate_inquiry("inquiry-form")) {
    var form = $("#inquiry-form")[0];
    var formdata = new FormData(form);
    /* Ajax call for submitting inquiry data starts */

    $.ajax({
      // url: "/php/mail/saveinquiry.php",
      url: "https://greenpwr.eu/php/contact.php",
      type: "POST",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (result) {
        // console.log(result);
        $(".ajax-loader").hide();
        $(".inquiry-btn").addClass("dark");
        $(".inquiry-submit").show();
        if (result.flag == "false") {
          $("#failure_msg").show();
          $("#success_msg").hide();
        } else {
          $("#failure_msg").hide();
          $("#success_msg").show();
          $("#inquiry-form").trigger("reset");
        }
      },
    });
    /* Ajax call for submitting inquiry data ends */
  } else {
    $(".ajax-loader").hide();
    $(".inquiry-btn").addClass("dark");
    $(".inquiry-submit").show();
  }
});
/* Inquiry Form ends */

// function Form_Validate(id) {
//   var error = 0;
//   $(".invalid").removeClass("invalid");
//   $("#fail_fullname").hide();
//   $("#fail_email").hide();
//   $("#fail_emailformat").hide();
//   $("#fail_subject").hide();
//   $("#fail_comment").hide();
//   $("#fail_phno").hide();

//   var fullname = $("#fullname").val();
//   var email = $("#email").val();
//   var subject = $("#subject").val();
//   var message = $("#message").val();
//   var phoneno = $("#phone").val();

//   if (fullname == "") {
//     $("#fail_fullname").show();
//     $("#fullname").addClass("invalid");
//     error = 1;
//   }
//   if (phoneno == "") {
//     $("#fail_phno").show();
//     $("#phone").addClass("invalid");
//     error = 1;
//   }
//   var phoneNumber = $("#phone").val();
//   var filter =
//     /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

//   if (filter.test(phoneNumber)) {
//     if (phoneNumber.length < 12) {
//     } else {
//       $("#fail_phno12").show();
//       $("#phone").addClass("invalid");
//       error = 1;
//       //   alert('Please put 10  digit mobile number');
//       //   var validate = false;
//     }
//   }

//   //    var phoneNumber1 = $("#phone").val();
//   //         var filter1 =  /^[0-9]+$/;

//   //         if (filter1.test(phoneNumber1)) {

//   //                $("#fail_phnodigit").show();
//   //                $("#phone").addClass("invalid");
//   //                error = 1;
//   //             //   alert('Please put 10  digit mobile number');
//   //             //   var validate = false;

//   //         }

//   if (email == "") {
//     $("#fail_email").show();
//     $("#email").addClass("invalid");
//     error = 1;
//   } else {
//     var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
//     if (!pattern.test(email)) {
//       error = 1;
//       $("#fail_emailformat").show();
//       $("#email").addClass("invalid");
//     }
//   }

//   if (subject == "") {
//     $("#fail_subject").show();
//     $("#subject").addClass("invalid");
//     error = 1;
//   }

//   if (message == "") {
//     $("#fail_comment").show();
//     $("#message").addClass("invalid");
//     error = 1;
//   }

//   if (error == 1) return false;
//   else return true;
// }

function Form_Validate_inquiry(id) {
  var error = 0;
  $(".invalid").removeClass("invalid");
  $("#fail_fullname").hide();
  $("#fail_email").hide();
  $("#fail_emailformat").hide();
  $("#fail_countryCode").hide();
  $("#fail_phone").hide();
  $("#fail_phoneformat").hide();
  $("#fail_address").hide();
  $("#fail_systeminstaller").hide();
  $("#fail_projectcompletedby").hide();
  $("#fail_monthlyuse").hide();
  $("#fail_solarsystemtype").hide();
  $("#fail_solarpanelplace").hide();
  $("#fail_finance").hide();
  $("#fail_phonedigit").hide();

  var fullname = $("#fullname").val();
  var email = $("#email").val();
  var phone = $("#phone1").val();
  var countryCode = $("#countryCode").val();
  var address = $("#address").val();
  var system_installer = $("#system_installer").val();
  var project = $("#project").val();
  var usage = $("#usage").val();
  var system_type = $("#system_type").val();
  var panel_place = $("#panel_place").val();
  var finance = $("#finance").val();

  if (fullname == "") {
    $("#fail_fullname").show();
    $("#fullname").addClass("invalid");
    error = 1;
  } else {
    var nameCheck = /^[a-zA-Z]{4,}(?: [a-zA-Z]+)?(?: [a-zA-Z]+)?$/;
    if (!nameCheck.test(fullname)) {
      error = 1;
      $("#fail_fullname").show();
      $("#fullname").addClass("invalid");
    }
  }

  if (email == "") {
    $("#fail_email").show();
    $("#email").addClass("invalid");
    error = 1;
  } else {
    var emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    if (!emailPattern.test(email)) {
      error = 1;
      $("#fail_emailformat").show();
      $("#email").addClass("invalid");
    }
  }

  if (countryCode == "") {
    $("#fail_countryCode").show();
    $("#countryCode").addClass("invalid");
    error = 1;
  }

  var phoneNumber = $("#phone1").val();

  var filter =
    /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  var numbers = /^[0-9]+$/;
  if (!numbers.test(phoneNumber)) {
    $("#fail_phonedigit").show();
  }
  if (filter.test(phoneNumber)) {
    if (phoneNumber.length < 12) {
    } else {
      $("#fail_phoneformat").show();
      $("#phone").addClass("invalid");
      error = 1;
      //   alert('Please put 10  digit mobile number');
      //   var validate = false;
    }
  }

  if (address == "") {
    $("#fail_address").show();
    $("#address").addClass("invalid");
    error = 1;
  }

  if (system_installer == "") {
    $("#fail_systeminstaller").show();
    $("#system_installer").addClass("invalid");
    error = 1;
  }

  if (project == "") {
    $("#fail_projectcompletedby").show();
    $("#project").addClass("invalid");
    error = 1;
  }

  if (usage == "") {
    $("#fail_monthlyuse").show();
    $("#usage").addClass("invalid");
    error = 1;
  }

  if (system_type == "") {
    $("#fail_solarsystemtype").show();
    $("#system_type").addClass("invalid");
    error = 1;
  }

  if (panel_place == "") {
    $("#fail_solarpanelplace").show();
    $("#panel_place").addClass("invalid");
    error = 1;
  }

  if (finance == "") {
    $("#fail_finance").show();
    $("#finance").addClass("invalid");
    error = 1;
  }
  if (error == 1) return false;
  else return true;
}
