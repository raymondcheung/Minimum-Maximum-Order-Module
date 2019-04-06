<?php

namespace Drupal\minimum_maximum_order\EventSubscriber;

use Drupal\commerce_order\Event\OrderItemEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\state_machine\Event\WorkflowTransitionEvent;

/**
 * Class EntityTypeSubscriber.
 *
 * @package Drupal\custom_events\EventSubscriber
 */
class ValidateMinMaxSubscriber implements EventSubscriberInterface {


  /**
   * {@inheritdoc}
   *
   * @return array
   *   The event names to listen for, and the methods that should be executed.
   */
  public static function getSubscribedEvents() {
    return [
      'commerce_order.place.pre_transition' => ['validateMinMax', -10],
    ];
  }

  public function validateMinMax(WorkflowTransitionEvent $event) {
    $order = $event->getEntity();
    $total = (int) $order->getTotalPrice()->getNumber();
    $min = 30;
    $max = null;

    if ( $min !== null && $total < $min) {
      return false;
    } elseif ( $max !== null && $total > $max) {

    }
  }

}
