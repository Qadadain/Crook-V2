<?php

namespace App\EntityListener;

use App\Entity\Sheet;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class SheetEntityListener
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Sheet $sheet, LifecycleEventArgs $event)
    {
        $sheet->setSlug($this->slugger->slug($sheet->getTitle())->lower());
    }

    public function preUpdate(Sheet $sheet, LifecycleEventArgs $event)
    {
        $sheet->setSlug($this->slugger->slug($sheet->getTitle())->lower());
    }
}
