<?php

/**
* @file
* Contains \Drupal\rsvplist\Form\RSVPForm
*/

namespace Drupal\rsvplist\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;

/**
* Provides an RSVP Email form
*/
class RSVPForm extends FormBase {
  use MessengerTrait;
  /**
   * (@inheritdoc)
   */
  public function getFormId() {
    return 'rsvplist_email_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
   $node = \Drupal::routeMatch()->getParameter('node');
   $nid = $node->nid->value;
   $form['email'] = [
     '#title' => $this->t('Email Address'),
     '#type' => 'textfield',
     '#size' => 25,
     '#description' => $this->t('We\'ll send updates to the email address you provide.'),
     '#required' => TRUE,
   ];
   $form['submit'] = [
     '#type' => 'submit',
     '#value' => 'RSVP',
   ];
   $form['nid'] = [
     '#type' => 'hidden',
     '#value' => $nid,
   ];
   return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage('The Form Is Finally Working!');
  }
}