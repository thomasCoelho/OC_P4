<?php $this->titre = "Contact"; ?>

<section id="section-contact">
  <h1 id="title-contact">CONTACT</h1>
  <p id="confirm-contact-send"><?php echo $contactStatus['message'] ?></p>

  <form id="form-contact" method="post" action="index.php?action=ContactTreatment">

    <div id="div-email-name-contact">
      <div id="div-email-contact">
        <div id="div-icone-email-contact">
          <i id="icone-email-contact" class="far fa-envelope"></i>
        </div>
        <input type="email" name="email-contact" id="input-email-contact" placeholder=" Votre E-mail" required>
      </div>
      <div id="div-name-contact">
        <div id="div-icone-name-contact">
          <i id="icone-name-contact" class="fas fa-user"></i>
        </div>
        <input type="text" name="name-contact" id="input-name-contact" placeholder=" Votre prénom"  required>
      </div>
    </div>

    <div id="div-subject-contact">
      <div id="div-icone-subject-contact">
        <i class="far fa-comment" id="icone-subject-contact"></i>
      </div>
      <input type="text" name="subject-contact" id="input-subject-contact" placeholder=" Objet" required>
    </div>
    <textarea id="textarea-contact" name="message-contact" required></textarea>
    <input type="checkbox" id="checkbox-contact" name="checkbox-contact">
    <label for="checkbox-contact" id="checkbox-label">Valider ces informations ?</label>
    <input type="submit" id="submit-contact" disabled>
  </form>

</section>
