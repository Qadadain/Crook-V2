<?php

namespace App\EntityListener;

use App\Entity\Tutorial;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class TutorialEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Tutorial $tutorial, LifecycleEventArgs $event)
    {
        $tutorial->setSlug($this->slugger->slug($tutorial->getTitle())->lower());
    }

    public function preUpdate(Tutorial $tutorial, LifecycleEventArgs $event)
    {
        $tutorial->setSlug($this->slugger->slug($tutorial->getTitle())->lower());
    }
}
