<?php

$mail = new PHPMailerLite();

              $mail->CharSet = "utf-8";

              if ($mail_isHTML == 'true') {

              $mail->IsHTML(true);

              }

              else { 

              $mail->IsHTML(false);

              }

              $mail->SetFrom('no-reply@leadertechinc.com');

              $mail->FromName="LeaderTech INC";

              $mail->AddReplyTo("info@leadertechinc.com", "Info");

              $mail->AddAddress($mail_to);
              
              $mail->Subject = $mail_subject;

              if ($mail_isHTML == 'true') {

                $mail->MsgHTML($mail_htmlMessage);

                $mail->AltBody = $mail_textMessage;


              }

              else { 

                $mail->Body = $mail_textMessage;

              }

              

              try {
                
              if (!$mail->Send()) {
                  throw new Exception('Could not send email');
                }

              } catch (Exception $e) {
    
                die ('Email did not send ' . $e->getMessage());
              }

?>