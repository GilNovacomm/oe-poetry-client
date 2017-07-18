<?php

namespace EC\Poetry\Messages\Components;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Contact
 *
 * @package EC\Poetry\Messages\Components
 */
class Contact extends AbstractComponent
{
    private $type;
    private $action;
    private $nickname;
    private $email;

    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        return 'components::identifier';
    }

    /**
     * {@inheritdoc}
     */
    public static function getConstraints(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('type', [
            new Assert\NotBlank(),
            new Assert\Choice(array(
                'Contact',
                'Secretaire',
                'Responsible',
                'planningUnit',
                'translationUnit',
            )),
        ]);
        $metadata->addPropertyConstraints('action', [
            new Assert\Choice(array(
                'INSERT',
                'UPDATE',
            )),
        ]);
        $metadata->addPropertyConstraints('nickname', [
            new Assert\NotBlank(),
            new Assert\Type('string'),
        ]);
        $metadata->addPropertyConstraints('email', [
            new Assert\Email(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Contact
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     * @return Contact
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     * @return Contact
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
