<?php

namespace Altech\Service;

use Exception;
use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer
{
    private const TEMPLATE_DIR = __DIR__ . '/../View/mail/';

    /**
     * @var null|self
     */
    private static $_instance = null;
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;

        $this->mailer->Host = $_ENV["MAILER_HOST"];
        $this->mailer->Username = $_ENV["MAILER_USERNAME"];
        $this->mailer->Password = $_ENV["MAILER_PASSWORD"];
        $this->mailer->Port = $_ENV["MAILER_PORT"];

        $this->mailer->CharSet = 'utf-8';
        $this->mailer->Encoding = 'base64';

        $this->mailer->setFrom($_ENV["MAILER_USERNAME"], "Infinite Measures");
        $this->mailer->isHTML(true);
    }

    /**
     * @param string $recipient The email address to send to
     * @param string $subject The subject of the email
     * @param string $body The filename of the file to use as body (inside self::TEMPLATE_DIR)
     * @param array $params Parameters used inside email's body (e.g token, username, ...)
     *
     * @return $this
     * @throws MailerException | Exception
     */
    public function createEmail(string $recipient, string $subject, string $body, array $params = []): self
    {
        $this
            ->to($recipient)
            ->subject($subject)
            ->setBody($body, $params);
        return $this;
    }

    /**
     * @param string $recipient The email address to send to
     * @return $this
     * @throws MailerException
     *
     */
    public function to(string $recipient): self
    {
        $this->mailer->addAddress($recipient);
        return $this;
    }

    /**
     * @param string $author The email address that send the email
     * @param string $name Author's name
     * @return $this
     * @throws MailerException
     */
    public function from(string $author, string $name = ""): self
    {
        $this->mailer->setFrom($author, $name);
        return $this;
    }

    /**
     * @param string $subject The mail's subject
     *
     * @return $this
     */
    public function subject(string $subject): self
    {
        $this->mailer->Subject = $subject;
        return $this;
    }

    /**
     * @param string $body The filename of the file to use as body (inside self::TEMPLATE_DIR)
     * @param array $params Parameters used inside email's body (e.g token, username, ...)
     * @return $this
     * @throws Exception raises if the file doesn't exist
     */
    public function setBody(string $body, array $params): self
    {
        if (file_exists(self::TEMPLATE_DIR . $body)) {
            ob_start();
            extract($params);
            $host = "http://localhost:8080";

            include self::TEMPLATE_DIR . $body;

            $this->mailer->Body = ob_get_contents();
            ob_end_clean();

            return $this;
        }
        throw new Exception("Email body's file can not be found at: " . self::TEMPLATE_DIR);
    }


    public function send(): bool
    {
        return $this->mailer->send();
    }

    public static function getInstance(): self
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}