<?php
use Symfony\Component\Validator\Validation;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\Csrf\CsrfProvider\DefaultCsrfProvider;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Form\TwigRenderer;

// Overwrite this with your own secret
define('CSRF_SECRET', 'c2ioeEU1n48QF2WsHGWd2HmiuUUT6dxr');
define('DEFAULT_FORM_THEME', 'form_div_layout.html.twig');

define('VENDORDIR', realpath(__DIR__ . '/../vendor'));
define('VENDOR_FORM_DIR', VENDORDIR . '/symfony/form/Symfony/Component/Form');
define('VENDOR_VALIDATOR_DIR', VENDORDIR . '/symfony/validator/Symfony/Component/Validator');
define('VENDOR_TWIG_BRIDGE_DIR', VENDORDIR . '../vendor/symfony/twig-bridge/Symfony/Bridge/Twig');
define('VIEWS_DIR', realpath(__DIR__ . '/../views'));

// Set up the CSRF provider

// Set up Twig
/*
$twig = new Twig_Environment(new Twig_Loader_Filesystem(array(
    VIEWS_DIR,
    VENDOR_TWIG_BRIDGE_DIR . '/Resources/views/Form',
)));
$formEngine = new TwigRendererEngine(array(DEFAULT_FORM_THEME));
$formEngine->setEnvironment($twig);
$twig->addExtension(new TranslationExtension($translator));
$twig->addExtension(new FormExtension(new TwigRenderer($formEngine, $csrfProvider)));
*/

// Set up the Form component
