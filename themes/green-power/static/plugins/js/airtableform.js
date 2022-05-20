/* Contact Form starts */
$(".contact-submit").click(function (event) {
  event.preventDefault();
  $(".ajax-loader").show();
  $(".contact-submit").hide();
  $("#failure_msg").hide();
  $("#success_msg").hide();

  if (Form_Validate("contact-form")) {
    var form = $("#contact-form")[0];
    var formdata = new FormData(form);
    /* Ajax call for submitting contact data starts */
    $.ajax({
      url: "/php/airtable/savecontact.php",
      type: "POST",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (result) {
        $(".ajax-loader").hide();
        $(".contact-submit").show();
        if (result.flag == "false") {
          $("#failure_msg").show();
          $("#success_msg").hide();
        } else {
          $("#failure_msg").hide();
          $("#success_msg").show();
          $("#contact-form").trigger("reset");
        }
      },
    });
    /* Ajax call for submitting contact data ends */
  } else {
    $(".ajax-loader").hide();
    $(".contact-submit").show();
  }
});
/* Contact Form ends */
