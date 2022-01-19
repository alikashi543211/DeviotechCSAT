var wrapper2 = document.getElementById("signature-pad2");
var clearButton2 = wrapper2.querySelector("[data-action=clear2]");
var changeColorButton2 = wrapper2.querySelector("[data-action=change-color2]");
var undoButton2 = wrapper2.querySelector("[data-action=undo2]");
var canvas2 = wrapper2.querySelector("canvas");
var signaturePad2 = new SignaturePad(canvas2, {
  backgroundColor: "rgb(255, 255, 255)",
});

function resizeCanvas() {
  var ratio = Math.max(window.devicePixelRatio || 1, 1);
  canvas2.width = canvas2.offsetWidth * ratio;
  canvas2.height = canvas2.offsetHeight * ratio;
  canvas2.getContext("2d").scale(ratio, ratio);
  signaturePad2.clear();
}
window.onresize = resizeCanvas;
resizeCanvas();
clearButton2.addEventListener("click", function (event) {
  signaturePad2.clear();
});

undoButton2.addEventListener("click", function (event) {
  var data = signaturePad2.toData();
  if (data) {
    data.pop(); // remove the last dot or line
    signaturePad2.fromData(data);
  }
});

changeColorButton2.addEventListener("click", function (event) {
  var r = Math.round(Math.random() * 255);
  var g = Math.round(Math.random() * 255);
  var b = Math.round(Math.random() * 255);
  var color = "rgb(" + r + "," + g + "," + b + ")";
  signaturePad2.penColor = color;
});
function ImagePNG2() {
  if (signaturePad2.isEmpty()) {
  } else {
    var dataURL = signaturePad2.toDataURL("image/png");
    var block = dataURL.split(";");
    var mimeType = block[0].split(":")[1];
    var realData = block[1].split(",")[1];
    html =
      '<input type="hidden" name="Signatur_Data_2" value="' +
      realData.replace(/^.*,/, "") +
      '" >';
    html +=
      '<input type="hidden" name="Signatur_Type_2" value="' + mimeType + '" >';
    html += '<input type="hidden" name="Signature_2" value="Signatur.png" >';
    $("#cm_signature").empty().append(html);
  }
}
