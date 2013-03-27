<?php
namespace Skeletor\Forms\Factories;

class Account
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

   public function build($data = null)
   {

    if ($data !== null) { 
      foreach ($data as $obj) {
         $title = $obj->title;
      }
    } 

$title = isset($title) ? $title : '';

  $form = $this->formFactory->createNamedBuilder('template_form')
     ->add(
       'title', 
       'text', 
       array(
         'data' => $title,
         'constraints' => array(
             new \Symfony\Component\Validator\Constraints\NotBlank(),
             new \Symfony\Component\Validator\Constraints\MinLength(4),
         ) 
     ))
    ->add('gender', 'choice', array(
    'choices'   => array(
        '' => 'Please Select',
        'morning'   => 'Morning',
        'afternoon' => 'Afternoon',
        'evening'   => 'Evening',
    ),
    //'multiple'  => true,
    ))
    ->add(
       'tiss', 
       'text',
       array(
        'required' => false
    ))
    ->add(
       'description', 
       'textarea', 
       array(
         'label' => 'Desc',

     ))
     ->getForm();

     return $form;
   }

// Create our form!


}