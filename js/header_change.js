
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function header_text_change() {
    var x = getCookie("user_email");
    console.log(x);
    if(x!=""){
        //document.getElementsByClassName("header-right"); //.innerHTML = "<a href="../php/logout.php" class="colored">Logout</a>";
        document.getElementsByClassName("header-right")[0].innerHTML = '<a href="../php/logout.php" class="colored">Logout</a>';
    }
    console.log("Prova");
  }

  header_text_change();