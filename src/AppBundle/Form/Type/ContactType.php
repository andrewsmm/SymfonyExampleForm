<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email',TextType::class, array(
            'constraints' => [
                new NotBlank(['message'=>'Email не должен быть пустым']),
                new Email(),
                new Length(['max'=>255,'maxMessage'=>'Email'])
            ],
            'label' => false,
            'attr' => array(
                'placeholder' => 'Email',
            ),
        ))
        ->add('firstName',TextType::class, array(
            'constraints' => [
                new NotBlank(['message'=>'Имя не должно быть пустым']),
                new Length(['max'=>255])
            ],
            'label' => false,
            'attr' => array(
                'placeholder' => 'Имя',
            ),
        ));
    }

    public function getName()
    {
        return 'contact';
    }
}