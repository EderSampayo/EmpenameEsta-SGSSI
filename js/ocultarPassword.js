function ocultarPassword() {
    var x = document.getElementById("inputPassword");
    if (x.type === "contra") {
      x.type = "text";
    } else {
      x.type = "contra";
    }
  }