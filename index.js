
function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("pno").value;
    if (x ! = 10) {
        text = "Input not valid";
    } else {
        text = "Input OK";
    }
    document.getElementById("sub").innerHTML = text;
}