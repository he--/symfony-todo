<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 25/02/15
 * Time: 18:46
 */

namespace TodoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use TodoBundle\Entity\Task;
use TodoBundle\Entity\Status;

class TaskType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descricao', 'text', [
                'label' => 'Descrição:',
                'required' => true
            ])
            ->add('status', 'entity', [
                'label' => 'Status',
                'class' => 'TodoBundle:Status',
                'property' => 'descricaoStatus',
                'placeholder' => 'Selecione',
                'required' => false,
            ])
           ->add('id', 'hidden', array(
                'data' => '',
            ))
        ->add('Send', 'submit');
    }


    public function setDefaults(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => Task::class]);
    }
    public function getName()
    {
        return 'TaskType';
    }
}