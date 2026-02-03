<?php
require_once __DIR__ . '/../model/ActivityLogModel.php';
session_start();

class TeacherDashboardController {
    private $activityLogModel;

    public function __construct() {
        $this->activityLogModel = new ActivityLogModel();
    }

    public function showClassProgress($teacherId) {
        $classProgress = $this->activityLogModel->getClassProgress($teacherId);
        include '../view/teacher_dashboard.php'; // Pass progress data to view
    }
}
