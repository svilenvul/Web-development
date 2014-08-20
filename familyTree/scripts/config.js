(function () {
	require.config({
		paths: {
			"kinetic": "libs/kinetic-v5.1.0",
			"data":"data/families",
			"KineticCanvas":"app/KineticCanvas",
			"FamilyTree":"app/FamilyTree"
		}
	});

	require(["FamilyTree","data"], function (FamilyTree,data) {
		FamilyTree.load(data);
	});
}());