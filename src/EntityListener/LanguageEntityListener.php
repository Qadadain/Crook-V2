<?php

namespace App\EntityListener;

use App\Entity\Language;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class LanguageEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Language $language, LifecycleEventArgs $event)
    {
        $language->setSlug($this->slugger->slug($language->getName())->lower());
    }

    public function preUpdate(Language $language, LifecycleEventArgs $event)
    {
        $language->setSlug($this->slugger->slug($language->getName())->lower());
    }
}
