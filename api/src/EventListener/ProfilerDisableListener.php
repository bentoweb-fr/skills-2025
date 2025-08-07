<?php

namespace App\EventListener;

use App\Attribute\DisableProfiler;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use ReflectionClass;
use ReflectionMethod;

class ProfilerDisableListener implements EventSubscriberInterface
{
  private $profiler;

  public function __construct($profiler = null)
  {
    $this->profiler = $profiler;
  }

  public static function getSubscribedEvents(): array
  {
    return [
      KernelEvents::CONTROLLER => 'onKernelController',
    ];
  }

  public function onKernelController(ControllerEvent $event): void
  {
    $controller = $event->getController();

    if (!is_array($controller)) {
      return;
    }

    [$controllerObject, $methodName] = $controller;

    // Vérifier si le contrôleur ou la méthode a l'attribut DisableProfiler
    $reflectionClass = new ReflectionClass($controllerObject);
    $reflectionMethod = $reflectionClass->getMethod($methodName);

    $hasClassAttribute = !empty($reflectionClass->getAttributes(DisableProfiler::class));
    $hasMethodAttribute = !empty($reflectionMethod->getAttributes(DisableProfiler::class));

    if ($hasClassAttribute || $hasMethodAttribute) {
      if ($this->profiler) {
        $this->profiler->disable();
      }

      // Marquer la requête pour éviter l'injection de la toolbar
      $event->getRequest()->attributes->set('_disable_profiler', true);
    }
  }
}
//       $event->getRequest()->attributes->set('_disable_profiler', true);
//     }
//   }
// }
