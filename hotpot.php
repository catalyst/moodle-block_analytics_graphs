<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


require('../../config.php');
require('graph_submission.php');
require('javascriptfunctions.php');
require('lib.php');

$course = required_param('id', PARAM_INT);

$title = get_string('submissions_hotopot', 'block_analytics_graphs');
$submissions_graph = new graph_submission($course, $title);
$students = block_analytics_graphs_get_students($course);
$result = block_analytics_graphs_get_hotpot_submission($course, $students);
$submissions_graph_options = $submissions_graph->create_graph($result, $students);

$codename = "assign.php";

require('groupjavascript.php');
?>
