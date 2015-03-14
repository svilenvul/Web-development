(function ($) {
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
            speed: 100,
            state: "stopped",
            treshould: 72,
            targetUp: undefined,
            targetDown: undefined,
            getUp: function () {
                return this.element.offset().top;
            },
            getDown: function () {
                return this.element.offset().top + this.element.height();
            },
            moveUp: function () {
                this.state = "movingUp";
                this.element.removeClass("stopped").addClass("movingUp");
                $distance = this.element.height() + this.treshould;
                $target = parseInt(this.element.css("top")) - $distance;
                $correction = $distance / this.speed;
                that = this;
                this.element.animate({bottom: 'auto', top: $target}, {duration: 1000 * $correction, complete: function () {
                        that.stop();
                    }});

            },
            moveDown: function () {
                this.state = "movingDown";
                this.element.removeClass("stopped").addClass("movingDown");
                $distance = this.element.height() + this.treshould;                
                $target = parseInt(this.element.css("top")) + $distance;
                $correction = $distance / this.speed;
                that = this;
                this.element.animate({bottom: 'auto', top: $target}, {duration: 1000 * $correction, complete: function () {
                        that.stop();
                    }});
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
                if ($windowDown < $elevatorUp) {
                    $elevator.moveUp();
                }
                if ($windowUp > $elevatorDown) {
                    $elevator.moveDown();
                }
            }
        }

        $(window).on('scroll', function () {
            update($elevator, $window);
        });
    });

}(jQuery));