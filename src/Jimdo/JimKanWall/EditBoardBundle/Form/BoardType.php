<?php

namespace Jimdo\JimKanWall\EditBoardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class BoardType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'label' => 'Board Name'
                ))
            ->add('boardColumns', 'collection', array(
                                                     'type' => new BoardColumnType(),
                                                     'allow_add' => true,
                                                     'by_reference' => false,
                                                     'attr' => array(
                                                         'class' => 'boardColumns'
                                                     )
                                                )
            );
        ;
    }

    public function getName()
    {
        return 'jimdo_jimkanwall_editboardbundle_boardtype';
    }
}
