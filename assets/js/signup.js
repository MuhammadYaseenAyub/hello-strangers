/*const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}*/

$("#sign_up_form").submit(function(e) {

  e.preventDefault();

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
		type: "POST",
		url: url,
    processData: false,
    contentType: false,
    data: new FormData(this),
		success: function (data) {
			if (data === 'validation_error') {
				swal("Error", "Invalid input", "warning", {
					button: false,
					timer: 700,
				}).then(function () {
					location.reload();
				});

			}
      else if(data === 'signup_success'){
        swal("Success", "Data entered", "success", {
					button: false,
					timer: 500,
				}).then(function () {
          url_link = url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3]+"/";
					window.location.href = url_link+"Home/login";
				});
      }
      else if(data === 'signup_fail'){
        swal("Failed", "Could not enter data try again later", "error", {
					button: false,
					timer: 10,
				}).then(function () {
					location.reload();
				});
      }
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			swal("Error", textStatus + XMLHttpRequest + errorThrown, "error");
		}
	});
});
