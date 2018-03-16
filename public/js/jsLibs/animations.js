Animation = {

  callFormBack: function()
  {

    tl = new TimelineLite();

    tl.to('.formsCont', 0.7, {opacity: 1, zIndex: 3, ease: Expo.easeOut});
    //tl.to('.formBack', 1, {scale: 3, ease: Linear.easeOut}, "formCont -= 0.3");

  },

  closeForm: function(e)
  {

    tl.to('.formsCont', 0.7, {opacity: 0, zIndex: 0, ease: Expo.easeIn});
    let form = e.currentTarget.parentNode;

    tl.to(form, 0.7, {display: 'none', ease: Expo.easeInOut});

  },


  callNotification: function(icon, content)
  {

    let notifImg = document.querySelector('.notifImg img');
    notifImg.src = icon;

    let notifContentContainer = document.querySelector('.notifContentContainer');
    notifContentContainer.textContent = content;

    tl = new TimelineLite();
    tl.to('.notifs', 0.7, {right: '0px', ease: Back.easeOut}, '#show');
    tl.to('.notifs', 0.7, {right: '-300px', ease: Back.easeInOut}, 'show += 5');

  },


  callEditTools:function()
  {

    let tl = new TimelineLite();
    let tl2 = new TimelineLite();

    tl2.to(".showTools", 0.3, {width: '0', height: '0', zIndex: '0'});
    tl2.to(".hideTools", 0.3, {width: '50', height: '48', zIndex: '1'});
    tl.staggerTo('.editItems', 0.2, {right: '98px', ease: Back.easeOut}, '0.1');

  },


  hideEditTools:function()
  {

    let tl = new TimelineLite();
    let tl2 = new TimelineLite();

    tl2.to(".showTools", 0.3, {width: '50', height: '48', zIndex: '1'});
    tl2.to(".hideTools", 0.3, {width: '0', height: '0', zIndex: '0'});
    tl.staggerTo('.editItems', 0.2, {right: '0px', ease: Back.easeIn}, '0.1');
    tl.to('.updateCurBlog', 0.5, {scale: 0, ease: Back.easeIn}, '0.1');
    tl.to('.deleteCurBlog', 0.5, {scale: 0, ease: Back.easeIn}, '0.1');
    //tl.reverse();

  },


  callMoremenu:function()
  {

    let tl = new TimelineLite();
    tl.staggerTo('.moremenusitems', 0.2, {right: '45px', ease: Back.easeOut}, '0.1');

  },


  hideMoremenus:function()
  {

    let tl = new TimelineLite();
    tl.staggerTo('.moremenusitems', 0.2, {right: '0px', ease: Back.easeIn}, '0.1');
    //tl.reverse();

  }


}
