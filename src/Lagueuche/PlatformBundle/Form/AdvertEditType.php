<?php

namespace Lagueuche\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class AdvertEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('date');
    }

    public function getName()
    {
        return 'lagueuche_platformbundle_advert_edit';
    }

    public function getParent()
    {
        return AdvertType::class;
    }
}
