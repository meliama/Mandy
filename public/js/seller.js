function openTab(nombre) {
    var i;
    var x = document.getElementsByClassName("info-container");
    console.log(x);
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(nombre).style.display = "block";
}
