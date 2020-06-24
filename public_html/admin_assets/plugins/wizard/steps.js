$(".tab-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onFinished: function (event, currentIndex) {
       swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
            
    }
});


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
         swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: 
    {
        email: {
            email: !0
        }
    }
})


function mostrarImagen(input) {
    if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function (e) {
      $('#img_destino').attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
    }
   }
    
   $(".input-file").change(function(){
    mostrarImagen(this);
   });


   $.validator.messages.required = 'Campo requerido';
   $.validator.messages.email = 'Por favor introduce un correo valido';

   $(".validation-wizard").validate({

    rules: {  

          dimage:{
                  required: true,
                  accept:"jpg,png,jpeg,gif"
              }  
      },
  messages: {

          dimage:{
                  required: "Select Image",
                  accept: "Only image type jpg/png/jpeg/gif is allowed"
              }  

           }      
      });