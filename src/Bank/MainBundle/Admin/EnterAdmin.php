<?php

namespace Bank\MainBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EnterAdmin extends Admin
{

	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->tab('General')
			->with('General')
			->add('name', null, array('label'=>'Name'))
			->add('number', 'number', array('label'=>'Number'))
			->add('description', 'textarea', array('label'=>'Description', 'required'=>false))
			->end()
		->end()
		->tab('Parent')
			->with('Parent')
			->add('cameras')
			->add('turnstile', null, array('label'=>'Select Turnstile'))
			->add('building', null, array('label'=>'Select Building'))
			->end()
		->end()
		;
	}

	// Fields to be shown on filter forms
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('number')
			->add('cameras')
			->add('turnstile')
			->add('building')
		;
	}

	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('id')
			->addIdentifier('name')
			->addIdentifier('number')
			->add('cameras')
			->add('turnstile')
			->add('building')
		;
	}
}