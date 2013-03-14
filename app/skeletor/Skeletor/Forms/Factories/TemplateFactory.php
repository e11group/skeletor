<?php
namespace Skeletor\Forms\Factories;

class TemplateFactory
{

  protected $csrfProvider;
  protected $validator;
  protected $formFactory;


   public function __construct() {

    // TODO of course add this to di

     $this->csrfProvider = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\DefaultCsrfProvider(CSRF_SECRET);

     $this->validator = \Symfony\Component\Validator\Validation::createValidator();

     $this->formFactory = \Symfony\Component\Form\Forms::createFormFactoryBuilder()
    ->addExtension(new \Symfony\Component\Form\Extension\Csrf\CsrfExtension($this->csrfProvider))
    ->addExtension(new \Symfony\Component\Form\Extension\Validator\ValidatorExtension($this->validator))
    ->getFormFactory();

   }

   public function build()
   {

     $form = $this->formFactory->createNamedBuilder('template_form')
     ->add(
       'title', 
       'text', 
       array(
         'data' => '',
         'label' => 'asdf',
         'constraints' => array(
             new \Symfony\Component\Validator\Constraints\NotBlank(),
             new \Symfony\Component\Validator\Constraints\MinLength(4),
         ) 
     ))
     ->getForm();

if (isset($_POST[$form->getName()])) {
    $form->bind($_POST[$form->getName()]);

    if ($form->isValid()) {
        var_dump('VALID', $form->getData());
        $post = $form->getData();
        var_dump($post);
        die;
    }
}

     return $form;

   }


    
// Create our form!


}