let notices_arr;
$(document).ready(function() {
  if($("#notices")){
      const notices = document.getElementById('notices').content;
      const card_notice = document.getElementById('card-notices');
      const fragment = document.createDocumentFragment();
      $.ajax({
          type: "POST",
          url: "ajax/noticias.php",
          data: {
              "getAllNoticias": ""
          },
          success: function(response) {
              notices_arr = JSON.parse(response);
              printNotices(notices_arr);
          }
      });
      function printNotices(notices_arr) {
          if (notices_arr.length > 0) {
              notices_arr.forEach(element => {
                  notices.querySelector(".title-categoria").textContent = "Asopagua";
                  notices.querySelector(".title-noticia").textContent = element.titulo;
                  notices.querySelector(".notice-description").textContent = element.descripcion;
                  notices.querySelector(".notice-creator").textContent = element.publicador;
                  notices.querySelector(".continueReading").setAttribute("onclick",`leer(${element.id})`);
                  let url = notices.querySelector(".img-notice").getAttribute("data-url");
                  notices.querySelector(".img-notice").setAttribute('src', url + element.imagen);
                  const clone = notices.cloneNode(true);
                  fragment.appendChild(clone);
      
              });
              card_notice.appendChild(fragment);
          } else {
              printEmptyNotices();
          }
      }
      function printEmptyNotices() {
          $("#contentNotices").hide();
          let printData = `<div class="row">
      <div class="col-md-10 mx-auto">
          <div class="card">
              <div class="card-header bg-notice text-center p-4">
                  <h3 class="text-white">¡Actualmente, no existen noticias publicadas..!</h3>
              </div>
              <div class="card-body">
                  <h4>Estamos trabajando para brindarte información actualizada sobre nuestros productos y servicios. En esta sección podras encontrarte con noticias relacionadas con las ASOCIACIÓN ASOPAGUA.</br></br>
                  
                  Te mantendremos informado sobre el lanzamiento de nuevos productos, inclusión de nuevos distribuidores, actualización de los precios de nuestros productos, así como el trabajo que realiza nuestra Asociación para y con la comunidad.</h4>
              </div>
          </div>
      </div>
      </div>`;
          $("#contentNoticesEmpty").html(printData);
      }
    }  
});
function leer(id){
    let id_noticia = id;
    let selectNoticia = notices_arr.filter(noticia => noticia.id == id_noticia);
    $("#modalNoticiaTitle").html(selectNoticia[0].titulo);
    $("#creador").html(selectNoticia[0].publicador);
    $("#fecha_creacion").html(selectNoticia[0].fecha_creacion);
    $("#noticia_desarrollo").html(selectNoticia[0].desarrollo);
    $("#imgNoticia").attr('src','<?php echo URL;?>uploads/noticias/' + selectNoticia[0].imagen);
}
