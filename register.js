$(document).ready(function(){
  var index = 1;
  $("#addcontact").click(function(){
      index++;
      console.log("yup");
      $("#registercontacts").append(`<div class='contact'><input type='text' name='c_type${index}' placeholder='Type of contact (email, etc.)'><input type='text' name='c_${index}' placeholder='Contact info'></div>`);
    })
});
