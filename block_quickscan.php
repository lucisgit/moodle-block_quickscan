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
 * The Quickscan block.
 *
 * @package    block_quickscan
 * @copyright  2012, Lancaster University, Ruslan Kabalin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Quickscan block class definition.
 */
class block_quickscan extends block_base {

    /**
     * Sets the block title.
     */
    public function init(): void {
        $this->title = get_string('title', 'block_quickscan');
    }

    /**
     * Generates the main content of the block.
     *
     * @return stdClass
     */
    public function get_content(): stdClass {
        if ($this->content !== null) {
            return $this->content;
        }

        $renderer = $this->page->get_renderer('block_quickscan');

        $this->content = new stdClass;
        $this->content->text = $renderer->get_block_content($this->page->course->id);
        $this->content->footer = $renderer->get_block_footer();

        return $this->content;
    }

    /**
     * Block has global config (display "Settings" link on blocks admin page).
     *
     * @return bool
     */
    public function has_config(): bool {
        return true;
    }

}
