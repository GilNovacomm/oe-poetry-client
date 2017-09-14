<?php

namespace EC\Poetry\Messages\Components;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Details
 *
 * @package EC\Poetry\Messages\Components
 */
class Details extends AbstractComponent
{
    private $clientId;
    private $applicationId;
    private $author;
    private $responsible;
    private $requester;
    private $title;
    private $remark;
    private $type;
    private $destination;
    private $procedure;
    private $delay;
    private $requestDate;
    private $status;
    private $interServices;
    private $interInstitution;
    private $referenceFilesRemark;

    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        return 'components::details';
    }

    /**
     * {@inheritdoc}
     */
    public static function getConstraints(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('author', new Assert\Type('string'));
        $metadata->addPropertyConstraint('requester', new Assert\Type('string'));
        $metadata->addPropertyConstraint('title', new Assert\Type('string'));
        $metadata->addPropertyConstraint('remark', new Assert\Type('string'));
        $metadata->addPropertyConstraint('type', new Assert\Choice([
            'AUTRE',
            'COMP',
            'IMG',
            'INF',
            'INTER',
            'INTRA',
            'LEGTF',
            'PUB',
        ]));
        $metadata->addPropertyConstraint('destination', new Assert\Choice([
            'AUTRE',
            'COMMISR',
            'EM',
            'EXT',
            'IE',
            'INTERNE',
            'JO',
            'PRESSE',
            'PUBLIC',
            'RST',
        ]));
        $metadata->addPropertyConstraint('procedure', new Assert\Choice([
            'DEGHP',
            'NEANT',
            'PROAC',
            'PROCEP',
            'PROCO',
            'REUNCS',
            'REUNAU',
            'PROCH',
            'PROCD',
        ]));
        $metadata->addPropertyConstraint('delay', new Assert\DateTime());
        $metadata->addPropertyConstraint('requestDate', new Assert\DateTime());
        $metadata->addPropertyConstraint('status', new Assert\Type('string'));
        $metadata->addPropertyConstraint('referenceFilesRemark', new Assert\Type('string'));
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     * @return Details
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param mixed $applicationId
     * @return Details
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Details
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * @param mixed $responsible
     * @return Details
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * @param mixed $requester
     * @return Details
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Details
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     * @return Details
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
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
     * @return Details
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     * @return Details
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcedure()
    {
        return $this->procedure;
    }

    /**
     * @param mixed $procedure
     * @return Details
     */
    public function setProcedure($procedure)
    {
        $this->procedure = $procedure;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param mixed $delay
     * @return Details
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param mixed $requestDate
     * @return Details
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Details
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterServices()
    {
        return $this->interServices;
    }

    /**
     * @param mixed $interServices
     * @return Details
     */
    public function setInterServices($interServices)
    {
        $this->interServices = $interServices;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterInstitution()
    {
        return $this->interInstitution;
    }

    /**
     * @param mixed $interInstitution
     * @return Details
     */
    public function setInterInstitution($interInstitution)
    {
        $this->interInstitution = $interInstitution;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceFilesRemark()
    {
        return $this->referenceFilesRemark;
    }

    /**
     * @param mixed $referenceFilesRemark
     * @return Details
     */
    public function setReferenceFilesRemark($referenceFilesRemark)
    {
        $this->referenceFilesRemark = $referenceFilesRemark;

        return $this;
    }
}
