<?php
function sendMail($to, $subject, $body){
  $headers   = [];
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $headers[] = 'From: Torck do Brasil <contato@torckdobrasil.com.br>';
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  return wp_mail( $to, $subject, $body, $headers );
}
