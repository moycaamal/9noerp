<?php
require "../../config/config.php";
require_once ROOT_PATH . "/libs/database.php";

if ($_POST) {
    switch ($_POST["action"]) {
        case "insertCourseEmployee":
            insertCourseEmployee();
            break;

        case "getCourseEmployee":
            getCourseEmployee($_POST["id"]);
            break;

        case "updateCourseEmployee":
            updateCourseEmployee($_POST["id"]);
            break;

        case "deleteCourseEmployee":
            deleteCourseEmployee($_POST["id"]);
            break;

        default:
            # code...
            break;
    }
}

function insertCourseEmployee()
{
    global $db;
    $duplicate = false;
    if ($_POST["id_empleado"] == "0" || $_POST["id_curso"] == "0") {
        $res["status"] = 0;
    } else {
        $duplicate = validateCourseEmployee($_POST["id_empleado"], $_POST["id_curso"]);
        if (!$duplicate) {
            $db->insert("cursos_empleados", [
                "id_empleado" => $_POST["id_empleado"],
                "id_curso" => $_POST["id_curso"]
            ]);
            $res["status"] = 1;
        } else {
            $res["status"] = 2;
        }
    }
    echo json_encode($res);
}

function validateCourseEmployee($id_empleado, $id_curso)
{
    global $db;
    $coursesEmployees = $db->select("cursos_empleados", "*", ["id_empleado" => $id_empleado]);
    foreach ($coursesEmployees as $courseEmployee) {
        if ($courseEmployee["id_curso"] == $id_curso) {
            return true;
        }
    }
}

function getCourseEmployee($id)
{
    global $db;
    $courseEmployee = $db->get("cursos_empleados", "*", ["id" => $id]);
    echo json_encode($courseEmployee);
}

function updateCourseEmployee($id)
{
    global $db;
    $duplicate = false;
    if ($_POST["id_empleado"] == "0" || $_POST["id_curso"] == "0") {
        $res["status"] = 0;
    } else {
        $duplicate = validateCourseEmployee($_POST["id_empleado"], $_POST["id_curso"]);
        if (!$duplicate) {
            $db->update(
                "cursos_empleados",
                [
                    "id_empleado" => $_POST["id_empleado"],
                    "id_curso" => $_POST["id_curso"]
                ],
                ["id" => $id]
            );
            $res["status"] = 1;
        } else {
            $res["status"] = 2;
        }
    }
    echo json_encode($res);
}

function deleteCourseEmployee($id)
{
    global $db;
    $db->delete("cursos_empleados", ["id" => $id]);
    $res["status"] = 1;
    echo json_encode($res);
}
