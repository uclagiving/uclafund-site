<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ILAB\MediaCloud\Utilities\Misc\Symfony\Component\Translation\Writer;

use ILAB\MediaCloud\Utilities\Misc\Symfony\Component\Translation\Exception\InvalidArgumentException;
use ILAB\MediaCloud\Utilities\Misc\Symfony\Component\Translation\MessageCatalogue;
/**
 * TranslationWriter writes translation messages.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
interface TranslationWriterInterface
{
    /**
     * Writes translation from the catalogue according to the selected format.
     *
     * @param MessageCatalogue $catalogue The message catalogue to write
     * @param string           $format    The format to use to dump the messages
     * @param array            $options   Options that are passed to the dumper
     *
     * @throws InvalidArgumentException
     */
    public function write(\ILAB\MediaCloud\Utilities\Misc\Symfony\Component\Translation\MessageCatalogue $catalogue, $format, $options = []);
}
