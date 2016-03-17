<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class ComebackDAO extends DAO {

	public function selectByOnelinerId($oneliner_id) {
		$sql = "SELECT * FROM `comebacks` WHERE `oneliner_id` = :oneliner_id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':oneliner_id', $oneliner_id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectAll() {
		$sql = "SELECT * FROM `comebacks`";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectById($id) {
		$sql = "SELECT * FROM `comebacks` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `comebacks` (`oneliner_id`, `created`, `text`, `author`) VALUES (:oneliner_id, :created, :text, :author)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':oneliner_id', $data['oneliner_id']);
			$stmt->bindValue(':created', $data['created']);
			$stmt->bindValue(':text', $data['text']);
			$stmt->bindValue(':author', $data['author']);
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
			$sql = "UPDATE `comebacks` SET `oneliner_id` = :oneliner_id, `created` = :created, `text` = :text, `author` = :author WHERE `id` = :id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':oneliner_id', $data['oneliner_id']);
			$stmt->bindValue(':created', $data['created']);
			$stmt->bindValue(':text', $data['text']);
			$stmt->bindValue(':author', $data['author']);
			$stmt->bindValue(':id', $id);
			if($stmt->execute()) {
				return $this->selectById($id);
			}
		}
		return false;
	}

	public function delete($id) {
		$sql = "DELETE FROM `comebacks` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}

  public function deleteByOnelinerId($oneliner_id) {
    $sql = "DELETE FROM `comebacks` WHERE `oneliner_id` = :oneliner_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':oneliner_id', $oneliner_id);
    return $stmt->execute();
  }

	public function getValidationErrors($data) {
		$errors = array();
		if(empty($data['oneliner_id'])) {
			$errors['oneliner_id'] = 'Please enter a oneliner id';
		}
		if(empty($data['created'])) {
			$errors['created'] = 'Please enter a created date';
		}
		if(empty($data['author'])) {
			$errors['author'] = 'Please enter an author';
		}
		if(empty($data['text'])) {
			$errors['text'] = 'Please enter a text';
		}
		return $errors;
	}
}
