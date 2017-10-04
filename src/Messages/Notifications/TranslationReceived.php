<?php

namespace EC\Poetry\Messages\Notifications;

use EC\Poetry\Events\Notifications\TranslationReceivedEvent;
use EC\Poetry\Events\ParseNotificationEvent;
use EC\Poetry\Messages\Traits\WithStatusTrait;
use EC\Poetry\Messages\Traits\WithAttributionsTrait;
use EC\Poetry\Services\Parser;

/**
 * Class TranslationReceived
 *
 * @package EC\Poetry\Messages\Notifications
 */
class TranslationReceived extends AbstractNotification
{
    use WithAttributionsTrait;
    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        return 'notifications::translation';
    }

    /**
     * {@inheritdoc}
     */
    public function onParseNotification(ParseNotificationEvent $event)
    {
        $parser = $this->getParser();
        $parser->addXmlContent($event->getXml());
        if ('translation' === $parser->getAttribute('POETRY/request', 'type')) {
            $this->fromXml($event->getXml());
            $event->setEvent(new TranslationReceivedEvent($this));
            $event->stopPropagation();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fromXml($xml)
    {
        $parser = $this->getParser();
        $parser->addXmlContent($xml);

        $xml = $parser->getOuterContent('POETRY/request/demandeId');
        $this->getIdentifier()->fromXml($xml);

        $parser->eachComponent("POETRY/request/attributions", function (Parser $component) {
            $this->withAttribution()
              ->setParser($this->getParser())
              ->fromXml($component->outerHtml());
        }, $this);

        return $this;
    }
}
