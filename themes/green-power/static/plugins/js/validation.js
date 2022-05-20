$(document).ready(function () {
  var langMsg = {
    en: {
      emailreq: "Please enter Email Address.",
      email: "Please enter a valid Email Address.",
      fullname: "Please enter Fullname.",
      phonereq: "Please enter phone Number.",
      phonemax: "Contact should be 12 digit number.",
      message: "Please enter Message.",
    },
    es: {
      emailreq: "Ingrese la dirección de correo electrónico.",
      email: "Por favor, introduce una dirección de correo electrónico válida.",
      fullname: "Por favor ingrese Nombre completo.",
      phonereq: "Por favor, introduzca el número de teléfono.",
      phonemax: "El contacto debe ser un número de 12 dígitos.",
      message: "Por favor ingrese Mensaje.",
    },
    ge: {
      emailreq: "Bitte E-Mail-Adresse eingeben.",
      email: "Bitte geben Sie eine gültige E-Mail-Adresse ein.",
      fullname: "Bitte geben Sie den vollständigen Namen ein.",
      phonereq: "Bitte Telefonnummer eingeben.",
      phonemax: "Der Kontakt sollte eine 12-stellige Nummer sein.",
      message: "Bitte Nachricht eingeben.",
    },
    du: {
      emailreq: "Voer e-mailadres in.",
      email: "Vul een geldig e-mailadres in.",
      fullname: "Vul a.u.b. Volledige naam in.",
      phonereq: "Voer het telefoonnummer in.",
      phonemax: "Contactpersoon moet een 12-cijferig nummer zijn.",
      message: "Voer a.u.b. Bericht in.",
    },
    cz: {
      emailreq: "Zadejte e-mailovou adresu.",
      email: "Prosím zadejte platnou emailovou adresu.",
      fullname: "Zadejte prosím celé jméno.",
      phonereq: "Zadejte prosím telefonní číslo.",
      phonemax: "Kontakt by měl obsahovat 12místné číslo.",
      message: "Zadejte zprávu.",
    },
  };
  var languagemulti = $("#current-lang").val();
  //alert(languagemulti);
  if (languagemulti == "en") {
    var emailreq = langMsg.en.emailreq;
    var email = langMsg.en.email;
    var fullname = langMsg.en.fullname;
    var phonereq = langMsg.en.phonereq;
    var phonemax = langMsg.en.phonemax;
    var message = langMsg.en.message;
  }
  if (languagemulti == "es") {
    var emailreq = langMsg.es.emailreq;
    var email = langMsg.es.email;
    var fullname = langMsg.es.fullname;
    var phonereq = langMsg.es.phonereq;
    var phonemax = langMsg.es.phonemax;
    var message = langMsg.es.message;
  }
  if (languagemulti == "ge") {
    var emailreq = langMsg.ge.emailreq;
    var email = langMsg.ge.email;
    var fullname = langMsg.ge.fullname;
    var phonereq = langMsg.ge.phonereq;
    var phonemax = langMsg.ge.phonemax;
    var message = langMsg.ge.message;
  }
  if (languagemulti == "du") {
    var emailreq = langMsg.du.emailreq;
    var email = langMsg.du.email;
    var fullname = langMsg.du.fullname;
    var phonereq = langMsg.du.phonereq;
    var phonemax = langMsg.du.phonemax;
    var message = langMsg.du.message;
  }
  if (languagemulti == "cz") {
    var emailreq = langMsg.cz.emailreq;
    var email = langMsg.cz.email;
    var fullname = langMsg.cz.fullname;
    var phonereq = langMsg.cz.phonereq;
    var phonemax = langMsg.cz.phonemax;
    var message = langMsg.cz.message;
  }
  $("#form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      fullname: {
        required: true,
      },
      phone: {
        required: true,
        maxlength: 12,
        digits: true,
      },
      message: {
        required: true,
      },
    },
    messages: {
      email: {
        required: emailreq,
        email: email,
      },
      fullname: {
        required: fullname,
      },
      phone: {
        required: phonereq,
        rangelength: phonemax,
      },
      message: {
        required: message,
      },
    },
    submitHandler: function (form) {
      $(".ajax-loader").show();
      form.submit();
    },
  });
});
