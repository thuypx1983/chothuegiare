<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();

$contentTypes=array('du-an-cho-thue','du-an','goi-dich-vu');
include 'lib.php';
$csv = new parseCSV();
$csv->auto('F:\Downloads\data.csv');
foreach($csv->data as $row){
    //if(!in_array($row['hangsanxuat'],$contentTypes)){
    if($row['hangsanxuat']=='du-an'){
        $node = new stdClass();
        $node->title = $row['ten'];
        $node->type = "gallary";
        node_object_prepare($node); // Sets some defaults. Invokes hook_prepare() and hook_node_prepare().
        $node->language = LANGUAGE_NONE; // Or e.g. 'en' if locale is enabled
        $node->uid = $user->uid;
        $node->status = 1; //(1 or 0): published or not
        $node->promote = 0; //(1 or 0): promoted to front page
        $node->comment = 0; // 0 = comments disabled, 1 = read only, 2 = read/write

        #image
        $existing_filepath = 'F:\websites\chothuegiare.com\data_store\anhdaidien'.DIRECTORY_SEPARATOR.$row['hinhanh'];
        if(file_exists($existing_filepath)){
            $new_filepath = "public://{$row['hinhanh']}";
            $drupal_file = file_save_data(file_get_contents($existing_filepath), $new_filepath);
            $drupal_file->alt = $node->title;
            $drupal_file->title = $node->title;
            $node->field_image[$node->language][0] = get_object_vars($drupal_file);
        };


//summary

        $node->field_summary1[$node->language][0]['format']  = 'full_html';
        $node->field_summary1[$node->language][0]['value']  = $row['mota1'];

        $node->field_news_category[LANGUAGE_NONE][0]['tid']=$term->tid;

        $node->metatags[LANGUAGE_NONE]['title']['value'] = $row['title'];
        $node->metatags[LANGUAGE_NONE]['description']['value'] = $row['title'];
        $node->metatags[LANGUAGE_NONE]['keywords']['value'] = $row['title'];

        $node = node_submit($node); // Prepare node for saving


        node_save($node);

    }

}
fclose($csvFile);
