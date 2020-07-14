<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/06/2020
 * Time: 00:37
 */

namespace AppBundle\Services;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $co = new ConsoleOutput();
        if ($event->getRequest()->getMethod() == 'OPTIONS') {
            $co->write($event->getRequest()->getMethod());
            $resrp = new Response();
            $resrp->headers->set('Access-Control-Allow-Origin', '*');
            $resrp->headers->set('Access-Control-Allow-Methods', 'POST, GET');
            $resrp->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            $co->write($event->setResponse($resrp));
            return;
        }
        $event->getResponse()->headers->set('Access-Control-Allow-Origin', '*');
    }
}