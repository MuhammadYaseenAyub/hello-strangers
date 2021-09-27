/*const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "users.php";
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
$("#login_form").submit(function (e) { 
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (data) {
      if(data == "login"){
        swal('Login','Success','success',{buttons:false, timer:2000}).then(function () { 
          url_link = url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3]+"/";
          window.location.href = url_link+"Home/chat";
         });
      }else if(data == "cant_login"){
        swal('Failed','Wrong password or email','error',{buttons:false, timer:2000})
      }
    }
  });
});