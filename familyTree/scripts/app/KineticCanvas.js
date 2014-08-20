define("KineticCanvas", ["kinetic"], function () {
	var layer,
	stage,
	CELL_WIDTH = 190,
	CELL_HEIGHT = 25,
	HORIZONTAL_DIST = 420,
	VERTICAL_DIST = 60;

	function init(containerID) {
		stage = new Kinetic.Stage({
				container : containerID,
				width : 2000,
				height : 2000
			});
		layer = new Kinetic.Layer();
	}

	function addFamily(child, spouse, generation, count, parentCoor) {
		var offsetY = (generation + 1) * VERTICAL_DIST;
		var offsetX = (count - 1) * HORIZONTAL_DIST;

		var family = new Kinetic.Group({});
		if (spouse) {
			var childSpous = createFamilyMember(child);
			var spouse = createFamilyMember(spouse);

			childSpous.setPosition({
				x : offsetX,
				y : offsetY
			});
			spouse.setPosition({
				x : offsetX + HORIZONTAL_DIST / 2,
				y : offsetY
			});
			var line = new Kinetic.Line({
					points : [offsetX + CELL_WIDTH, offsetY + CELL_HEIGHT / 2, offsetX + HORIZONTAL_DIST / 2, offsetY + CELL_HEIGHT / 2],
					stroke : 'black',
					strokeWidth : 1
				});

			family.add(line);			
			family.add(spouse);
		} else {
			var childSpous = createFamilyMember(child);
			childSpous.setPosition({
				x : offsetX,
				y : offsetY
			});			
		}
		var familyRelatinship = new Kinetic.Line({
				points : [offsetX + CELL_WIDTH / 2, offsetY, offsetX + CELL_WIDTH / 2, offsetY - 8, parentCoor.x, parentCoor.y + 15, parentCoor.x, parentCoor.y],
				stroke : 'black',
				strokeWidth : 1
			});
		family.add(childSpous);
		family.add(familyRelatinship);
		layer.add(family);

		return {
			x : offsetX + (HORIZONTAL_DIST / 4 + CELL_WIDTH / 2),
			y : offsetY + CELL_HEIGHT / 2
		};
	}

	function createFamilyMember(name) {
		var member = new Kinetic.Group({});
		var memberBox = new Kinetic.Rect({
				width : CELL_WIDTH,
				height : CELL_HEIGHT,
				fill : 'yellowgreen',
				cornerRadius : 10,
				shadowColor : 'black',
				shadowBlur : 2,
				shadowOffset : {
					x : 10,
					y : 10
				},
				shadowOpacity : 0.5
			});
		var memberName = new Kinetic.Text({
				text : name,
				fontSize : 20,
				fontFamily : 'Calibri',
				fill : 'black'
			});
		memberName.offsetX(-22);
		member.add(memberBox);
		member.add(memberName);
		return member;
	}

	function draw() {
		stage.add(layer);
	}

	return {
		init : init,
		addFamily : addFamily,
		draw : draw
	};
});
