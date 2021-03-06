function simpleScatterPlot (filename) {


// Set margins and size
var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 485 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var color = d3.scale.category10();

var xAxis = d3.svg.axis()
    .ticks(8)
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var svg = d3.select(".svg-holder-simple").append("svg")
  .attr("viewBox", "0 0 485 400")
  .attr("preserveAspectRatio", "xMinYMin meet")
  .append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.csv(filename, function(error, data) {
  data.forEach(function(d) {
    d.percentage_diabetes = +d.percentage_diabetes;
    d.per_capita_spend = +d.per_capita_spend;
  });

  x.domain(d3.extent(data, function(d) { return d.percentage_diabetes; })).nice();
  y.domain(d3.extent(data, function(d) { return d.per_capita_spend; })).nice();

  // Draw x axis
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .append("text")
      .attr("class", "label")
      .attr("x", width)
      .attr("y", -6)
      .style("text-anchor", "end")
      .text("Wavelength (nm)");

  // Draw y axis
  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .attr("class", "label")
      .style("text-anchor", "end")
      .text("n")

  // Draw dots
  svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("stroke", "none")
      .attr("r", 1.5)
      .attr("cx", function(d) { return x(d.percentage_diabetes); })
      .attr("cy", function(d) { return y(d.per_capita_spend); });
  
  // Draw legend
  var legend = svg.selectAll(".legend")
      .data(color.domain())
    .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });
});

}

//simpleScatterPlot();
