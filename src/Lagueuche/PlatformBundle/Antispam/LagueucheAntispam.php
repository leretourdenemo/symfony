<?php

/**
 * Created by PhpStorm.
 * User: Laurent
 * Date: 05/01/2016
 * Time: 12:03
 */
namespace Lagueuche\PlatformBundle\Antispam;

class LagueucheAntispam extends \Twig_Extension
{
    private $mailer;
    private $locale;
    private $minLength;

    public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
    {
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->minLength = (int)$minLength;
    }

    /**
     * Vérifie si le texte est un spam ou non
     *
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }

    // Twig va exécuter cette méthode pour savoir quelle(s) fonction(s) ajoute notre service
    public function getFunctions()
    {
        return array(
            'checkIfSpam' => new \Twig_Function_Method($this, 'isSpam')
        );
    }

    // La méthode getName() identifie votre extension Twig, elle est obligatoire
    public function getName()
    {
        return 'LagueucheAntispam';
    }
}