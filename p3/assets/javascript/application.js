function calculateStatAnalysis(){
  var number_1 = parseInt(document.getElementById("number-1").value);
  var number_2 = parseInt(document.getElementById("number-2").value);
  var number_3 = parseInt(document.getElementById("number-3").value);
  var results = document.getElementById("results");

  results.innerHTML = "";

  var numbers = [number_1, number_2, number_3];
  numbers.sort();

  var max = Math.max(numbers[0], numbers[1], numbers[2]);
  var min = Math.min(numbers[0], numbers[1], numbers[2]);
  var range = max - min;
  var median = numbers[1];
  var sum = 0;

  for(number of numbers){
      sum += number;
  }

  var mean = sum / 3.0;
  var html = "<div class='row'>";
  html += "<div class='col'><h3>Max</h3><p>"+max+"</p></div>";
  html += "<div class='col'><h3>Min</h3><p>"+min+"</p></div>";
  html += "<div class='col'><h3>Range</h3><p>"+range+"</p></div>";
  html += "<div class='col'><h3>Median</h3><p>"+median+"</p></div>";
  html += "<div class='col'><h3>Mean</h3><p>"+mean+"</p></div>";
  html += "</div>";

  results.innerHTML = html;
}
