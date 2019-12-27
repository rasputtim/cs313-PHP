function clickMe() {
	alert("Clicked!");
}

function changeColor() {
	var textbox_id = "txtColor";
	var textbox = document.getElementById(textbox_id);

	var div_id = "div1";
	var div = document.getElementById(div_id);

	// We should verify values here before we use them...
	var color = textbox.value;
	div.style.backgroundColor = color;

}

function hideDiv2() {
  var x = document.getElementById("div2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

