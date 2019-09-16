<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

    //if we want to send via SMTP

    $mail->addAddress('etelvino@vinostour4fun.com');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Your email has been sent, thank you!";
    else
        $msg = "Please try again!";

    unlink($file);
  }
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Google verification - Indixing website-->
  <title>VinosTour4Fun</title>
  <link href="css/fa-light.min.css" rel="stylesheet" />
  <link href="css/fontawesome-all.min.css" rel="stylesheet" />
  <link href="css/fontawesome-all.css" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body id="home">
  <header>
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="contacts_email_cell"><i class="fas fa-envelope"></i> etelvino@vinostour4fun.com</span>
            <span class="contacts_email_cell"><i class="fas fa-phone"></i> +258 84 xxx xxxx</span>
          </div>
          <div class="col-md-6 text-right">
            <ul class="list-unstyled social">
              <li><a href="https://www.linkedin.com/company/sbmozmedia/" target="_blank"> <i class="fab fa-linkedin-in"></i></a>
              </li>
              <li><a href="https://www.instagram.com/sbmozmedia/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a href="https://web.facebook.com/SBmozmedia-1213522845455533/" target="_blank"><i
                    class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/sbmozmedia" target="_blank"><i class="fab fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h4 class="logo"><span class="blue">Vino's</span><span class="yellow">Tour</span><span class="orange">4Fun</span></h4></a>
        <button class="navbar-toggler compressed" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parque_mucapana.html">roteiro - Parque Mucapana Gagnaux</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="katembe.html">roteiro - Katembe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sendemail.php">contactos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="parque_mucapana">
            <div class="container">
                <h1 class="title_hero">fale conosco</h1>
            </div>
        </div>
  </header>
      
      <!--contact form-->
      <section class="contactForm section-space justify-content-center">
        <div class="container ">
          <div class="row alighn align-items-center">
            <div class="col-md-6">
              <h2 class="vinos_contact">Vino'sTour4Fun</h2>
              <p>Tours de veículo privativo por Chicago e seus locais famosos, e também pelos não tão famosos, com guias especializados que moram na cidade e falam português. No momento da reserva, nós pediremos o endereço do seu hotel para que possamos buscá-lo para começar o seu tour.</p>
              <ul class="list_unstyled contact_list">
                <li><i class="fas fa-phone"></i> <span class="bold">Telefone:</span>+258 84xxx xxx</li>
                <li><i class="fab fa-whatsapp-square"></i> <span class="bold">WhatsApp:</span>+258 84xxx xxx</li>
                <li><i class="fas fa-envelope"></i> <span class="bold">Email:</span>+258 84xxx xxx</li>
              </ul>
            </div>
            <div class="col-md-6">

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <div class="contact_form">
                <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Nome Completo..."><br>
                <input class="form-control" name="subject" placeholder="Assunto..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Mensagem..." class="form-control" name="Message..."></textarea><br>
                <input id="sendBtn" class="btn btn_button" name="submit" type="submit" value="Enviar Email">
              </form>
              </div>
            </div>
          </div>
            </div>
        </div>
      </section>
       <!--call to action two--->
       <section class="vantagens section_space text-center justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page_title">
            <h2>nossas vantagens</h2>
          </div>
        </div>
      </div>
      <div class="vantagem_content">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="vanta_img">
              <img src="img/vanta-img.png" class="mx-auto d-block" alt="vantagens">
            </div>
          </div>
          <div class="col-md-6">
            <div class="vanta_content">
              <ul class="vanta_list list-unstyled">
                <li><i class="fas fa-check"></i> A paz de não ter de se preocupar com o seu roteiro de final de semana</li>
                <li><i class="fas fa-check"></i> Equipe altamente preparada e organizada para lhe proporcionar o melhor conforto e experiência</li>
                  <li><i class="fas fa-check"></i> Nós nos preocupamos com a sua segurança, por isso não nos deslocamos sem ter a certeza que temos todas as condições necessarias para que o programa decorra sem nehum incidente</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footer text-center">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <ul class="list_unstyled social_bottom">
            <li><a href="https://www.linkedin.com/company/sbmozmedia/" target="_blank"> <i class="fab fa-linkedin-in"></i></a>
            </li>
            <li><a href="https://www.instagram.com/sbmozmedia/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://web.facebook.com/SBmozmedia-1213522845455533/" target="_blank"><i
                  class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/sbmozmedia" target="_blank"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <span class="footer_contact"><i class="far fa-envelope"></i> etelvino@vinostour4fun.com</span>
          <span><i class="fas fa-phone"></i> +258 84 xxx xxxx</span>
        </div>
        <div class="col-md-4">
          <span>&copy; 2019 VinosTour4Fun | Desenvolvido por <a href="https://www.sbmozmedia.com/" target="_black" class="sb">SB-MOZMEDIA</a></span>
        </div>
      </div>
    </div>
  </section>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/main.js"></script> 
    
    
    
  </body>
</html>
