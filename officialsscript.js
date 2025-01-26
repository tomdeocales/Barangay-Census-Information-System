
$(document).ready(function(){
    // code for showing/hiding update form goes here...

    $('#update-form1').submit(function(event){
        event.preventDefault(); // prevent the default form submission behavior

        // get the input values from the form
        var name = $(this).find('#name').val();
        var title = $(this).find('#title').val();
        var photo = $(this).find('#photo')[0].files[0];

        // update the values on the official card
        $(this).siblings('h3').text(name);
        $(this).siblings('h4').text(title);
        $(this).siblings('img').attr('src', URL.createObjectURL(photo));

        // convert the image data to a base64-encoded string
        var reader = new FileReader();
        reader.onload = function(event) {
            var photoData = event.target.result;

            // store the updated values in localStorage
            var index = $(this).parent().index(); // get the index of the official card
            localStorage.setItem('official' + index + '_name', name);
            localStorage.setItem('official' + index + '_title', title);
            localStorage.setItem('official' + index + '_photo', photoData);
        }.bind(this);
        reader.readAsDataURL(photo);

        // hide the update form
        $(this).hide();
    });

    // retrieve the stored values on page load
    $('.official-card').each(function(index){
        var name = localStorage.getItem('official' + index + '_name');
        var title = localStorage.getItem('official' + index + '_title');
        var photoData = localStorage.getItem('official' + index + '_photo');

        if (name && title && photoData) {
            $(this).find('h3').text(name);
            $(this).find('h4').text(title);
            $(this).find('img').attr('src', photoData);
        }
    });
});
	
	$('#update-form2').submit(function(event) {
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
      var photoData = event.target.result;

      // store the updated values in localStorage
      var index = $(this).parent().index(); // get the index of the official card
      localStorage.setItem('official' + index + '_name', name);
      localStorage.setItem('official' + index + '_title', title);
      localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
  });

  // retrieve the stored values on page load
  $('.official-card').each(function(index) {
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
      $(this).find('h3').text(name);
      $(this).find('h4').text(title);
      $(this).find('img').attr('src', photoData);
    }
  });
	
	
		$('#update-form3').submit(function(event) {
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
      var photoData = event.target.result;

      // store the updated values in localStorage
      var index = $(this).parent().index(); // get the index of the official card
      localStorage.setItem('official' + index + '_name', name);
      localStorage.setItem('official' + index + '_title', title);
      localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
  });

  // retrieve the stored values on page load
  $('.official-card').each(function(index) {
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
      $(this).find('h3').text(name);
      $(this).find('h4').text(title);
      $(this).find('img').attr('src', photoData);
    }
  });

  $(document).ready(function(){
    // code for showing/hiding update form goes here...

    $('#update-form4').submit(function(event){
        event.preventDefault(); // prevent the default form submission behavior

        // get the input values from the form
        var name = $(this).find('#name').val();
        var title = $(this).find('#title').val();
        var photo = $(this).find('#photo')[0].files[0];

        // update the values on the official card
        $(this).siblings('h3').text(name);
        $(this).siblings('h4').text(title);
        $(this).siblings('img').attr('src', URL.createObjectURL(photo));

        // convert the image data to a base64-encoded string
        var reader = new FileReader();
        reader.onload = function(event) {
            var photoData = event.target.result;

            // store the updated values in localStorage
            var index = $(this).parent().index(); // get the index of the official card
            localStorage.setItem('official' + index + '_name', name);
            localStorage.setItem('official' + index + '_title', title);
            localStorage.setItem('official' + index + '_photo', photoData);
        }.bind(this);
        reader.readAsDataURL(photo);

        // hide the update form
        $(this).hide();
    });

    // retrieve the stored values on page load
    $('.official-card').each(function(index){
        var name = localStorage.getItem('official' + index + '_name');
        var title = localStorage.getItem('official' + index + '_title');
        var photoData = localStorage.getItem('official' + index + '_photo');

        if (name && title && photoData) {
            $(this).find('h3').text(name);
            $(this).find('h4').text(title);
            $(this).find('img').attr('src', photoData);
        }
    });
});

$('#update-form5').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});

$('#update-form6').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});
$('#update-form7').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});
$('#update-form8').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});
$('#update-form9').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});
$('#update-form10').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});
$('#update-form11').submit(function(event){
    event.preventDefault(); // prevent the default form submission behavior

    // get the input values from the form
    var name = $(this).find('#name').val();
    var title = $(this).find('#title').val();
    var photo = $(this).find('#photo')[0].files[0];

    // update the values on the official card
    $(this).siblings('h3').text(name);
    $(this).siblings('h4').text(title);
    $(this).siblings('img').attr('src', URL.createObjectURL(photo));

    // convert the image data to a base64-encoded string
    var reader = new FileReader();
    reader.onload = function(event) {
        var photoData = event.target.result;

        // store the updated values in localStorage
        var index = $(this).parent().index(); // get the index of the official card
        localStorage.setItem('official' + index + '_name', name);
        localStorage.setItem('official' + index + '_title', title);
        localStorage.setItem('official' + index + '_photo', photoData);
    }.bind(this);
    reader.readAsDataURL(photo);

    // hide the update form
    $(this).hide();
});

// retrieve the stored values on page load
$('.official-card').each(function(index){
    var name = localStorage.getItem('official' + index + '_name');
    var title = localStorage.getItem('official' + index + '_title');
    var photoData = localStorage.getItem('official' + index + '_photo');

    if (name && title && photoData) {
        $(this).find('h3').text(name);
        $(this).find('h4').text(title);
        $(this).find('img').attr('src', photoData);
    }
});