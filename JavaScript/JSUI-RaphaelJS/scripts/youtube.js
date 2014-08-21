var paper = Raphael("youtube-logo",330,120);
var background = paper.rect(150,10,170,100,25);
background.attr({
  "fill":"red",
  "stroke":"none"
});
var you = paper.text(80,60,"You");
you.attr({
  "font-family":"Alternate Gothic No 2 ",
  "font-size":"100",
  "font-weight":"900",
  "fill":"#444"
});
you.scale(0.6,1);
var tube = paper.text(230,60,"Tube");
tube.attr({
  "font-family":"Alternate Gothic No 2 ",
  "font-size":"100",
  "font-weight":"900",
  "fill":"white"
});
tube.scale(0.6,1);