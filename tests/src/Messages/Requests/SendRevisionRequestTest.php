<?php

namespace EC\Poetry\Tests\Messages\Requests;

use EC\Poetry\Messages\Components\Contact;
use EC\Poetry\Messages\Components\Identifier;
use EC\Poetry\Messages\Requests\CreateRequest;
use EC\Poetry\Messages\Requests\SendReviewRequest;
use EC\Poetry\Tests\AbstractTest;

/**
 * Class SendReviewRequestTest
 *
 * @package EC\Poetry\Tests\Messages\Requests
 */
class SendReviewRequestTest extends AbstractTest
{
    /**
     * Test rendering.
     */
    public function testRender()
    {
        /** @var \EC\Poetry\Services\Renderer $renderer */
        $renderer = $this->getContainer()->get('renderer');

        $identifier = new Identifier();
        $identifier->setCode('STSI')
          ->setYear(2017)
          ->setNumber('40017')
          ->setVersion('0')
          ->setPart('11');

        $message = new SendReviewRequest($identifier);

        $message->withDetails()
            ->setClientId("Job ID 3999")
            ->setTitle("NE-CMS: Erasmus+ - Erasmus Mundus Joint Master Degrees")
            ->setAuthor('IE/CE/EAC')
            ->setResponsible('EAC')
            ->setRequester('IE/CE/EAC/C/4')
            ->setApplicationId('FPFIS')
            ->setDelay('12/09/2017')
            ->setReferenceFilesRemark('https://ec.europa.eu/programmes/erasmus-plus/opportunities-for-individuals/staff-teaching/erasmus-mundus_en')
            ->setProcedure('NEANT')
            ->setDestination('PUBLIC')
            ->setType('INTER');

        $message->withContact()->setType('auteur')->setNickname('john');
        $message->withContact()->setType('secretaire')->setNickname('john');
        $message->withContact()->setType('contact')->setNickname('john');
        $message->withContact()->setType('responsable')->setNickname('mark');

        $message->withReturnAddress()
            ->setAction('UPDATE')
            ->setType('webService')
            ->setUser('MY-TEST-USER')
            ->setPassword('MY-TEST-PASSWORD')
            ->setAddress('https://example.com/callback/wsdl/PoetryIntegration.wsdl')
            ->setPath('TestReturnPath');

        $message->withSource()
            ->setFormat('HTML')
            ->setName('content.html')
            ->setFile('BASE64ENCODEDFILECONTENT')
            ->addLanguage('EN', 1);

        $message->withAttribution()
            ->setAction('INSERT')
            ->setFormat('HTML')
            ->setLanguage('EN')
            ->setDelay(2017, 9, 12);

        $output = $renderer->render($message);
        expect($output)->to->have->same->xml('messages/send-revision-request.xml');
    }
}