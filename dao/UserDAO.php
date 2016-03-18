<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class UserDAO extends DAO {

  public function selectAll() {
      $sql = "SELECT * FROM `boek_users`";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

	public function selectById($id) {
		$sql = "SELECT * FROM `boek_users` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

  public function selectByVerified($verified) {
      $sql = "SELECT * FROM `boek_users` WHERE `verified` = :verified";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':verified', $verified);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByEmail($email) {
      $sql = "SELECT * FROM `boek_users` WHERE `email` = :email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }

	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `boek_users`
                (`name`, `email`, `password`, `cardId`, `school`, `class`, `created`, `verified`, `is_admin`)
              VALUES  (:name, :email, :password, :cardId, :school, :class, :created, :verified, :is_admin)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':name', $data['name']);
			$stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':password', $data['password']);
			$stmt->bindValue(':cardId', $data['cardId']);
			$stmt->bindValue(':school', $data['school']);
      $stmt->bindValue(':class', $data['class']);
      $stmt->bindValue(':created', $data['created']);
      $stmt->bindValue(':verified', $data['verified']);
      $stmt->bindValue(':is_admin', $data['is_admin']);
			if($stmt->execute()) {
				$insertedId = $this->pdo->lastInsertId();
				return $this->selectById($insertedId);
			}
		}
		return false;
	}

	public function update($id, $data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "UPDATE `boek_users`
                SET `name` = :name, `email` = :email, `password` = :password, `cardId` = :cardId, `school` = :school, `class` = :class, `created` = :created, `verified` = :verified, `is_admin` = :is_admin
                WHERE `id` = :id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':name', $data['name']);
			$stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':password', $data['password']);
			$stmt->bindValue(':cardId', $data['cardId']);
			$stmt->bindValue(':school', $data['school']);
      $stmt->bindValue(':class', $data['class']);
      $stmt->bindValue(':created', $data['created']);
      $stmt->bindValue(':verified', $data['verified']);
      $stmt->bindValue(':is_admin', $data['is_admin']);
			$stmt->bindValue(':id', $id);
			if($stmt->execute()) {
				return $this->selectById($id);
			}
		}
		return false;
	}

	public function delete($id) {
		$sql = "DELETE FROM `boek_users` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}

	public function getValidationErrors($data) {
		$errors = array();
		if(empty($data['name'])) {
			$errors['name'] = 'Please enter a name';
		}
		if(empty($data['email'])) {
			$errors['email'] = 'Please enter a email';
		}
    if(empty($data['password'])) {
        $errors['password'] = 'Please enter a password';
    }
		if(empty($data['cardId'])) {
			$errors['cardId'] = 'Please enter an cardId';
		}
		if(empty($data['school'])) {
			$errors['school'] = 'Please enter a school';
		}
    if(empty($data['class'])) {
        $errors['class'] = 'Please enter a class';
    }
    if(empty($data['created'])) {
        $errors['created'] = 'Please enter a created';
    }
    if(empty($data['verified'])) {
        $errors['verified'] = 'Please enter an verified';
    }
    if(empty($data['is_admin'])) {
        $errors['is_admin'] = 'Please enter a is_admin';
    }
		return $errors;
	}
}
