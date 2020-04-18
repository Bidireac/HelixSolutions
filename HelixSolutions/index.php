<?php
// Message Vars
$msg = '';
$passed = '';

// Check For Submit
if(filter_has_var(INPUT_POST, 'submit')){
    // Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check Required Fields
    if(!empty($email) && !empty($name) && !empty($message)){
        // Passed
        // Check Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            // Failed
            $msg = "Mailul nu este valid";
        } else {
            // Passed
            $toEmail = 'contact@helixsolutions.ro';
            $subject = 'Contact Request From '.$name;
            $body = '<h2>Contact Request</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Message</h4><p>'.$message.'</p>
            ';

            // Email Headers
            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

            // Additional Headers
            $headers .= "From: " .$name. "<".$email.">". "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
                // Email Sent
                $msg = 'Mailul a fost trimis';
            } else {
                // Failed
                $passed = 'Mailul nu a fost trimis';
            }
        }
    } else {
        // Failed
        $msg = 'Vă rugăm completați totul';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Poți face cu noi primul pas către expunerea afacerii tale in mediul digital.">
    <meta name="keywords" content="web development, ecommerce, app development, mobile development, programming, ecommerce website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/03daa76610.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./mobile.css">
    <title>HelixSolutions</title>
</head>

<body>
<div id="canvas">
    <header class="canvas">
        <!-- Navigation bar -->
        <nav id="navy">
            <h3 id="logo">Site-ul tău este portalul către afacerea ta.</h3>
            <div class="buton">
            <div class="icon-btn">
                <div class="paper"><i class="far fa-paper-plane"></i></div>
                <div class="btn-txt"><a href="#about">Despre</a></div>
                <div class="btn-txt"><a href="#contact">Contact</a></div>
                <div class="btn-txt plane"><i class="far fa-paper-plane"></i></div>
            </div>
            </div>
        </nav>
        <!-- Home display -->
        <section>
            <div class="showcase">
                <div class="img-home">
                <img src="./img/home.svg">
                </div>
                <h1 class="headline">HelixSolutions</h1>
            </div>
        </section>
        <div class="slider"></div>
    </header>
        <!-- About us -->
        <div id="about" class="canvas">
    <section>  
        <div class="img-about">
            <img src="./img/about.svg">
            <div class="grid-icons">
                <div class="PrestaShop left-icons">
                    <div class="icon"><a href="https://www.prestashop.com/en" target="_blank"><img src="logos/prestashop.png"></a></div>
                </div>
                <div class="WordPress left-icons">
                        <div class="icon"><a href="https://ro.wordpress.com/" target="_blank"><img src="logos/wordpress.png"></a></div>
                    </div>
                <div class="Flutter left-icons">
                    <div class="icon"><a href="https://flutter.dev/" target="_blank"><img src="logos/flutter.png"></a></div>
                </div>
                <div class="Codeigniter right-icons">
                    <div class="icon"><a href="https://codeigniter.com/" target="_blank"><img src="logos/codeigniter.png"></a></div>
                </div>
                <div class="Magento right-icons">
                    <div class="icon"><a href="https://magento.com/" target="_blank"><img src="logos/magento.png"></a></div>
                </div>
                <div class="Laravel right-icons">
                        <div class="icon"><a href="https://laravel.com/" target="_blank"><img src="logos/laravel.png"></a></div>
                    </div>
                <div class="text-wraper">
                <div class="about-text">
                        <p>Lucrăm cu toate platformele mari în domeniu, așa că poți alege liniștit ce iți place, iar de restul ne ocupăm noi.</p>
                </div>
                </div>
            </div>
            </div>
    </section>
        </div>
        <!-- Contact form -->
        <div id="contact" class="canvas">
    <section>
        <div class="img-contact">
        <div class="contact-container">   
        <div class="contact-text">
                <div class="contact-wraper">
            <p>Construiește imaginea afacerii tale chiar acum.</p>
                </div>
                <div id="errordiv">
                <?php if($msg != ''): ?>
                    <div id="failed"><?php echo $msg; ?></div>
                <?php endif; ?> 
                <?php if($passed != ''): ?>
                    <div id="passed"><?php echo $passed; ?></div>
                <?php endif; ?> 
                </div>
        <div class="click">
            <button id="contact-us" onclick="myFunction()">
                <span><i class="fas fa-envelope"></i></span>
            </button>
        </div>
        </div>
        <div class="maincontainer">
            <div class="thecard">
            <div class="thefront"><img src="img/contact.svg"></div>
            <div class="theback">
                <div class="container">	
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>#contact">
                        <div class="form-group">
                            <label>Nume :</label>
                            <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Mail :</label>
                            <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Mesaj :</label>
                            <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="submit-button">Trimite</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </section>
        <!-- Footer -->
    <footer id="footer">
        <div class="footer-text">
            <p>Built with love.</p> 
            <p>All Rights Reserved.</p>
        </div>
        <div class="footer-top">
        <button id="scroll">
            <span><a href="#canvas" target="_blank"><i class="far fa-paper-plane"></i></a></span>
        </button>
        </div>
        <div class="footer-contact">
            <p class="phone"><i class="fas fa-phone-square-alt"></i> 0770561315</p>
            <p>Copyright &copy; <?php echo date("Y"); ?>, Helix Solutions.</p>
        </div>
        </footer>
    </div>
</div>
    
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>

<script src="app.js"></script>

</body>
</html>