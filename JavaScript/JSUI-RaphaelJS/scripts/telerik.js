var paper = Raphael("telerik-logo",330,100);
var logo = paper.text(160,40,"Telerik");
logo.attr({
  "font-family":"Calibri",
  "font-size":"55",
  "font-weight":"900"
});
var copyright = paper.text(245,40,"\u00AE");
copyright.attr({
  "font-family":"Calibri",
  "font-size":"28"
});
var moto = paper.text(190,70,"Develop Experiences");
moto.attr({
  "font-family":"Calibri Light",
  "font-size":"24",
  "font-weight":"100"
});
var path = paper.path("M 10 15 l  12 -12 12 12 -12 12 12 12 12 -12 -12 -12 12 -12 12 12");
path.attr({
 "stroke-width":"7px",
 "stroke":"rgb(60,255,60)"
  
});
path.translate(10,15);