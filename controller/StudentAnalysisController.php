<?php
require_once __DIR__ . '/../model/ResultModel.php';
session_start();

class StudentAnalyticsController {
    private $resultModel;

    public function __construct() {
        $this->resultModel = new ResultModel();
    }

    public function showStudentAnalytics($studentId) {
        $analytics = $this->resultModel->getStudentAnalytics($studentId);
        include '../view/student_analytics.php'; 
    }
}
