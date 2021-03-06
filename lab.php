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

/**
 * @package cloudxlab
 * @author  cloudxlab
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
$PAGE->set_url(new moodle_url('/local/cloudxlab/lab.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('CloudxLab');
$PAGE->set_heading('CloudxLab');

echo $OUTPUT->header();

global $USER;
$userid = optional_param('id', $USER->id, PARAM_INT);

$arr = array('email' => $USER->email,);
$payload = json_encode($arr);
$url = 'https://cloudxlab.com/lms-plugin?enc=' . urlencode($payload);

$templatecontext = (object)[
    'url' => $url,
];

echo $OUTPUT->render_from_template('local_cloudxlab/cloudxlab', $templatecontext);
echo $OUTPUT->footer();
