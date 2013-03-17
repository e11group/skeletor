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

   public function build($data = null)
   {

    if ($data == null) { 
     $form = $this->formFactory->createNamedBuilder('template_form')
     ->add(
       'title', 
       'text', 
       array(
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

     } else {

foreach ($data as $obj) {

  $form = $this->formFactory->createNamedBuilder('template_form')
     ->add(
       'title', 
       'text', 
       array(
         'data' => $obj->title,
         'label' => 'Title',
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
         'data' => $obj->title,
         'label' => 'Title',
         'constraints' => array(
             new \Symfony\Component\Validator\Constraints\NotBlank(),
             new \Symfony\Component\Validator\Constraints\MinLength(4),
         ) 
     ))
    ->add(
       'description', 
       'textarea', 
       array(
         'label' => 'Desc',

     ))
     ->getForm();


}

   

     return $form;



     }

   }


    
// Create our form!


}