<?php

/**
 * MemberRelationship form base class.
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseMemberRelationshipForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'member_id_to'   => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'member_id_from' => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'is_friend'      => new sfWidgetFormInputCheckbox(),
      'is_friend_pre'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'MemberRelationship', 'column' => 'id', 'required' => false)),
      'member_id_to'   => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'member_id_from' => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'is_friend'      => new sfValidatorBoolean(array('required' => false)),
      'is_friend_pre'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'MemberRelationship', 'column' => array('member_id_to', 'member_id_from'))),
        new sfValidatorPropelUnique(array('model' => 'MemberRelationship', 'column' => array('member_id_from', 'member_id_to'))),
      ))
    );

    $this->widgetSchema->setNameFormat('member_relationship[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberRelationship';
  }


}
