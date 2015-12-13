<?php
namespace AppBundle\Form;
use
    Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder
    ;

use Symfony\Component\Form\FormBuilderInterface;

class ContactsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contacts', 'collection', array(
                'type'         => new Type\ContactType(),
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                //'prototype_name' => 'contacts__name__',
            ))
        ;
    }

    public function getName()
    {
        return 'contacts';
    }
}