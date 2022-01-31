// project page lightbox strat

      // Get the modal
      let modal = document.getElementById("masterPlanlightmodal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      let masterPlanopenBtn = document.getElementById("masterPlanopenBtn");
      let modalImg = document.getElementById("lightbox-image");
      
      masterPlanopenBtn.onclick = function(){
        modal.style.display = "block";
        modalImg.src = "./asset/masterplan.jpg";
      }

      // Get the <span> element that closes the modal
      let span = document.getElementsByClassName("lightboxclose")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      }

// Project page lightbox End