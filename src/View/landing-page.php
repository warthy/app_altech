<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> ALTHEC CORP </title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="/css/landing.css"
  </head>
  <body>

  <!-- Modal section -->
  <div id="modal">
      <div id="popup">
          <div id="close" onClick="document.getElementById('modal').style.display='none'"> + </div>
          <img class="logo_modal" src="/img/logo.jpg" alt="Logo_page"/>
          <h1 id="loginHeading"> Connectez-vous </h1>
          <form action="/login" method="post">
              <input type="text" name="email" class="modal_email" placeholder="Adresse email">
              <input type="password" name="password" class="modal_pas" placeholder="Mot de passe">
              <button class="submit"> Connexion </button>
          </form>
          <a href="/password-recover" class="forget_mdp">Forgot password </a>
      </div>
  </div>

  <!-- Menu bar -->
  <div class="menu_bar">
      <img class="logo" src="/img/logo.jpg" alt="Logo_page"/>
      <ul class="nav_links">
          <li><a href="#équipe">Notre équipe</a></li>
          <li><a href="#service">Notre service</a></li>
          <li><a href="#contacter">Nous contacter</a></li>
      </ul>
      <button class="button" id="login" onClick="document.getElementById('modal').style.display='flex'">
          Accès Client
      </button>
  </div>

  <!-- Content -->
  <div class="landing">
      <img class="img_landing" src="/img/launch.jpg" alt="Landing_page"/>
      <p class="text">La Révolution des Systèmes Psycotechniques</p>
  </div>
  <div id="service">
      <div class="data">
          <h1 class="data_title">Donner du sens aux données</h1>
          <div class="data_links">
              <p class="data_text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec urna commodo, gravida tellus sit amet, lobortis est. Morbi pellentesque purus ligula, et dapibus metus commodo sed. Integer tincidunt fringilla neque ac hendrerit. Etiam sollicitudin, quam in fermentum dapibus, lorem leo rhoncus tortor, ac sollicitudin ligula dolor eu nisi. Aliquam nec sem interdum, elementum nibh ut, vulputate est. Integer libero sapien, eleifend vel rhoncus.
              </p>
              <img class="data_img" src="/img/data_img.svg" alt="data_image"/>
          </div>
      </div>
      <hr>
      <div class="ticket">
          <h1 class="ticket_title">Système de ticket</h1>
          <div class="ticket_links">
              <img class="ticket_img" src="/img/ticket_img.svg" alt="ticket_image"/>
              <p class="ticket_text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec urna commodo, gravida tellus sit amet, lobortis est. Morbi pellentesque purus ligula, et dapibus metus commodo sed. Integer tincidunt fringilla neque ac hendrerit. Etiam sollicitudin, quam in fermentum dapibus, lorem leo rhoncus tortor, ac sollicitudin ligula dolor eu nisi. Aliquam nec sem interdum, elementum nibh ut, vulputate est. Integer libero sapien, eleifend vel rhoncus.
              </p>
          </div>
      </div>
      <hr>
      <div class="inter">
          <h1 class="inter_title">Une interface ergonomique</h1>
          <div class="inter_links">
              <p class="inter_text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec urna commodo, gravida tellus sit amet, lobortis est. Morbi pellentesque purus ligula, et dapibus metus commodo sed. Integer tincidunt fringilla neque ac hendrerit. Etiam sollicitudin, quam in fermentum dapibus, lorem leo rhoncus tortor, ac sollicitudin ligula dolor eu nisi. Aliquam nec sem interdum, elementum nibh ut, vulputate est. Integer libero sapien, eleifend vel rhoncus.
              </p>
              <img class="inter_img" src="/img/inter_img.svg" alt="interface_image"/>
          </div>
      </div>
      <hr>
  </div>

  <!-- Contact section -->
  <div id="contacter">
      <div class="contact_section">
          <div class="inner-width">
              <h1> Nous Contacter</h1>
              <input type="text" class="name" placeholder="Nom de la société">
              <input type="email" class="email" placeholder="Adresse Mail">
              <textarea rows="1" class="message" placeholder="Message"></textarea>
              <button>Envoyer</button>
          </div>
      </div>
  </div>
  <hr>
  <script>
      document.addEventListener('onload', () => {
          var open = document.getElementById('login');
          var close = document.getElementById('close');

          open.addEventListener('click', () => popUp.style.display = 'flex');
          close.addEventListener('click', () => popUp.style.display = 'none');
      });
  </script>
  </body>
</html>
