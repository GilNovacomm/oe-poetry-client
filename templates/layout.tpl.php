<?php
/**
 * @file
 * Template file.
 *
 * @var \League\Plates\Template\Template $this
 * @var string $identifier
 * @var string $type
 */
?><?='<?xml version="1.0" encoding="utf-8"?>'?>
<POETRY xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://intragate.ec.europa.eu/DGT/poetry_services/poetry.xsd">
    <request communication="asynchrone" id="<?= $identifier ?>" type="<?= $type ?>">
        <?= $this->section('content') ?>
    </request>
</POETRY>
