
<?php
require_once __DIR__ . '/../model/ResultModel.php';
session_start();

class ResultController {
    private $resultModel;

    public function __construct() {
        $this->resultModel = new ResultModel();
    }

    public function showResultHistory($userId) {
        $results = $this->resultModel->getResultsByUser($userId);
        include '../view/result_history.php'; 
    }


    public function compareScores($userId) {
        $comparison = $this->resultModel->compareScores($userId);
        include '../view/compare_scores.php'; 
    }
}
