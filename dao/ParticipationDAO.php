<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class ParticipationDAO extends DAO {

  public function selectAll() {
    $sql = "SELECT `boek_participations`.* , `boek_users`.*
            FROM `boek_participations`
            INNER JOIN `boek_users`
            ON `boek_users`.`id` = `boek_participations`.`user_id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

	public function selectById($id) {
		$sql = "SELECT * FROM `boek_participations` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

  public function selectAllPhotos($id) {
      $sql = "SELECT * FROM `boek_participations` WHERE `photo` != ''";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `boek_participations` (`user_id`, `pdf`, `photo`, `created`) VALUES (:user_id, :pdf, :photo, :created)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':user_id', $data['user_id']);
			$stmt->bindValue(':pdf', $data['pdf']);
			$stmt->bindValue(':photo', $data['photo']);
            $stmt->bindValue(':created', $data['created']);
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
			$sql = "UPDATE `boek_participations` SET `user_id` = :user_id, `pdf` = :pdf, `photo` = :photo, `created` = :created WHERE `id` = :id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':user_id', $data['user_id']);
            $stmt->bindValue(':pdf', $data['pdf']);
            $stmt->bindValue(':photo', $data['photo']);
            $stmt->bindValue(':created', $data['created']);
			$stmt->bindValue(':id', $id);
			if($stmt->execute()) {
				return $this->selectById($id);
			}
		}
		return false;
	}

	public function delete($id) {
		$sql = "DELETE FROM `boek_participations` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}

	public function getValidationErrors($data) {
		$errors = array();
		if(empty($data['user_id'])) {
			$errors['user_id'] = 'Please enter a user_id';
		}
		if(empty($data['pdf'])) {
			$errors['pdf'] = 'Please enter an pdf';
		}
		if(empty($data['photo'])) {
			$errors['photo'] = 'Please enter a photo';
		}
        if(empty($data['created'])) {
            $errors['created'] = 'Please enter a created date';
        }
		return $errors;
	}
}
