$(function(){

   let add = document.getElementById("add");

   add.addEventListener('click', toggleForm);

   function toggleForm()
   {

      Animation.callFormBack();
      let pageName = Logics.getCurrentPageName();

      let addForm = document.getElementById(pageName+'Page');
      addForm.style.display = "flex";

      let submitform = document.querySelector('#'+pageName+'Page  input[type=submit]');


   }


})
