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

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $configs = array();

    $configs[] = new admin_setting_configtext('url', get_string('configurl', 'block_quickscan'),
        get_string('configurldescription', 'block_quickscan'), '', PARAM_TEXT);
    $configs[] = new admin_setting_confightmleditor('explanation', get_string('configexplanation', 'block_quickscan'),
        get_string('configexplanationdescription', 'block_quickscan'), '', PARAM_RAW, 80, 25);
    $configs[] = new admin_setting_confightmleditor('footer', get_string('configfooter', 'block_quickscan'),
        get_string('configfooterdescription', 'block_quickscan'), '', PARAM_RAW, 80, 10);

    foreach ($configs as $config) {
        $config->plugin = 'blocks/quickscan';
        $settings->add($config);
    }
}
