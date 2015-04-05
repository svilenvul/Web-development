(function ($) {
    $.fn.exists = function () {
        return this.length !== 0;
    }


    $(document).ready(function () {
        $window = {
            element: $(window),
            getUp: function () {
                return this.element.scrollTop();
            },
            getDown: function () {
                return this.element.scrollTop() + this.element.height();
            }
        };
        $elevator = {
            element: $('.sidebar'),
            shaft: $('#shaft'),
            speed: 100,
            state: "stopped",
            treshould: 75,
            targetUp: undefined,
            targetDown: undefined,
            getUp: function () {
                return this.element.offset().top;
            },
            getDown: function () {
                return this.element.offset().top + this.element.height();
            },
            moveUp: function () {
                $distance = this.element.height() + this.treshould;
                $target = parseInt(this.element.css("top")) - $distance;
                $topEdge = 0
                if ($target >= $topEdge) {
                    this.state = "movingUp";
                    this.element.removeClass("stopped").addClass("movingUp");
                    $correction = $distance / this.speed;
                    that = this;
                    this.element.animate({bottom: 'auto', top: $target}, {duration: 1000 * $correction, complete: function () {
                            that.stop();
                        }});
                }



            },
            moveDown: function () {

                $distance = this.element.height() + this.treshould;
                $target = parseInt(this.element.css("top")) + $distance;
                $bottomEdge = this.shaft.height() - this.element.height();
                if ($target < $bottomEdge) {
                    this.state = "movingDown";
                    this.element.removeClass("stopped").addClass("movingDown");
                    $correction = $distance / this.speed;
                    that = this;
                    this.element.animate({bottom: 'auto', top: $target}, {duration: 1000 * $correction, complete: function () {
                            that.stop();
                        }});
                }

            },
            stop: function () {
                this.state = "stopped";
                //this.element.css({top:'auto',bottom:'auto'});
                this.element.removeClass("movingUp movingDown").addClass("stopped");
                this.element.off();
            }
        };

        function update($elevator, $window) {
            $windowDown = $window.getDown();
            $elevatorDown = $elevator.getDown();
            $windowUp = $window.getUp();
            $elevatorUp = $elevator.getUp();

            if ($elevator.state === "stopped") {
                if ($windowDown < $elevatorUp + 0.7*$elevator.element.height()) {
                    $elevator.moveUp();
                }
                if ($windowUp > $elevatorDown - 0.7*$elevator.element.height()) {
                    $elevator.moveDown();
                }
            }
        }

        $(window).on('scroll', function () {
            update($elevator, $window);
        });






    });

}(jQuery));