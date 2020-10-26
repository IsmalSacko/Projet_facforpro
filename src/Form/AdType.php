<?php

namespace App\Form;

use App\Entity\Aad;

use App\Form\ImagesFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('price', IntegerType::class)
            ->add('content', TextareaType::class)
            ->add('imageFile', FileType::class, [
                'data_class' => null,
                'required' => false,
                'allow_extra_fields' => true
            ])
            ->add('room')
            ->add('utilisateur')
            // ->add('submit', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aad::class,
        ]);
    }
}
