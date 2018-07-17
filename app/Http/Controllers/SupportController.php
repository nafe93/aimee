<?php 
namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// <<<<<<< HEAD
use Laravel\Spark\Http\Controllers\Controller;
use Laravel\Spark\Spark;
use Mail;
use App\Http\Controllers\SendMailSmtpController;
// =======
// use Mail;
use View;
// use App\Http\Controllers\SendMailSmtpController;
// >>>>>>> origin/maks_2

class SupportController extends Controller 
{
	/**
	 * [sendEmailThruSmtp description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function sendEmailThruSmtp(Request $request)
    {
// <<<<<<< HEAD
		/*$mailSMTP = new SendMailSmtpController('support@getaimee.com', 'supportsergei', 'smtp.zoho.eu', 'Evgeniy'); // создаем экземпляр класса
		// $mailSMTP = new SendMailSmtpClass('логин', 'пароль', 'хост', 'имя отправителя');
		 
		// заголовок письма
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
		$headers .= "From: Evgeniy <support@getaimee.com>\r\n"; // от кого письмо
		$result =  $mailSMTP->send('support@getaimee.com', 'Тема письма', 'Текст письма', $headers); // отправляем письмо
		// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Заголовки письма');
		if($result === true){
		    $result2 = "Письмо успешно отправлено";
		}else{
		    $result2 = "Письмо не отправлено. Ошибка: " . $result;
		}

        return response()->json(['message' => $result2]);*/
// =======
		// Configuration
        $smtpAddress 	= 'smtp.zoho.com';
        $port		 	= 465;
        $encryption 	= 'ssl';
        $yourEmail 		= 'support@getaimee.com';
        $yourPassword 	= 'supportsergei';

        // Prepare transport
        // $transport = \Swift_SmtpTransport::newInstance(env('MAIL_HOST'), env('MAIL_PORT'), env('MAIL_ENCRYPTION'))
        $transport = \Swift_SmtpTransport::newInstance($smtpAddress, $port, $encryption)
                ->setUsername($yourEmail)
                ->setPassword($yourPassword);
        $mailer = \Swift_Mailer::newInstance($transport);

        // Prepare content 
        $view = View::make('/some_email', [
        	'message' => 'Message',
        	// 'title' 	=> '<h3>'. $request->subject .'</h3>',
            // 'message' 	=> '<p>'. $request->message .'</p>'
        ]);

        $html = $view->render();
        
        // Send email
        $message = \Swift_Message::newInstance('Message from ')
             ->setFrom(["support@getaimee.com" => "support@getaimee.com"])
             ->setTo(["rainy_dream@mail.ru" => "rainy_dream@mail.ru"])
             // If you want plain text instead, remove the second paramter of setBody
             ->setBody($html, 'text/html');
             
        if($mailer->send($message)){
	        return response()->json(['message' => 'sended']);
        }
        return response()->json(['message' => 'not_sended']);


		/*$data = array('name'=>"support@getaimee.com");
        // Path or name to the blade template to be rendered
        $template_path = 'email_template';

        Mail::send($template_path, $data, function($message) {
            $message->to('anyemail@emails.com', 'Maks')->subject('Laravel HTML Mail');
            // Set the sender
            $message->from('support@getaimee.com');
        });*/


// >>>>>>> origin/maks_2
        
    }
}