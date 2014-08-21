(function () {
  var $errorMessage, $successMessage, addStudent, reloadStudents, resourceUrl;  
  
  resourceUrl = 'http://localhost:3000/students';

  $successMessage = $('.messages .success');

  $errorMessage = $('.messages .error');
	
	$("#tb-id").hide();
  addStudent = function (data) {
    return $.ajax({
      url: resourceUrl,
      type: 'POST',
      data: JSON.stringify(data),
      contentType: 'application/json',
      success: function (data) {
        $successMessage
          .html('' + data.name + ' successfully added')
          .show()
          .fadeOut(2000);
        reloadStudents();
      },
      error: function (err) {
        $errorMessage
          .html('Cannot reach server: ' + err.status)
          .show()
          .fadeOut(2000);		  
      }
    });
  };

  reloadStudents = function () {
    $.ajax({
      url: resourceUrl,
      type: 'GET',
      contentType: 'application/json',
      success: function (data) {
        var student, $studentsList, i, len;
        $studentsList = $('<ul/>').addClass('students-list');
        for (i = 0, len = data.students.length; i < len; i++) {
          student = data.students[i];
          $('<li />')
            .addClass('student-item')
            .append($('<strong /> ')
              .html(student.name))
			  .attr("id",student.id)
            .append($('<span />')
              .html(student.grade))
			  .attr("id",student.id)
            .appendTo($studentsList);	        
		}
		$('#students-container').html($studentsList);
      },
      error: function () {
        $errorMessage
          .html("Error happened: " + err)
          .show()
          .fadeOut(2000);
      }
    });
  };

  deleteStudent = function (data) {
	 $.ajax({
            url: resourceUrl + '/' + data.id,
            type: 'POST',
            success: function (data) {
				$successMessage
				  .html('Student successfully deleted')
				  .show()
				  .fadeOut(2000);
				$("ul").remove("#"+data.id)
				reloadStudents();
			},
				
            error: function (err) {
				$errorMessage
				  .html('Error happened: ' + err)
				  .show()
				  .fadeOut(2000);
			},			
            timeout: 5000,
            data: {_method: 'delete'}
     });
  };
 
  $(function () {
    reloadStudents();
    $('#btn-add-student').on('click', function () {
		var student,name,grade;
		
		name = $('#tb-name').val();
		grade = $('#tb-grade').val();
		
		if(isNaN(parseInt(grade))) {
			$errorMessage.html("Grade must be a number!")
				.fadeOut(2000);
		}else if (name==="") {
			$errorMessage.html("Please enter student name!")
				.fadeOut(2000);
		} else {
			student = {
				name: $('#tb-name').val(),
				grade: $('#tb-grade').val()
			};
			addStudent(student);
		}	
		
		$('#tb-grade').val("");
		$('#tb-id').val("");
		$('#tb-name').val("");
    });
	$('#btn-remove-student').on("click",function () {
		var name,grade,id;
		name =  $('#tb-name').val();
		grade = $('#tb-grade').val();
		id = $('#tb-id').val();
		
		if(isNaN(parseInt(id))) {
			$errorMessage.html("Please select student!")
				.fadeOut(2000);
		} else {
			student = {
				name: $('#tb-name').val(),
				grade: $('#tb-grade').val(),
				id:$('#tb-id').val()
			};
			deleteStudent(student);
		}		
		
		$('#tb-grade').val("");
		$('#tb-id').val("");
		$('#tb-name').val("");
	});
	$('#students-container').on("click","li",function (event) {
		console.log(event);
		$("#students-container li").removeClass("selected");
		$(event.currentTarget).addClass("selected");
		$('#tb-id').val(this.id);
		$('#tb-name').val(this.firstChild.innerHTML);
		$('#tb-grade').val(this.lastChild.innerHTML);
	});
  });

}());

