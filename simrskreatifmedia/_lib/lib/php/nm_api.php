<?php

    function nm_get_api_gateways($api = '')
    {
        $arr_apis = ['email'=>[], 'sms' =>[], 'payment' => []];



        $arr_apis['email']['smtp'] = [
            'smtp_server' => ['placeholder' => 'smtp.example.com'],
            'smtp_port' => ['placeholder' => '465', 'type' => 'number'],
            'smtp_user' => ['placeholder' => 'default@example.com'],
            'smtp_password' => ['placeholder' => '********', 'type' => 'password'],
            'smtp_protocol' => ['options' => ['','SSL', 'TLS'], 'type' => 'select'],
            'from_email' => ['placeholder' => 'default@example.com'],
            'from_name' => ['placeholder' => 'default'],
        ];


        $arr_apis['email']['mandrill'] = [
            'api_key' => ['placeholder' => 'Your API'],
            'from_email' => ['placeholder' => 'default@example.com'],
            'from_name' => ['placeholder' => 'default'],
        ];


        $arr_apis['email']['SES'] = [
            'api_key' => ['placeholder' => 'Your Key API'],
            'api_secret' => ['placeholder' => 'Your Secret API'],
            'region' => ['placeholder' => 'Region'],
            'from_email' => ['placeholder' => 'default@example.com'],
            'from_name' => ['placeholder' => 'default'],
        ];


        $arr_apis['sms']['twilio'] = [
            'auth_id' => ['placeholder' => 'Your Auth ID'],
            'auth_token' => ['placeholder' => 'Your Auth Token'],
            'from' => ['placeholder' => 'Default number to send SMS'],
        ];

        $arr_apis['sms']['plivo'] = [
            'auth_id' => ['placeholder' => 'Your Auth ID'],
            'auth_token' => ['placeholder' => 'Your Auth Token'],
            'from' => ['placeholder' => 'Default number to send SMS'],
        ];

        $arr_apis['sms']['clickatell'] = [
            'auth_token' => ['placeholder' => 'Your Auth Token'],
        ];

        $arr_apis['payment']['pagseguro'] = [
            'environment' => ['placeholder' => 'Sandbox or Production'],
            'auth_email' => ['placeholder' => 'Email to auth in API'],
            'auth_token' => ['placeholder' => 'Your Auth token'],
            'charset' => ['options' => ['UTF-8','ISO-8859-1'], 'type' => 'select'],
            'auth_appId' => ['placeholder' => 'AppID to connect in pagseguro by app'],
            'auth_appKey' => ['placeholder' => 'AppKey to connect in pagseguro by app'],
        ];

        $arr_apis['payment']['paypal_express'] = [
            'username' => ['placeholder' => 'Username'],
            'password' => ['placeholder' => 'Password'],
            'signature' => ['placeholder' => 'Signature'],
            'testMode' => ['options' => ['FALSE','TRUE'], 'type' => 'select'],
        ];

        $arr_apis['payment']['paypal_express_incontext'] = [
            'username' => ['placeholder' => 'Username'],
            'password' => ['placeholder' => 'Password'],
            'signature' => ['placeholder' => 'Signature'],
            'testMode' => ['options' => ['FALSE','TRUE'], 'type' => 'select'],
        ];

        $arr_apis['payment']['paypal_pro'] = [
            'username' => ['placeholder' => 'Username'],
            'password' => ['placeholder' => 'Password'],
            'signature' => ['placeholder' => 'Signature'],
            'testMode' => ['options' => ['FALSE','TRUE'], 'type' => 'select'],
        ];

        $arr_apis['payment']['paypal_rest'] = [
            'clientId' => ['placeholder' => 'Your Auth ClientId'],
            'secret' => ['placeholder' => 'Your Auth Secret'],
            'token' => ['placeholder' => 'Your Auth token'],
            'testMode' => ['options' => ['FALSE','TRUE'], 'type' => 'select'],
        ];
/*
        $arr_apis['whatsapp']['waboxapp'] = [
            'token' => ['placeholder' => 'Your token'],
            'uid' => ['placeholder' => 'Your UID'],
            'testMode' => ['options' => ['FALSE','TRUE'], 'type' => 'select'],
        ];*/

        $arr_apis['whatsapp']['chatapi'] = [
            'url' => ['placeholder' => 'Your Url'],
            'token' => ['placeholder' => 'Your token'],
        ];

        if(!empty($api))
            return $arr_apis[$api];

        return $arr_apis;
    }


function nm_load_profile($profile)
{
    $file = nm_get_prod_path() . "../conf/profile_api.conf.php";

    if(!file_exists($file)) {
        $file = __DIR__."/../../profile_api.conf.php";
    }

    if(!file_exists($file)) {
        return false;
    }

    $str_content = strtr(file_get_contents( $file ), array("<?php" => '', "?>" => ''));
    $arr_content = unserialize(trim($str_content));
    if(isset($arr_content[ $profile ]))
    {
        return $arr_content[ $profile ];
    }
    else{
        $ret = explode("__NM__", $profile);
        $profile = isset($ret[1]) ? $ret[1] : $ret[0];
        if(isset($arr_content[ $profile ]))
        {
            return $arr_content[ $profile ];
        }
        else{
            foreach(['sys','grp','usr'] as $mod)
            {
                if(isset($arr_content[ $mod . '__NM__'. $profile ])) {
                    return $arr_content[ $mod . '__NM__'. $profile ];
                }
            }
        }
    }
    return (isset($arr_content[ $profile ]) ? $arr_content[ $profile ] : false);
}
use Aws\Ses\SesClient;
use Plivo\RestClient;
use Twilio\Rest\Client;
use Clickatell\Rest;
use Clickatell\ClickatellException;
use Omnipay\Omnipay;

function sc_call_api($profile, $arr_settings = [])
{

    if(!empty($profile)) {
        $arr_settings = nm_load_profile($profile);
        if ($arr_settings == false) {
            return false;
        }
    }
    if(!isset($arr_settings['settings']) && isset($arr_settings['gateway']) )
    {
        $arr_settings['settings'] = $arr_settings;
    }


    $prod_path = nm_get_prod_path();

    if(isset($arr_settings['gateway']))
    {
        $arr_settings['settings']['gateway'] = $arr_settings['gateway'];
    }

    switch(strtolower($arr_settings['settings']['gateway']))
    {
        case 'mandrill':
            include_once($prod_path."/third/mandrill/src/Mandrill.php");
            return new Mandrill($arr_settings['settings']['api_key']);
            break;

        case 'ses':
            include_once($prod_path."/third/aws.phar");

            return SesClient::factory(array(
                'version'=> 'latest',
                'region' => $arr_settings['settings']['region'],
                'credentials' => array(
                    'key'    => $arr_settings['settings']['api_key'],
                    'secret' => $arr_settings['settings']['api_secret'],
                )
            ));

            break;


        case 'smtp':
            include_once($prod_path."/third/swift/swift_required.php");
            $transport = (new Swift_SmtpTransport($arr_settings['settings']['smtp_server'], $arr_settings['settings']['smtp_port']))
                ->setUsername($arr_settings['settings']['smtp_user'])
                ->setPassword($arr_settings['settings']['smtp_password'])
            ;
            $protocol = null;
            if(isset($arr_settings['settings']['smtp_protocol']))
            {
                $protocol = $arr_settings['settings']['smtp_protocol'];
            }
            else
            {
                switch(strtolower($arr_settings['settings']['smtp_port']))
                {
                    default:
                    case 25:
                        $protocol = null;
                        break;
                    case 465:
                        $protocol = 'ssl';
                        break;
                    case 587:
                        $protocol = 'tls';
                        break;
                }
            }
            $transport->setEncryption(strtolower($protocol));
            return new Swift_Mailer($transport);
            break;


        case 'plivo':
            include_once($prod_path . "/third/plivo/plivo.php");
            return new RestClient($arr_settings['settings']['auth_id'], $arr_settings['settings']['auth_token']);
            break;
        case 'twilio':
            include_once($prod_path . "/third/twilio/autoload.php");

            return new Client($arr_settings['settings']['auth_id'], $arr_settings['settings']['auth_token']);

            break;
        case 'clickatell':
            include_once($prod_path . "/third/clickatell/src/Rest.php");
            return new \Clickatell\Rest($arr_settings['settings']['auth_token']);
            break;

        case 'pagseguro':
            include_once($prod_path . "/third/pagseguro/autoload.php");
            \PagSeguro\Library::initialize();
            \PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
            \PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

            \PagSeguro\Configuration\Configure::setEnvironment($arr_settings['settings']['environment']);//production or sandbox
            if(!isset($arr_settings['settings']['auth_email']) && isset($arr_settings['settings']['auth_appId']))
            {
                \PagSeguro\Configuration\Configure::setApplicationCredentials(
                    $arr_settings['settings']['auth_appId'],
                    $arr_settings['settings']['auth_appKey']
                );
            }
            else {
                \PagSeguro\Configuration\Configure::setAccountCredentials(
                    $arr_settings['settings']['auth_email'],
                    $arr_settings['settings']['auth_token']
                );
            }
            if(!isset($arr_settings['settings']['charset']) || empty($arr_settings['settings']['charset'])) {
                $arr_settings['settings']['charset'] = 'UTF-8';
            }
            \PagSeguro\Configuration\Configure::setCharset($arr_settings['settings']['charset']);// UTF-8 or ISO-8859-1

            break;
        case 'paypal_express':
        case 'paypal_express_incontext':
        case 'paypal_pro':


            switch (strtolower($arr_settings['settings']['gateway']))
            {
                case 'paypal_express':
                    $gw = "PayPal_Express";
                    break;
                case 'paypal_express_incontext':
                    $gw = "PayPal_ExpressInContext";
                    break;
                case 'paypal_pro':
                    $gw = "PayPal_Pro";
                    break;
            }
            include_once($prod_path . "/third/omnipay/vendor/autoload.php");

            $gateway = Omnipay::create($gw);


            $instance = $gateway->initialize([
                'username' => $arr_settings['settings']['username'],
                'password' => $arr_settings['settings']['password'],
                'signature' => $arr_settings['settings']['signature'],
                'testMode' => isset($arr_settings['settings']['testMode']) ? $arr_settings['settings']['testMode'] : false,
            ]);

            return $instance;

            break;
        case 'paypal_rest':

            include_once($prod_path . "/third/omnipay/vendor/autoload.php");
            $gateway = Omnipay::create('PayPal_Rest');

            $instance = $gateway->initialize([
                'clientId' => $arr_settings['settings']['clientId'],
                'secret' => $arr_settings['settings']['secret'],
                'token' => $arr_settings['settings']['token'],
                'testMode' => isset($arr_settings['settings']['testMode']) ? $arr_settings['settings']['testMode'] : false,
            ]);

            return $instance;
        case 'waboxapp':
            break;
        case 'chatapi':
            include_once($prod_path . "/third/chatapi/autoload.php");

            $instance = chatapi\WhatsApp\Client::getInstance([
                'url' => trim($arr_settings['settings']['url']),
                'token' => $arr_settings['settings']['token']
            ]);
            return $instance;
            break;


    }

}

function sc_send_sms($arr_settings)
{
    if(isset($arr_settings['profile']) && !empty($arr_settings['profile'])) {
        $instance = sc_call_api($arr_settings['profile']);
        if($instance == false)
        {
            return false;
        }
        $arr_profile = nm_load_profile($arr_settings['profile']);


        $arr_profile['settings']['gateway'] = $arr_profile['gateway'];
        if(!isset($arr_settings['settings']))
        {
            $arr_settings['settings'] = [];
        }
        $arr_set = array_merge($arr_settings['settings'], $arr_profile['settings']);
        $arr_sms = array_merge($arr_settings['message'], $arr_profile['settings']);
    }else{
        $instance = sc_call_api('', $arr_settings);
        $arr_sms = array_merge($arr_settings['message'], $arr_settings['settings']);
        $arr_set = $arr_settings['settings'];
    }

    switch(strtolower($arr_set['gateway'])) {
        case 'plivo':
            return $instance->messages->create(
                $arr_sms['from'],
                !is_array($arr_sms['to']) ? [$arr_sms['to']] : $arr_sms['to'],
                $arr_sms['message']
            );
            break;
        case 'twilio':
            return $instance->messages->create(
                substr($arr_sms['to'],0,1) == '+' ? $arr_sms['to'] : '+'. $arr_sms['to'],
                [
                    'from' => substr($arr_sms['from'],0,1) == '+' ? $arr_sms['from'] : '+'. $arr_sms['from'],
                    'body' => $arr_sms['message']
                ]
            );
        case 'clickatell':

            return $instance->sendMessage([
                'to' => !is_array($arr_sms['to']) ? [$arr_sms['to']] : $arr_sms['to'],
                'content' => $arr_sms['message']
            ]);
            break;
    }


}

function sc_send_whatsapp($arr_settings)
{
    if (isset($arr_settings['profile']) && !empty($arr_settings['profile'])) {
        $instance = sc_call_api($arr_settings['profile']);
        if ($instance == false) {
            return false;
        }
        $arr_profile = nm_load_profile($arr_settings['profile']);


        $arr_profile['settings']['gateway'] = $arr_profile['gateway'];
        if (!isset($arr_settings['settings'])) {
            $arr_settings['settings'] = [];
        }

        $arr_set = array_merge($arr_settings['settings'], $arr_profile['settings']);

    } else {
        $instance = sc_call_api('', $arr_settings);
        $arr_set = $arr_settings['settings'];
    }
    return $instance->sendMessage([
        'phone' => $arr_settings['to'],
        'body' => $arr_settings['message']
    ]);

}

function sc_send_mail_api($arr_settings)
{
    if(isset($arr_settings['profile']) && !empty($arr_settings['profile'])) {
        $instance = sc_call_api($arr_settings['profile']);
        if($instance == false)
        {
            return false;
        }
        $arr_profile = nm_load_profile($arr_settings['profile']);


        $arr_profile['settings']['gateway'] = $arr_profile['gateway'];
        if(!isset($arr_settings['settings']))
        {
            $arr_settings['settings'] = [];
        }
        $arr_set = array_merge($arr_settings['settings'], $arr_profile['settings']);
        $arr_mail = array_merge($arr_settings['message'], $arr_profile['settings']);
    }
    else{
        $instance = sc_call_api('', $arr_settings);
        $arr_mail = array_merge($arr_settings['message'], $arr_settings['settings']);
        $arr_set = $arr_settings['settings'];
    }

    switch(strtolower($arr_set['gateway'])) {
        case 'mandrill':
            if(isset($arr_mail['attachments'])) {
                $_arr = [];

                foreach ($arr_mail['attachments'] as $att) {
                    $_arr[] = array(
                        'type' => mime_content_type($att),
                        'name' => basename($att),
                        'content' => base64_encode(file_get_contents($att))
                    );
                }
                $arr_mail['attachments'] = $_arr;
            }
            if(!is_array($arr_mail['to']))
            {
                $arr_mail['to'] = [ ['email' => $arr_mail['to']] ];
            }

            $result = $instance->messages->send($arr_mail, false, 'Main Pool', date("Y-m-d H:i:s"));
            break;

        case 'ses':

            $arr_message = ['Source' => $arr_mail['from_email']];
            if(isset($arr_mail['to']) && is_array($arr_mail['to']))
            {

                $arr_to = array();
                $arr_cc = array();
                $arr_bcc = array();
                foreach($arr_mail['to'] as $rec)
                {
                    if(!is_array($rec))
                    {
                        $rec_bkp = $rec;
                        $rec = ['email' => $rec_bkp, 'name' => '', 'type'=> 'to'];
                    }
                    $rec['name'] = (!isset($rec['name']))? '' : $rec['name'];
                    $rec['type'] = (!isset($rec['type']))? 'to' : $rec['type'];
                    switch($rec['type'])
                    {
                        default:
                        case 'to':
                            $arr_to[ $rec['email'] ] = $rec['name'];
                            break;
                        case 'cc':
                            $arr_cc[ $rec['email'] ] = $rec['name'];
                            break;
                        case 'bcc':
                            $arr_bcc[ $rec['email'] ] = $rec['name'];
                            break;
                    }
                }
                if(!isset($arr_message['Destination']) || !is_array($arr_message['Destination']))
                {
                    $arr_message['Destination'] = [];
                }
                if(count($arr_to) > 0) {
                    $arr_message['Destination']['ToAddresses'] = array_keys($arr_to);
                }
                if(count($arr_cc) > 0) {
                    $arr_message['Destination']['CcAddresses'] = array_keys($arr_cc);
                }
                if(count($arr_bcc) > 0) {
                    $arr_message['Destination']['BccAddresses'] = array_keys($arr_bcc);
                }

            }

            else if(!is_array($arr_mail['to']))
            {
                $arr_message['Destination']['ToAddresses'] = [$arr_mail['to']];
            }
            $arr_message['Message']['Subject']['Data'] = $arr_mail['subject'];
            $arr_message['Message']['Body']['Text']['Data'] = $arr_mail['text'];
            $arr_message['Message']['Body']['Html']['Data'] = $arr_mail['html'];
            if(isset($arr_mail['Reply-To'])) {
                $arr_message['ReplyToAddresses'] = $arr_mail['Reply-To'];
            }



            if(isset($arr_mail['attachments'])) {
                include( nm_get_prod_path(). '/third/Mail/mime.php');


                $mail_mime = new Mail_mime(array("eol" => "\n"));
                $mail_mime->setTxtBody($arr_mail['text']);
                $mail_mime->setHTMLBody($arr_mail['html']);

                foreach ($arr_mail['attachments'] as $att) {
                    $mail_mime->addAttachment($att, mime_content_type($att));
                }
                $mime_params = array(
                    'text_encoding' => '7bit',
                    'text_charset'  => 'UTF-8',
                    'html_charset'  => 'UTF-8',
                    'head_charset'  => 'UTF-8'
                );

                $body = $mail_mime->get($mime_params);
                $headers = $mail_mime->txtHeaders([
                    'From' => $arr_mail['from_email'],
                    'Subject' => $arr_mail['subject'],
                    'Content-Type' => 'text/html; charset=UTF-8',
                ]);
                $message = $headers . "\r\n" . $body;
                $arr_message['RawMessage'] = [
                    'Data' => $message
                ];
                unset($arr_message['Message']);

                $arr_message['Destinations'] = $arr_message['Destination'];
                $arr_message['Destinations'] = [];
                $arr_message['Destinations']['ToAddresses'] = implode(';', ($arr_message['Destination']['ToAddresses']));
                if(isset($arr_message['Destination']['CcAddresses']) && count($arr_message['Destination']['CcAddresses']) > 0) {
                    $arr_message['Destinations']['CcAddresses'] = implode(';', ($arr_message['Destination']['CcAddresses']));
                }
                if(isset($arr_message['Destination']['BccAddresses']) && count($arr_message['Destination']['BccAddresses']) > 0) {
                    $arr_message['Destinations']['BccAddresses'] = implode(';', ($arr_message['Destination']['BccAddresses']));
                }
                unset($arr_message['Destination']);

                $result = $instance->sendRawEmail($arr_message);

            }
            else {
                $result = $instance->sendEmail($arr_message);
            }
            break;

        case 'smtp':
            $message = (new Swift_Message($arr_mail['subject']))
                ->setFrom([$arr_mail['from_email'] => $arr_mail['from_name']])
                ->setBody($arr_mail['text']);
            if(isset($arr_mail['html']))
            {
                $message->addPart($arr_mail['html'], 'text/html');
            }
            if(isset($arr_mail['attachments']))
            {
                foreach($arr_mail['attachments'] as $att)
                {
                    $message->attach(Swift_Attachment::fromPath($att));
                }
            }

            if(isset($arr_mail['to']))
            {

                if(!is_array($arr_mail['to']))
                {
                    $arr_mail['to'] = [ ['email' => $arr_mail['to'], 'type' => 'to'] ];
                }
                $arr_to = array();
                $arr_cc = array();
                $arr_bcc = array();
                foreach($arr_mail['to'] as $rec)
                {
                    $rec['name'] = (!isset($rec['name']))? '' : $rec['name'];
                    $rec['type'] = !isset($rec['type']) ? 'to' : $rec['type'];
                    switch($rec['type'])
                    {
                        default:
                        case 'to':
                            $arr_to[ $rec['email'] ] = $rec['name'];
                            break;
                        case 'cc':
                            $arr_cc[ $rec['email'] ] = $rec['name'];
                            break;
                        case 'bcc':
                            $arr_bcc[ $rec['email'] ] = $rec['name'];
                            break;
                    }
                }
                $message->setTo($arr_to);
                $message->setCc($arr_cc);
                $message->setBcc($arr_bcc);
            }
            if(isset($arr_mail['headers']) && isset($arr_mail['Reply-To']))
            {
                $message->setReplyTo($arr_mail['Reply-To']);
            }

            $result = $instance->send($message);
            break;
    }

    return $result;

}

function nm_get_prod_path()
{
    return $_SESSION['scriptcase']['nm_path_prod'];
}
