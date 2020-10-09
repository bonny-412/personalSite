<?php
    //Recupero i valori inserti nella form
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $messaggio = $_POST['message'];

    $testo = "Nome: " . $nome . "\n"
        . "Email: " . $email . "\n"
        . "Tel: " . $tel . "\n"
        . "Messaggio: " . $messaggio;

    //Controllo campi
    if(!$nome || !$email || !$messaggio) {
        echo 'I campi contrassegnati con il simbolo * sono obbligatori!';
    }elseif(!preg_match('/^[A-Za-z \'-]+$/i', $nome)) {
        echo 'Il nome contiene caratteri non emmessi';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Indirizzo email non corretto';
    }else {
        //Uso la funzione php mail() per inviare i dati al mio indirizzo email
        if(mail('andrea.bonaiuti.97@gmail.com', $nome, $testo)){
            echo 'Grazie per avermi contatto, risponderò il prima possibile.';
        }else {
            echo "Si è verificato un errore durante l' invio dell' email riprovare più tardi. Grazie.";
        }
        
    }

?>