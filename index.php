<?php include("doompdf.php"); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Video Player</title>

   <!-- Importing Video.js CSS / JS using CDN URL -->
   <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
   <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
   <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <!--Responsive navbar-->
   <nav class="navbar navbar-expand-lg" style="width:100%; background-color:#087364;">
      <div class="container">
            <a class="navbar-brand" href="#!" style="color:#e1e1e1; font-weight:bold">Pertek Erler</a>
      </div>
   </nav>

   <!-- Header - set the background image for the header in the line below-->
   <header class="py-5" style="background:url('http://www.erler.com/wp-content/uploads/2014/05/interiorFord.jpg') no-repeat center; ">
      <div class="text-center my-5">
         <img class="img-fluid rounded-circle mb-3" src="img/logoPE.jpg" width="150px" height="100px" alt="..." />
         <h1 class="fs-3 fw-bolder" style="color:#bff2f2;">Erler Industries</h1>
         <p class="text-white-50 mb-0">Departamento de ingenieria y seguridad</p>
      </div>
   </header>

   <!--Inicio-->
   <section class="py-5">
      <div class="container my-5">
         <div class="row justify-content-center">
            <div class="col-lg-6">
               <h2 class="text-center">INDICACIONES:</h2>
               <p class="fs-5 mb-1">El video que verás a continuación, <span class="fs-5 fw-bolder">no lo podrás atrasar ni adelantar, solo pausar en caso de ser necesario</span>.
               </p>
               <p class="fs-5 mb-1">
               Se te pide prestes atención y al <span class="fs-5 fw-bolder">finalizar deberás ingresar tus datos para que puedas descargar</span> el documento que te acredite el haber tomado este curso de forma satisfactoria.
               </p>
               <p class="fs-5 mb-0">Recuerda que sin esta constancia que demuestre que estás enterado de las medidas de seguridad, <span class="fs-5 fw-bolder">no podrás ingresar</span> a las instalaciones de  Pertek-Erler</p>
            </div>
         </div>
      </div>
   </section>

      <!--Video-->
      <div class="row justify-content-center">
            <h3 class="text-center mt-3">MANUAL PARA TRABAJO DE CONTRATISTAS</h3>
         <div class="card border-dark border border-2 mb-6 justify-content-left" style="max-width: 60rem;">
            <div class="card-header"></div>
               <div class="card-body text-dark justify-content-center">
                  <h5 class="card-title"></h5>
                     <video
                        id="my-video-player"
                        class="video-js vjs-default-skin vjs-big-play-centered"
                        controls="true"
                        preload="auto"
                  
                        width=910
                        height=400
                        data-setup='{}'
                        >
                        <source
                        src="Gestión de Seguridad de la Información.mp4"
                        type="video/mp4"
                        >
                     </video>
               </div>
         </div>
      </div>

      <!--Formulario-->
      <div class="container-md" id="ss">
         <div class="col">
            <div class="card mt-4">
               <div class="card header border border-2">
                     <h3 class="text-center mt-3">Por favor llene los siguientes campos para validar su participacion</h3>
               </div>
               <div class="card-body border border-2">
                  <div class="container-sm mb-3">
                  <form id="myForm" action="" method="POST">
                     <input type="text" class="form-control mb-3 mt-3" placeholder="Nombre de la compañia" aria-label="First name" name="name_company" required>
                     <input type="text" class="form-control mb-3" placeholder="Nombre del trabajador" aria-label="Last name" name="name_worker" required>
                     <button class="btn btn-primary" type="submit" value="Submit" style="width:100%; background-color:#087364;" name="btn" id="btn">Enviar</button>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div> 

       <!-- Footer-->
       <footer class="py-5 mt-3" style="background-color:#087364;">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Pertek Erler 2023</p></div>
        </footer>
</div>

   <script>
      // Initializing the video player with video options
      const player = videojs('my-video-player');

      // Hide the progress control from the control bar
      player.controlBar.progressControl.show();

      //Video ends, and show the form
      ss.style.display='none'
      player.on('ended', function() {
         if (ss.style.display=="none") {
            // this SHOWS the form
            ss.style.display = '';
            const targetSection = document.getElementById('ss');
            targetSection.scrollIntoView({ behavior: 'smooth' });
         } else {
            // this HIDES the form
            ss.style.display = '';
         }
      });

      //On exit full-screen enter in this function
      player.on('fullscreenchange', function() {
         if (player.isFullscreen()) {
            // El video ha entrado en modo de pantalla completa
            console.log('Modo de pantalla completa activado');
            // Ejecutar acciones adicionales cuando se entra en el modo de pantalla completa
            } 
         else {
            // El video ha salido del modo de pantalla completa
            console.log('Modo de pantalla completa desactivado');
            // Ejecutar acciones adicionales cuando se sale del modo de pantalla completa
            const targetSection = document.getElementById('ss');
            targetSection.scrollIntoView({ behavior: 'smooth' });
         }
      });

         const form = document.getElementById('myForm');

            form.addEventListener('submit', function(event) {
               //hide the display form
               ss.style.display='none'
         
         });



      
   </script>

</body>
</html>