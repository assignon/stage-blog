Helper = {

   initXhr: function()
   {

       let xhr;

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
            xhr = new XMLHttpRequest();
          } else {
           // code for IE6, IE5
             xhr = new ActiveXObject("Microsoft.XMLHTTP");
         }

         return xhr;

     },


     inputValues: function(selector)
     {

       let form = document.querySelectorAll(selector+' input');console.log(form);
       let inputArr = [];

       for (var i = 0; i < form.length; i++) {

          let formArr = form[i];
          let inputName = formArr.name;
          let inputVal = formArr.value;

          inputArr.push({inputName: inputName});

       }

       console.log(inputArr);

     }

}
