<?php

namespace App\Form;

use App\Entity\Home;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mainTitle')
            ->add('actu')
            ->add('actuLeft', CKEditorType::class)
            ->add('actuRight', CKEditorType::class)
            ->add('titleLeft')
            ->add('titleRight')
            ->add('BlueBlockTitle')
            ->add('picto', CKEditorType::class)
            ->add('subTitleBlueBlock')
            ->add('secondBlueTitle')
            ->add('subContent', CKEditorType::class)
            ->add('thirdTitleBlock')
            ->add('thirdTextBlock', CKEditorType::class)
            ->add('lastBlueTitle')
            ->add('lastPicto', CKEditorType::class)
            ->add('lastSubTitle')
            ->add('useThisVersion');

    }
    //            ->add('media', ElFinderType::class, array(
    //                'label' => 'Photo',
    //                'instance' => 'default',
    //                'enable' => true,
    //                'required' => true,
    //                'attr' => array('class' => 'form-control')
    //                )

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
