<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class OnelinerDAO extends DAO {

	public function selectAll() {
		$sql = "SELECT * FROM `oneliners`";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectById($id) {
		$sql = "SELECT * FROM `oneliners` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `oneliners` (`created`, `author`, `text`) VALUES (:created, :author, :text)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':created', $data['created']);
			$stmt->bindValue(':author', $data['author']);
			$stmt->bindValue(':text', $data['text']);
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
			$sql = "UPDATE `oneliners` SET `created` = :created, `author` = :author, `text` = :text WHERE `id` = :id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':created', $data['created']);
			$stmt->bindValue(':author', $data['author']);
			$stmt->bindValue(':text', $data['text']);
			$stmt->bindValue(':id', $id);
			if($stmt->execute()) {
				return $this->selectById($id);
			}
		}
		return false;
	}

	public function delete($id) {
		$sql = "DELETE FROM `oneliners` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}

	public function getValidationErrors($data) {
		$errors = array();
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
