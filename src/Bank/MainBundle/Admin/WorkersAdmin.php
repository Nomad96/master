<?php

namespace Bank\MainBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class WorkersAdmin extends Admin
{

	/**
	 * @param RouteCollection $collection
	 */
	protected function configureRoutes(RouteCollection $collection)
	{
		if ($this->isGranted('OPERATOR')){
			$collection
				->remove('acl');
		}
		$collection->clearExcept(array('create', 'list', 'delete', 'edit', 'show', 'acl'));

	}

	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->tab('General')
			->with('General')
			->add('lastName', 'text', array('label'=>'Last Name', 'required'=>true))
			->add('firstName', 'text', array('label'=>'First Name', 'required'=>true))
			->add('code', null, array('label'=>'Number'))
			->add('gender', 'choice', array('choices' => array( 1 => 'Mr', 0 => 'Mr`s')))
			->add('age', 'choice', array('choices' => range(18,63,1)))
			->add('description', 'textarea')
			->end()
		->end()
		->tab('Parent')
			->with('Parent')
			->add('department', null, array('label'=>'Select Department'))
			->end()
		->end()
		;
	}

	// Fields to be shown on filter forms
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('lastName')
			->add('firstName')
			->add('code')
			->add('gender')
			->add('age')
			->add('department')
		;
	}

	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('id')
			->addIdentifier('lastName')
			->addIdentifier('firstName')
			->addIdentifier('code')
			->addIdentifier('gender')
			->addIdentifier('age')
			->add('department')
			->add('_action', 'actions', array(
				'actions' => array(
					'show' => array(),
					'edit' => array(),
					'delete' => array(),
				)))
		;
	}

	/**
	 * @param ShowMapper $showMapper
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
			->add('lastName')
			->add('firstName')
			->add('code')
			->add('gender')
			->add('age')
			->add('department')
		;
	}

}