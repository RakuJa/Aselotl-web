var checkboxes = document.getElementsByTagName('input');

for (var i=0; i<checkboxes.length; i++)  {
  if (checkboxes[i].type == 'checkbox')   {
    checkboxes[i].checked = false;
  }
}

function show_pass() {
  var x = document.getElementById("pwd");
  var y = document.getElementById("rpwd");
  var z = document.getElementById("opwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
} 