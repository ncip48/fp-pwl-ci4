const melon = document.getElementById("melon");
const apple = document.getElementById("apple");
const emelon = document.getElementById("emelon");
const eapple = document.getElementById("eapple");
const btn = document.getElementById("btn");
const result_peh = document.getElementById("respeh");
const result_peminh = document.getElementById("respeminh");
const result_phe = document.getElementById("resphe");

const matrix = 10 * 10;

function drawTable(count) {
  var mapSize = 10; // create a field of 10x10
  var cellsPerRow = 10; // 10 cells per row

  let c = 0;

  for (var x = 0; x < mapSize; x++) {
    $("#table").append("<div>");

    for (var y = 0; y < mapSize; y++) {
      //if the count is more than 0 then label the cell with a "X"
      if (c < count) createCell(x, y, "O");
      else createCell(x, y, "X");
      c++;
    }
    $("#table").append("</div>");
  }

  console.log(c);
}

function createCell(x, y, value) {
  var cellDiv = $("<div>" + value + "</div>"); // create the cell div
  cellDiv.addClass("cell"); // add some css
  $("#table").append(cellDiv); // add the cell div to the parent
}

btn.onclick = function () {
  const ph = (melon.value / 100).toFixed(1);
  const pminh = parseFloat(1 - ph).toFixed(1);
  const peh = (melon.value / matrix) * emelon.value;
  const peminh = (apple.value / matrix) * eapple.value;
  const pe = peh * ph + peminh * pminh;
  const phe = (peh * ph) / pe;

  console.log(peh, peminh, phe);

  result_peh.textContent = peh;
  result_peminh.textContent = peminh;
  result_phe.textContent = phe;

  drawTable(7);
};
