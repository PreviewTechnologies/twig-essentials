<?php

namespace Previewtechs\TwigEssentials\Extensions;

use Twig_Environment;
use Twig_Extension;
use Twig_SimpleFilter;

class TwigExtras extends Twig_Extension
{
    /**
     * TwigExtras constructor.
     */
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('date_tzconvert', [$this, 'previewtechs_twig_extras_datetime_to_timezone'],
                array('needs_environment' => true))
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twigExtra';
    }

    /**
     * @param Twig_Environment $env
     * @param $datetime
     * @param string $toTimezone
     * @param string $fromTimezone
     * @param string $format
     *
     * @return string
     * @throws \Twig_Error_Runtime
     */
    public static function previewtechs_twig_extras_datetime_to_timezone(
        Twig_Environment $env,
        $datetime,
        $toTimezone = null,
        $fromTimezone = 'UTC',
        $format = 'Y-m-d H:i:s'
    ) {
        if (empty($toTimezone) || !isset($toTimezone)) {
            $toTimezone = $env->getExtension('Twig_Extension_Core')->getTimezone()->getName();
        }

        $datetime = new \DateTime($datetime, new \DateTimeZone($fromTimezone));

        $newDateTime = new \DateTime($datetime->format('Y-m-d H:i:s'));
        $newDateTime->setTimezone(new \DateTimeZone($toTimezone));
        return $newDateTime->format($format);
    }
}