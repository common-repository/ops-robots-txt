document.addEventListener("DOMContentLoaded", function(){
    var opsWhatsappExist = document.getElementsByClassName('opsWhatsappIcon');
    // If class exists
    if (opsWhatsappExist.length > 0) {
      window.addEventListener('scroll', function() {
          if (window.scrollY > 140) {
            document.querySelector('.opsWhatsappIcon').classList.add('on');
          } else {
            document.querySelector('.opsWhatsappIcon').classList.remove('on');
          } 
      });
    }
});