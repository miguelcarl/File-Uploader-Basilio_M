<?php

class Registration
{
	protected $complete_name;
	protected $email;
	protected $picture_path;
	protected $registered_at;

	const TYPE_DOCUMENT = 'document';
	const TYPE_IMAGE = 'image';

	const DIRECTORY_DOCUMENTS = 'documents/';
	const DIRECTORY_IMAGES = 'images/';

	public function __construct(
		$complete_name,
		$email,
        $picture_path,
        $registered_at =null
	)
	{
		$this->complete_name = $complete_name;
		$this->email = $email;
        $this->picture_path = $picture_path;
        $this->created_at = $registered_at;
	}

    
    public function index()
    {
        $register = [];
        try {
            $register = Registration::all();
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
    }

	public function getID()
	{
		return $this->id;
	}

	public function getCompleteName()
	{
		return $this->complete_name;
	}

	public function getEmail()
	{
		return $this->email;
	}

    public function getPicturePath()
	{
		return $this->picture_path;
	}
    
    public function getRegisteredAt()
	{
		return $this->registered_at;
	}
    
	public function save()
	{
		global $pdo;
		try {

			$sql = "INSERT INTO files SET complete_name=:complete_name, email=:email, picture_path=:picture_path, registered_at=:registered_at";
			$statement = $pdo->prepare($sql);

			return $statement->execute([
				':complete_name' => $this->getCompleteName(),
				':email' => $this->getEmail(),
                ':registered_at' => $this->getRegisteredAt(),
                ':picture_path' => $this->getPicturePath()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public static function handleUpload($fileObject)
	{
		try {
			$base_dir = getcwd() . '/';
			$target_dir = $base_dir . static::DIRECTORY_DOCUMENTS;

			$check = getimagesize($fileObject['tmp_name']);
			if ($check !== false) {
				$target_dir = $base_dir . static::DIRECTORY_IMAGES;
			}

			if (is_uploaded_file($fileObject['tmp_name'])) {
				$target_file_path = $target_dir . $fileObject['name'];
				if (move_uploaded_file($fileObject['tmp_name'], $target_file_path)) {
					$file_type = static::TYPE_DOCUMENT;
					if (strpos($target_file_path, static::DIRECTORY_IMAGES)) {
						$file_type = static::TYPE_IMAGE;
					}
					return [
						'path' => $target_file_path,
						'type' => $file_type
					];
				}
			}
		} catch (Exception $e) {
			error_log($e->getMessage());
			return false;
		}
	}
}