<?php
foreach (glob("controllers/*.php") as $filename)
{
    include $filename;
}
include ("views/layouts/sidebar.php");
include ("ConnectBDD.php");

$classController = new ClassController();
$moduleController = new ModuleController();
$lessonController = new LessonController();
$teacherController = new TeacherController();
$gradeController = new GradeController();
$userController = new UserController();

$route = $_GET["route"] ?? null;
$id = $_GET["id"] ?? null;    

switch ($route) {
    case '':
    case '/':
    case 'home':
        require __DIR__ . '/views/home.php';
        break;

    // CLASSE

    case 'calendarClass':
        $classController->calendar();
        break;
    case 'listClass':
        $classController->browse();
        break;
    case 'addClass':
        $classController->add();
        break; 
    case 'saveClass':
        $classController->save();
        break; 
    case 'showClass':
        $classController->show($id);
        break;
    case 'editClass':
        $classController->edit($id);
        break;
    case 'updateClass':
        $classController->update($id);
        break;
    case 'delClass':
        $classController->delete($id);
        break;

    // MODULE
    
    case 'listModule':
        $moduleController->browse();
        break;
    case 'addModule':
        $moduleController->add();
        break; 
    case 'saveModule':
        $moduleController->save();
        break; 
    case 'showModule':
        $moduleController->show($id);
        break;
    case 'editModule':
        $moduleController->edit($id);
        break;
    case 'updateModule':
        $moduleController->update($id);
        break;
    case 'delModule':
        $moduleController->delete($id);
        break;

        // TEACHER
    
    case 'listTeacher':
        $teacherController->browse();
        break;
    case 'addTeacher':
        $teacherController->add();
        break; 
    case 'saveTeacher':
        $teacherController->save();
        break; 
    case 'showTeacher':
        $teacherController->show($id);
        break;
    case 'editTeacher':
        $teacherController->edit($id);
        break;
    case 'updateTeacher':
        $teacherController->update($id);
        break;
    case 'delTeacher':
        $teacherController->delete($id);
        break;

        // GRADE
    
    case 'listGrade':
        $gradeController->browse();
        break;
    case 'addGrade':
        $gradeController->add();
        break; 
    case 'saveGrade':
        $gradeController->save();
        break; 
    case 'showGrade':
        $gradeController->show($id);
        break;
    case 'editGrade':
        $gradeController->edit($id);
        break;
    case 'updateGrade':
        $gradeController->update($id);
        break;
    case 'delGrade':
        $gradeController->delete($id);
        break;

        // LESSON

    case 'saveLesson':
        $lessonController->save($id);
        break;
    case 'deleteLesson':
        $lessonController->delete($id);
        break;

        // USER

    // case 'login':
    //     $userController->login();
    //     break;
    // case 'authenticate':
    //     $userController->authenticate();
    //     break;
    // case 'logout':
    //     $userController->logout();
    //     break;
    // case 'register':
    //     $userController->register();
    //     break;
    // case 'saveUser':
    //     $userController->save();
    //     break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>