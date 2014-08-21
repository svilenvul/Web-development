bounceBall();
function bounceBall () {
  var canvas = document.getElementById("canvas");
  var context = canvas.getContext('2d');
  var circleRadius = 5;
  var centerX = 30;
  var centerY = 30;
  var command =  'moveDownRigth';
  setInterval(moveOnce,10);   
  
  
  function moveDownRigth() {    
    if (centerY + circleRadius >= canvas.height){
      command = 'moveUpRigth';
	  return;
    } else if (centerX + circleRadius >= canvas.width){
      command = 'moveDownLeft'; 
	  return;
    }   
    centerX++;
    centerY++;
    redraw();
    command = 'moveDownRigth';   
  }
  
  function moveUpRigth() {
    if (centerY - circleRadius <= 0){
       command = 'moveDownRigth';
	   return;
    } else if(centerX + circleRadius >= canvas.width){
      command = 'moveUpLeft';
	  return;
    } 
    centerX++;
    centerY--;
    redraw();
    command = 'moveUpRigth';    
  }
  
  function moveUpLeft () {
    if (centerX - circleRadius <= 0){
       command = 'moveUpRigth';
	   return;
    } else if (centerY - circleRadius <= 0){
      command = 'moveDownLeft';
	  return;
    }
    centerX--;
    centerY--;
    redraw();
    command = 'moveUpLeft';    
  }
  
  function moveDownLeft() {
    if (centerX - circleRadius <= 0){
       command = 'moveDownRigth';
	   return;
    } else if(centerY + circleRadius >= canvas.height){
      command = 'moveUpLeft';
	  return;
    }
    centerX--;
    centerY++;
    redraw();
    command = 'moveDownLeft';    
  }
  
  function redraw(){
    context.beginPath();
    context.clearRect(0,0,canvas.width,canvas.height);    
    context.arc(centerX,centerY,circleRadius,0,Math.PI * 2);
    context.fill();
  }  
 
  function moveOnce() {   
    switch(command){
		case 'moveDownRigth' : moveDownRigth();break;
		case 'moveUpRigth' : moveUpRigth();break;
		case 'moveUpLeft' : moveUpLeft();break;
		default : moveDownLeft();break;		
	}
  }   
}

  
  
  
