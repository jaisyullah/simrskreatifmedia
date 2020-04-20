<?php

namespace chatapi\WhatsApp;
use GuzzleHttp;
use \GuzzleHttp\Exception\GuzzleException;

/**
 * Main instance
 * Class Client
 */
class Client {

    /**
     * Array of connection parameters
     * @var object
     */
    private $config;

    /**
     * Instance
     * @var null|Client
     */
    private static $_instance = null;

    /**
     * Client constructor
     * @param array $config - array of connection parameters
     */
    private function __construct($config) {
        $this->config = $config;
    }

    /**
     * Return Client instance
     * @param array $config - array of connection parameters
     * @return Client
     */
    public static function getInstance($config = []) {
        if(is_null(self::$_instance)) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    /**
     * Send a message
     * @param array $params - array of message parameters
     * @throws \Exception
     * @return object|string
     */
    public function sendMessage($params) {
        if (!isset($params['chatId']) && !isset($params['phone'])) {
            return 'phone or chatId not set in params';
        }

        if (isset($params['chatId']) && isset($params['phone'])) {
            return 'Require only phone OR chatId';
        }

        if (!isset($params['body'])) {
            return 'body not set in params';
        }

        if (count($params) > 2) {
            return 'too many params';
        }

        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'POST', $this->createUrl('sendMessage'),
                ['verify' => false, 'json' => $params]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error'. $e->getMessage());
        }

        return json_decode($res->getBody());
    }

    /**
     * Return list of messages
     * @param bool|int $last - true last message number
     * @throws \Exception
     * @return mixed
     */
    public function getMessages($last = true) {
        $sender = new GuzzleHttp\Client();
        $params = ['token' => $this->config['token']];
        if ($last === true) {
            $params['last'] = 1;
        } else {
            $params['lastMessageNumber'] = $last;
        }
        try {
            $res = $sender->request(
                'GET', $this->config['url'] . 'messages',
                ['verify' => false, 'query' => $params]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Return current account status
     * @throws \Exception
     * @return mixed
     */
    public function getStatus() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('status'),
                ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Return QR-code link
     * @throws \Exception
     * @return mixed
     */
    public function getQrCode() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('qr_code'), ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return $res->getBody()->getContents();
    }

    /**
     * Create group
     * @param string $groupName - name of group
     * @param array $phones - array of phone numbers
     * @param string $message - first message text
     * @throws \Exception
     * @return mixed
     */
    public function createGroup($groupName, $phones, $message = '') {
        $params = [
            'groupName' => $groupName,
            'phones' => $phones,
            'messageText' => $message
        ];
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'POST', $this->createUrl('group'),
                ['verify' => false, 'json' => $params]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Send file to chat or user
     * @param array $params - array of parameters
     * @throws \Exception
     * @return object|string
     */
    public function sendFile($params) {
        if (!isset($params['chatId']) && !isset($params['phone'])) {
            return 'phone or chatId not set in params';
        }

        if (isset($params['chatId']) && isset($params['phone'])) {
            return'Require only phone OR chatId';
        }

        if (!isset($params['body'])) {
            return 'body not set in params';
        }

        if (!isset($params['filename'])) {
            return 'filename not set in params';
        }
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'POST', $this->createUrl('sendFile'),
                ['verify' => false, 'json' => $params]
            );
        } catch (GuzzleException $e) {
            return 'Unknown send error';
        }
        return json_decode($res->getBody());
    }

    /**
     * Set webhook url for new messages
     * @param string $url - Url-адрес
     * @throws \Exception
     * @return mixed
     */
    public function setWebHook($url) {
        $params = ['webhookUrl' => $url];
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'POST', $this->createUrl('webhook'),
                ['verify' => false, 'json' => $params]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Return current webhook
     * @throws \Exception
     * @return mixed
     */
    public function getWebHook() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request('GET', $this->createUrl('webhook'), ['verify' => false]);
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Logout from application
     * @throws \Exception
     * @return mixed
     */
    public function logout() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('logout'),
                ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Reboot application
     * @throws \Exception
     * @return mixed
     */
    public function reboot() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('reboot'),
                ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Return not sent messages queue
     * @throws \Exception
     * @return mixed
     */
    public function getMessagesQueue() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('showMessagesQueue'),
                ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Clear not sent messages queue
     * @throws \Exception
     * @return mixed
     */
    public function clearMessagesQueue() {
        $sender = new GuzzleHttp\Client();
        try {
            $res = $sender->request(
                'GET', $this->createUrl('clearMessagesQueue'),
                ['verify' => false]
            );
        } catch (GuzzleException $e) {
            throw new \Exception('Request error');
        }
        return json_decode($res->getBody());
    }

    /**
     * Return url for api request
     * @param string $method - method name
     * @return string
     */
    private function createUrl($method) {
        return $this->config['url'] . $method . '?token=' . $this->config['token'];
    }
}