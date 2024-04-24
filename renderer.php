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
 * Display renderer for the Quickscan block.
 *
 * @package    block_quickscan
 * @copyright  2012, Lancaster University, Ruslan Kabalin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Quickscan block renderer class definition.
 */
class block_quickscan_renderer extends plugin_renderer_base {

    /**
     * Renders HTML to display the block content.
     *
     * @param int $courseid
     * @return string html
     */
    public function get_block_content($courseid): string {
        $url = new moodle_url('/blocks/quickscan/launchtest.php', ['courseid' => $courseid]);
        $button = new single_button($url, get_string('quickscantest', 'block_quickscan'));

        return html_writer::tag('div', $this->output->render($button));
    }

    /**
     * Renders HTML to display the block footer.
     *
     * @return string html
     */
    public function get_block_footer(): string {
        $config = get_config('blocks/quickscan');

        return $config->footer;
    }

    /**
     * Display explanation content and start button.
     *
     * @return string html
     */
    public function get_test_description(): string {
        global $USER;

        $config = get_config('blocks/quickscan');
        $html = html_writer::start_tag('div', ['id' => 'page-blocks-quickscan-launchtest']);
        $html .= $config->explanation;
        if ($config->url) {
            $url = new moodle_url($config->url, ['txtpi' => $USER->username]);
            $button = new single_button($url, get_string('starttest', 'block_quickscan'));
            $action = new popup_action('click', $url, 'popup', ['width' => 0, 'height' => 0,
                    'toolbar' => false, 'fullscreen' => true]);
            $button->add_action($action);
            $html .= html_writer::tag('div', $this->output->render($button));
        }
        $html .= html_writer::end_tag('div');

        return $html;
    }

}
