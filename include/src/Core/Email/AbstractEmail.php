<?php

namespace Boilerplate\Core\Email;

/**
 * Abstract for emails
 *
 * @package Training_Qatestlab
 * @author Andrii Dats <andrii.dats@web100.com.ua>
 */
abstract class AbstractEmail
{
    /**
     * Additional headers for email
     *
     * Not required.
     * It can have:
     * - From
     * - content-type
     *
     * @var array
     */
    protected $headers = '';

    /**
     * People who receives
     *
     * @var string|array
     */
    protected $sendTo;

    /**
     * Subject for email
     *
     * @var string
     */
    protected $subject;

    /**
     * Body of email
     *
     * @var string
     */
    protected $body;

    /**
     * Attachments for message
     *
     * Not required.
     *
     * @var array
     */
    protected $attachmencts = [];

    /**
     * Send email
     *
     * @return bool
     */
    public function send()
    {
        if (
            $this->checkEmailTo($this->sendTo) &&
            $this->checkSubject($this->subject) &&
            $this->checkBody($this->body) &&
            $this->checkHeaders($this->headers) &&
            $this->checkAttachemnts($this->attachmencts)
        ) {
            return wp_mail($this->sendTo, $this->subject, $this->body, $this->headers, $this->attachments);
        }

        return false;
    }

    /**
     * Check email address
     *
     * Can be override if it needs.
     *
     * @param string|array $emails
     * @return bool
     */
    protected function checkEmailTo($emails)
    {
        if (empty($emails)) {
            return false;
        }

        if (is_array($emails)) {
            foreach ($emails as $email) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
            }
        } elseif (!filter_var($emails, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    /**
     * Check subject
     *
     * Can be override if it needs.
     *
     * @param string $subject
     * @return bool
     */
    protected function checkSubject($subject)
    {
        if (empty($subject)) {
            return false;
        }

        return true;
    }

    /**
     * Check body
     *
     * Can be override if it needs.
     *
     * @param string $body
     * @return bool
     */
    protected function checkBody($body)
    {
        if (empty($body)) {
            return false;
        }

        return true;
    }

    /**
     * Check headers
     *
     * Can be override if it needs.
     *
     * @param array|string $headers
     * @return bool
     */
    protected function checkHeaders($headers)
    {
        return true;
    }

    /**
     * Check attachments
     *
     * Can be override if it needs.
     *
     * @param array $attachments
     * @return bool
     */
    protected function checkAttachemnts($attachments)
    {
        return true;
    }
}
