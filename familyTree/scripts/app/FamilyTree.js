define("FamilyTree", ["KineticCanvas"], function (Canvas) {
	var FamilyTree;
	FamilyTree = (function () {

		var rootFamily,
		familyMembers;

		function load(families) {
			familyMembers = families;
			Canvas.init("container");
			rootFamily = findRoot();
			traverseTree(rootFamily);
			Canvas.draw();

		}

		function findRoot() {

			for (var i = 0; i < familyMembers.length; i++) {
				var mother = familyMembers[i].mother;
				var father = familyMembers[i].father;
				var withoutParents = true;
				for (var k = 0; k < familyMembers.length; k++) {
					var childrenToCheck = familyMembers[k].children;
					for (var l = 0; l < childrenToCheck.length; l++) {
						if (mother === childrenToCheck[l] || father === childrenToCheck[l]) {
							withoutParents = false;
							break;
						}
					}
					if (withoutParents === false) {
						break;
					}

				}
				if (withoutParents) {
					return familyMembers[i];
				}
			}
		}

		function traverseTree(root) {
			var queue = [];
			var count = 0;
			var countChildren = 0;
			var generationLength = root.children.length;
			var generation = 0;
			var coor = Canvas.addFamily(root.mother, root.father, -1, 1, {
					x : 0,
					y : 0
				});
			queue.push([root, coor]);
			while (queue.length > 0) {
				if (count === generationLength) {
					count = 0;
					generationLength = countChildren;
					countChildren = 0;
					generation++;
				}
				var parentNode = queue.shift();
				var parent = parentNode[0];
				var coor = parentNode[1];
				var children = parent.children;

				var newCoor;
				for (var i = 0; i < children.length; i++) {
					var child = children[i];
					count++;
					var spouse = hasSpouse(child);
					newCoor = Canvas.addFamily(child, spouse, generation, count, coor);

					for (var l = 0; l < familyMembers.length; l++) {
						var family = familyMembers[l];

						if (family.mother === child || family.father === child) {
							queue.push([family, newCoor]);
							countChildren = countChildren + family.children.length;
							break;
						}
					}
				}
			}
		}

		function hasSpouse(child) {
			for (var l = 0; l < familyMembers.length; l++) {
				var family = familyMembers[l];

				if (family.father === child) {
					return family.mother;
				} else if (family.mother === child) {
					return family.father;
				}
			}
		}

		return {
			load : load
		};
	}
		());
	return FamilyTree;
});
