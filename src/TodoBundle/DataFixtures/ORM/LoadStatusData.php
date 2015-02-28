<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 26/02/15
 * Time: 21:20
 */

namespace TodoBundle\ORM\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TodoBundle\Entity\Status;

class LoadStatusData extends AbstractFixture implements OrderedFixtureInterface{

    public function load(ObjectManager $manager)
    {
        $toDo = new Status();
        $toDo->setId(1);
        $toDo->setDescricaoStatus("Todo");

        $manager->persist($toDo);
        $manager->flush();

        $inProcess = new Status();
        $inProcess->setId(2);
        $inProcess->setDescricaoStatus("In Process");

        $manager->persist($inProcess);
        $manager->flush();

        $toVerify = new Status();
        $toVerify->setId(2);
        $toVerify->setDescricaoStatus("To verify");

        $manager->persist($toVerify);
        $manager->flush();

        $done = new Status();
        $done->setId(2);
        $done->setDescricaoStatus("Done");

        $manager->persist($done);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }


}