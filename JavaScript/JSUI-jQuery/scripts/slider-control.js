var timer;
var $allSlides = $('#slider-container').children();
slideShow($allSlides, timer);
var $btnPrev = $("#btn-previous");
var $btnNext = $("#btn-next");

$btnPrev.on("click", function () {
	prevSlide($allSlides);
	clearInterval(timer);
	slideShow($allSlides, timer);
});
$btnNext.on("click", function () {
	nextSlide($allSlides);
	clearInterval(timer);
	slideShow($allSlides, timer);
});

function nextSlide($allSlides) {
	var $currentSlide = $(".visible");
	var $lastSlide = $allSlides.last();
	var $nextSlide;
	if ($currentSlide[0] === $lastSlide[0]) {
		$nextSlide = $allSlides.first();
	} else {
		$nextSlide = $currentSlide.next();
	}
	changeSlide($currentSlide, $nextSlide);
}

function prevSlide($allSlides) {
	var $currentSlide = $(".visible");
	var $firstSlide = $allSlides.first();
	var $nextSlide;
	if ($currentSlide[0] === $firstSlide[0]) {
		$nextSlide = $allSlides.last();
	} else {
		$nextSlide = $currentSlide.prev();
	}
	changeSlide($currentSlide, $nextSlide);
}

function changeSlide($currentSlide, $nextSlide) {
	$currentSlide.fadeOut("fast", function () {
		$currentSlide.attr("class", "hidden");
		$nextSlide.attr("class", "visible");
		$nextSlide.fadeIn();
	});
}

function slideShow($allSlides) {
	timer = setInterval(function () {
			nextSlide($allSlides);
		}, 5000);
}
