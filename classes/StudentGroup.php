<?php

	class StudentGroup implements StudentGroupInterface
	{
		private $name;
		private $handler;
		private $content = FALSE;
		public $id;
		public $fio;
		public $dateOfBirth;
		public $phone;

		public function __construct($name, $mode = 'r+')
		{
			$this->name = $name; 
			$this->open($mode);
		}

		public function __destruct()
		{
			$this->close();
		}

		public function open($mode) 
		{

			$this->handler = fopen($this->name, $mode); 

			if ($this->handler === FALSE) 
				throw new Exception('Unable to open file'); 
		}

		public function close() 
		{

			fclose($this->handler); 
		}


	/**
	 * Метод для получения всех студентов ИЛИ(!) их среза
	 *
	 * @param int $offset Смещение выборки
	 * @param int $limit Ограничение выборки
	 * @return array
	 */
	public function read()
	{

		if(!empty($this->content)) 
			return $this->content; 
		if(get_resource_type($this->handler) == 'Unknown')
			throw new Exception('Call Open method first'); 

		$this->content = [];
		$i = 0;
		$length = 1000;
		
		while($part = fread($this->handler, $length))
		{
			$this->content[] = $part[$i];
			$i++;
		}
		
		return $this->content;
	}

	public function all($offset, $limit)
	{
		


	}


	/**
	 * Метод для получения конкретного студента
	 *
	 * @param int $id ID студента, данные которого требуется получить
	 * @return array
	 */
	public function get($id){

	}

	/**
	 * Метод для поиска студентов в группе
	 *
	 * @param string $query Поисковый запрос
	 * @return array 
	 */
	public function find($query){

	}

	/**
	 * Метод для создания нового студента в группе
	 *
	 * @param array $data Ассоциативный массив с данными студента
	 * @return boolean
	 */
	public function add($data){

	}

	/**
	 * Метод для редактирования данных о студенте
	 *
	 * @param int $id ID студента, данные которого изменяются
	 * @param array $data Ассоциативный массив с данными, которые требуется изменить
	 * @return boolean
	 */
	public function edit($id, $data){

	}

	/**
	 * Метод для удаления студента из группы
	 *
	 * @param int $id ID студента, которого требуется удалить
	 * @return boolean
	 */
	public function delete($id){

	}

	}
