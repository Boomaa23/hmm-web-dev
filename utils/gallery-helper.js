var myIndex = 0;
gallery();

function gallery() {
  var i;
  var x = document.getElementsByClassName("gallery");
  for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(gallery, 10000);
}
